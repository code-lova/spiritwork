<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NotifyAdminOfNewDoc;
use App\Mail\NotifyTenantOfDocStatus;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class ResidentController extends Controller
{
    public function residentPage(){
        $data['title'] = 'Resident List';
        $data['users'] = User::latest()->get();
        return view('admin.residents.index', $data);
    }

    public function EditUser($id)
    {
        $data['title'] = 'Resident Profile';
        $data['userProfile'] = User::findOrFail($id);
        return view('admin.residents.profile', $data);
    }

    public function BlockResident($id)
    {
        $blockUser = User::findOrFail($id);
        $blockUser->is_active = 0;
        $blockUser->save();
        return response()->json([
            'status'=>200,
            'message'=>'User Account Blocked Successfully',
        ]);
    }


    public function UnBlockResident($id)
    {
        $blockUser = User::findOrFail($id);
        $blockUser->is_active = 1;
        $blockUser->save();
        return response()->json([
            'status'=>200,
            'message'=>'User Account UnBlocked Successfully',
        ]);
    }

    public function destroyUser($id)
    {
        $userID = User::find($id);
        if($userID)
        {
            $userID->delete();
            return response()->json([
                'status'=>200,
                'message'=>'All User Data Deleted Successfully',
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'User ID Not Found',
            ]);
        }
    }

    public function verifyIdentity(int $id){
        $user = User::findOrFail($id);
        $settings = Settings::findOrFail(1);
        $user->id_verification = 1;
        $user->save();

        if($settings->email_notify == 1){
            Mail::to($user->email)->send(new NotifyTenantOfDocStatus($user, 'approved'));
        }
        return response()->json([
            'status'=>200,
            'message'=>'Tenant Document verified successfully',
        ]);
    }

    public function UnverifyIdentity(int $id){
        $user = User::findOrFail($id);
        $settings = Settings::findOrFail(1);
        $filePath = public_path('uploads/profile/'. $user->identity_verification_image);
        if(File::exists($filePath)){
            File::delete($filePath);
        }
        $user->identity_verification_image = null;
        $user->id_verification = 0;
        $user->save();

        // ✅ Send email
         if($settings->email_notify == 1){
            Mail::to($user->email)->send(new NotifyTenantOfDocStatus($user, 'denied'));
         }
        return response()->json([
            'status'=>200,
            'message'=>'Tenant Document denied succesfully',
        ]);
    }
}
