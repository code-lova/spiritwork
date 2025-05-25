<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\NotifyAdminOfNewDoc;
use App\Mail\NotifyAdminOfNewreport;
use App\Models\AboutUs;
use App\Models\Agreement;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\RepliedReport;
use App\Models\ResidentReport;
use App\Models\Settings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        $auth = Auth::user();
        $user = $auth->id;

        $userAgreements = Agreement::with(['property', 'category'])
                        ->where('userId', $user)
                        ->get();

        $paymentStatus = Agreement::where('userId', $user)
                        ->where('payment_status', 1)
                        ->orderBy('created_at', 'desc')
                        ->limit(1)
                        ->first();
        $propertyCount = Agreement::where('userId', $user)->count();
        $data['title'] = "My Account";
        $data['settings'] = Settings::findOrFail(1);
        $data['category'] = Category::where('status', 1)->get();
        $data['user'] = $auth;
        $data['about'] = AboutUs::findOrFail(1);
        $data['userAgreements'] = $userAgreements;
        $data['propertyCount'] = $propertyCount;
        $data['paymentStatus'] = $paymentStatus;
        $data['paymentDetials'] = PaymentMethod::where('status', 1)->first();
        return view('user.dashboard', $data);
    }

    public function deleteProperty(int $propertyId){
        $userProperty = Agreement::findOrFail($propertyId);
        $userProperty->delete();
        //return redirect()->back()->with('message', 'Property data deleted successfully.');
        return response()->json(['message' => 'Property data deleted successfully.']);
    }


    public function storeAgreement(Request $request){
        $validator = Validator::make($request->all(), [
            'propertyId' => 'required|exists:property_listings,id',
            'catId' => 'required|exists:categories,id',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{

            $auth = Auth::user();
            $user = $auth->id;

            //Check of they hvae supplied their ID image
            $checkIdImage = User::where('id', $user)->first();
            if($checkIdImage->identity_verification_image == NULL || $checkIdImage->id_verification == 0){
                return redirect()->route('user.profile')->with('info', 'Please provide a means of identification.');
            }

            //check if auth user have this proprty already in their account
            $exitingProperty = Agreement::where('userId', $user)
                            ->where('propertyId', $request->propertyId)->first();
            if($exitingProperty){
                return redirect()->back()
                ->with('error', 'This home already exist in your name.');
            }

            // Check if previous auth user agreement payment status is not == 1
            $pendingAgreement = Agreement::where('userId', $user)
                                ->where('payment_status', 1)->first();
            if($pendingAgreement){
                return redirect()->route('user.dashboard')
                ->with('warning', 'Please Complete Your Pending Agreement.');
            }

            // Check if user already applied for 2 properties
            $existingCount = Agreement::where('userId', $user)->count();
            if ($existingCount >= 2) {
                return redirect()->route('user.dashboard')
                    ->with('error', 'You already applied for maximum of 2 homes.');
            }
            $not_paid = 0;
            $agreement = new Agreement();
            $agreement->userId = $user;
            $agreement->propertyId = $request->propertyId;
            $agreement->catId = $request->catId;
            $agreement->email = $request->email;
            $agreement->payment_status = $not_paid;

            $agreement->save();

            return redirect()->route('user.dashboard')->with('message', 'You have Successfully applied.');
        }
    }


    public function signAgreement(string $uuid){
        $agreement = Agreement::where('uuid', $uuid)
                    ->where('userId', auth()->id())
                    ->where('payment_status', 1)
                    ->firstOrFail();
        if($agreement){
            $data['title'] = "Agreement";
            $data['subtitle'] = "Tenancy Agreement";
            $data['settings'] = Settings::findOrFail(1);
            $data['about'] = AboutUs::findOrFail(1);
            $data['agreementId'] = $agreement;
            return view('user.agreement.index', $data);
        }else{
            return redirect()->back()->with('error', 'Agreement does not exist');
        }

    }

    public function submitUpdateAgreement(Request $request)
    {
        $auth = Auth::user();
        $userId = $auth->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'signature' => 'required|string|max:16',
            'date' => 'required|date',
            'address' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }
        $agreementId = $request->agreementId;
        $agreement = Agreement::where('userId', $userId)
                        ->where('id', $agreementId)
                        ->where('payment_status', 1)
                        ->latest()
                        ->first();

        if (!$agreement) {
            return redirect()->route('user.dashboard')->with('error', 'No active agreement found.');
        }

        // Save signature details
        $agreement->name = $request->name;
        $agreement->signature = $request->signature;
        $agreement->date = $request->date;
        $agreement->address = $request->address;
        $agreement->payment_status = 2; // Mark as signed/completed
        $agreement->save();

        return redirect()->route('user.dashboard')->with('message', 'Agreement completed successfully.');
    }


    // View agreement page for auth user
    public function viewAgreement(string $uuid){
        $user = Auth::user();
        $agreement = Agreement::with(['property', 'category'])
                    ->where('uuid', $uuid)
                    ->where('userId', auth()->id())
                    ->where('payment_status', 2)
                    ->first();
        if($agreement){
            $data['title'] = "TENANCY AGREEMENT";
            $data['settings'] = Settings::findOrFail(1);
            $data['about'] = AboutUs::findOrFail(1);
            $data['payment'] = PaymentMethod::where('status', 1)->first();
            $data['agreement'] = $agreement;
            $data['user'] = $user;
            return view('user.agreement.view_agreement', $data);
        }else{
            return redirect()->back()->with('error', 'Please complete the agreement phase');
        }
    }

    // View all user report
    public function allReport(){
        $data['title'] = "Reports";
        $data['subtitle'] = "Sent Reports";
        $data['settings'] = Settings::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        $data['reports'] = ResidentReport::where('user_id', Auth::user()->id)->latest()->paginate(10);
        return view('user.report.index', $data);
    }

    //Create report page
    public function createReport(){
        $data['title'] = "Create New Report";
        $data['subtitle'] = "Send a report";
        $data['settings'] = Settings::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        return view('user.report.create', $data);
    }

    //Store report
    public function storeReport(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:100',
            'message' => 'required|string|min:10',
            'attachment' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // 2MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{
            $settings = Settings::findOrFail(1);
            $report = new ResidentReport();
            $report->user_id = Auth::user()->id;
            $report->title = $request->title;
            $report->message = $request->message;

            if($request->hasFile('attachment')){
                $file = $request->file('attachment');
                $filename = 'attachment_'. time() . '.' . $file->hashName();
                $file->move('uploads/report/', $filename);
                $report->attachment = $filename;
            }
            $report->save();

             // Send email
             if($settings->email_notify == 1){
                if ($report) {
                    Mail::to($settings->notifying_email)->send(new NotifyAdminOfNewreport($report));
                }
            }
            return redirect()->route('user.reports')->with('message', 'Report submitted successfully.');
        }
    }

    //User editing their report
    public function EditReport(int $reportId){
        $userReport = ResidentReport::where('id', $reportId)
                    ->where('user_id', auth()->id())
                    ->where('is_read', 0)
                    ->first();

        if($userReport){
            $data['title'] = "Edit Report";
            $data['subtitle'] = "Report";
            $data['settings'] = Settings::findOrFail(1);
            $data['about'] = AboutUs::findOrFail(1);
            $data['userReport'] = $userReport;
            return view('user.report.edit_report', $data);
        }else{
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //User send PUT request to update their report
    public function updateReport(Request $request, int $reportId)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|string|max:100',
            'message' => 'required|string|min:10',
            'attachment' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // 2MB max
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{
            $report = ResidentReport::findOrFail($reportId);
            $report->user_id = Auth::user()->id;
            $report->title = $request->title;
            $report->message = $request->message;

            if($request->hasFile('attachment')){
                $path = 'uploads/report/'.$report->attachment;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('attachment');
                $filename = 'attachment_'. time() . '.' . $file->hashName();
                $file->move('uploads/report/', $filename);
                $report->attachment = $filename;
            }

            $report->save();
            return redirect()->route('user.reports')->with('message', 'Report updated successfully.');
        }
    }

    // user want to delete their repoert accathment
    public function deleteReportImg(int $reportId){
        $report = ResidentReport::findOrFail($reportId);

        // Check if there's an attachment
        if ($report->attachment) {
            $imagePath = public_path('uploads/report/' . $report->attachment);

            // Delete the image file from the server
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            // Set the attachment column to null
            $report->attachment = null;
            $report->save();
        }

        return redirect()->route('user.reports')->with('message', 'Attachment Deleted Successfully');

    }

    //User wants to delete their report
    public function deleteReport($id){
        $report = ResidentReport::findOrFail($id);

        // Delete the attachment file if it exists
        if ($report->attachment) {
            $imagePath = public_path('uploads/report/' . $report->attachment);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the report
        $report->delete();

        return redirect()->back()->with('message', 'Report data deleted successfully.');
    }


    //User see reply from admin about their report
    public function fetchReply($report_id){
        $reply = RepliedReport::where('report_id', $report_id)
                ->where('tenant_id', auth()->id())
                ->first();

        if (!$reply) {
            return response()->json(['status' => 'error', 'message' => 'No reply found.'], 404);
        }

        return response()->json([
            'status' => 'success',
            'reply' => $reply->reply,
            'admin' => $reply->admin->name ?? 'Unknown',
            'reportSubject' => $reply->report->title
        ]);
    }



    //User profile
    public function UserAccount(){
        $auth = Auth::user();
        $data['title'] = "My Account";
        $data['subtitle'] = "Profile";
        $data['settings'] = Settings::findOrFail(1);
        $data['about'] = AboutUs::findOrFail(1);
        $data['user'] = $auth;
        return view('user.profile.index', $data);
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required|string|max:14|regex:/^\+?[0-9]+$/',
            'country' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date|max:255',
            'marital_status' => 'required|string|max:100',
            'gender' => 'required|string|max:255',
            'user_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'identity_verification_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ], [
            'identity_verification_image.required' => 'Please upload a means of identification',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }
        $settings = Settings::findOrFail(1);
        $userID = User::findOrFail($user->id);
        $userID->name = $request->name;
        $userID->email = $request->email;
        $userID->phone = $request->phone;
        $userID->country = $request->country;
        $userID->birth_date = $request->birth_date;
        $userID->marital_status = $request->marital_status;
        $userID->gender = $request->gender;
        if($request->hasFile('user_image')){
            $path = 'uploads/profile/'.$userID->user_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('user_image');
            $filename = 'user_image_'. time() . '.' . $file->hashName();
            $file->move('uploads/profile/', $filename);
            $userID->user_image = $filename;
        }
        if($request->hasFile('identity_verification_image')){
            $path = 'uploads/profile/'.$userID->identity_verification_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('identity_verification_image');
            $filename = 'user_id_'. time() . '.' . $file->hashName();
            $file->move('uploads/profile/', $filename);
            $userID->identity_verification_image = $filename;
        }
        $userID->save();

        // ✅ Send email to admin if user uploaded a new identity document
         if($settings->email_notify == 1){
            if ($userID->id_verification == 0 && !empty($userID->identity_verification_image)) {
                Mail::to($settings->notifying_email)->send(new NotifyAdminOfNewDoc($userID));
            }
        }
        return back()->with('message', 'Profile updated successfully.');
    }


    //Updating user password
    public function updatePassword(Request $request){

        $validator = Validator::make($request->all(),[
            'oldpassword'=>'required',
            'new_password'=>'required|min:6|confirmed'

         ],[
            'oldpassword.required' => 'Please input your Old password',
            'new_password.required' => 'Please input a new password',
            'new_password.confirmed' => 'New Password does not match'

         ]);
         if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }else{
            $user = Auth::user();
            $update = User::findOrFail($user->id);
            if($update){
                if(Hash::check($request->oldpassword, $update->password)){
                    $update->password=Hash::make($request->new_password);
                    $update->save();
                    return back()->with('message', 'New Password updated successfully.');
                 }else{
                    return back()->with('info', 'Current Password Does not Match');
                 }
             }else{
                return back()->with('error', 'Record is missing');
            }
        }
    }

}
