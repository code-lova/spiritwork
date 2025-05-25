<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use App\Models\Category;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\PropertyListing;
use App\Models\RepliedReport;
use App\Models\ResidentReport;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Welcome to Administrator Dashboard';
        $data['users'] = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(5);
        $data['counter'] = Counter::find(1);
        $data['totalusers'] = User::count();
        $data['totalReport'] = ResidentReport::count();
        $data['totalUnRepliedReport'] = ResidentReport::where('is_read', 0)->count();
        $data['totalRepliedReport'] = RepliedReport::count();
        $data['totalProperty'] = PropertyListing::count();
        $data['category'] = Category::count();
        $data['recentAgreement'] = Agreement::latest()->get();
        $data['agreement'] = Agreement::count();
        $data['pendingAgreement'] = Agreement::where('payment_status', 0)->count();
        $data['paidAgreement'] = Agreement::where('payment_status', 1)->count();
        $data['completedAgreement'] = Agreement::where('payment_status', 2)->count();
        $data['properties'] = PropertyListing::with('PropertyImages')
            ->where('status', 1)
            ->latest()
            ->limit(3)
            ->get();

        $data['settings'] = Settings::find(1);
        return view('admin.dashboard', $data);
    }
}
