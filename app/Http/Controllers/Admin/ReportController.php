<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyTenantOfNewreply;
use App\Models\RepliedReport;
use App\Models\ResidentReport;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userId = $user->id;


        $data['title'] = 'Resident Reports';
        $data['reports'] = ResidentReport::latest()->get();
        $data['userId'] = $userId;
        return view('admin.report.index', $data);
    }

    public function replyReport(Request $request){
        $validator = Validator::make($request->all(),[
            'report_id' => 'required|exists:resident_reports,id',
            'tenant_id' => 'required|exists:users,id',
            'admin_id' => 'required|integer|exists:users,id',
            'reply' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{

            $reportId = $request->report_id;

            $existingRepordId = RepliedReport::where('report_id', $reportId)->count();
            if($existingRepordId > 0){
                return redirect()->back()->with('error', 'You already replied this report');
            }
            $settings = Settings::find(1);
            $reply = new RepliedReport();
            $reply->report_id = $request->report_id;
            $reply->tenant_id = $request->tenant_id;
            $reply->admin_id = $request->admin_id;
            $reply->reply = $request->reply;
            $reply->save();

            $report = ResidentReport::findOrFail($reportId);
            $report->update(['is_read' => true]);

            // Send email to tenant
            if($settings->email_notify == 1){
                $tenant = User::findOrFail($reply->tenant_id);
                Mail::to($tenant->email)->send(new NotifyTenantOfNewreply($tenant, $reply));
            }

            return redirect()->back()->with('message', 'Replied Successfully');
        }
    }
}
