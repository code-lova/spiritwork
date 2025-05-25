<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoFormRequest;
use App\Http\Requests\SitesettingFormRequest;
use App\Models\LogoFavicon;
use App\Models\PaymentMethod;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        $data['title'] = 'General Site Settings';
        $data['settings'] = Settings::find(1);
        return view('admin.settings.site-setting', $data);
    }


    public function StoreSiteSettings(SitesettingFormRequest $request){
        $ValidatedData = $request->validated();

        $settings = Settings::find(1);
        if($settings){
            $settings->title = $ValidatedData['title'];
            $settings->site_name = $ValidatedData['site_name'];
            $settings->site_description = $ValidatedData['site_description'];
            $settings->keywords = $ValidatedData['keywords'];
            $settings->email = $ValidatedData['email'];
            $settings->notifying_email = $ValidatedData['notifying_email'];
            $settings->mobile = $ValidatedData['mobile'];
            $settings->caution_fee = $ValidatedData['caution_fee'];
            $settings->estate_fee = $ValidatedData['estate_fee'];
            $settings->legal_fee = $ValidatedData['legal_fee'];
            $settings->landlord_name = $ValidatedData['landlord_name'];
            $settings->property_manager_name = $ValidatedData['property_manager_name'];
            $settings->signature = $ValidatedData['signature'];
            $settings->address = $ValidatedData['address'];
            $settings->registration = $request->registration == true ? '1':'0';
            $settings->email_notify = $request->email_notify == true ? '1':'0';
            $settings->save();
            return redirect()->back()->with('message', 'Site Settings Updated Successfully');
        }
        else{
            $settings = new Settings();
            $settings->title = $ValidatedData['title'];
            $settings->site_name = $ValidatedData['site_name'];
            $settings->site_description = $ValidatedData['site_description'];
            $settings->keywords = $ValidatedData['keywords'];
            $settings->email = $ValidatedData['email'];
            $settings->notifying_email = $ValidatedData['notifying_email'];
            $settings->mobile = $ValidatedData['mobile'];
            $settings->caution_fee = $ValidatedData['caution_fee'];
            $settings->estate_fee = $ValidatedData['estate_fee'];
            $settings->legal_fee = $ValidatedData['legal_fee'];
            $settings->landlord_name = $ValidatedData['landlord_name'];
            $settings->property_manager_name = $ValidatedData['property_manager_name'];
            $settings->signature = $ValidatedData['signature'];
            $settings->address = $ValidatedData['address'];
            $settings->registration = $request->registration == true ? '1':'0';
            $settings->email_notify = $request->email_notify == true ? '1':'0';
            $settings->save();
            return redirect()->back()->with('message', 'Site Settings Created Successfully');
        }
    }



    public function paymentFunction(){
        $data['title'] = 'Payment Method Page';
        $data['payment'] = PaymentMethod::latest()->get();
        return view('admin.payment-method.index', $data);
    }

    public function StorePaymentMethod(Request $request){
        $validator = Validator::make($request->all(), [
            'payment_name' => 'required|string',
            'payment_details' => 'required|string',
            'href' => 'nullable',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $payment = new PaymentMethod();
            $payment->payment_name = $request->payment_name;
            $payment->payment_details = $request->payment_details;
            $payment->href = $request->href;
            $payment->status = $request->status == true ? '1':'0';
            $payment->save();
            return redirect()->back()->with('message', 'Method Successfully Added');
        }
    }

    public function DestroyPayment(int $payment_id){
        $payment = PaymentMethod::findOrFail($payment_id);
        $payment->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');
    }


    public function UpdatePayment(Request $request, int $payment_id){
        $validator = Validator::make($request->all(), [
            'payment_name' => 'required|string',
            'payment_details' => 'required|string',
            'href' => 'nullable',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $payment = PaymentMethod::findOrFail($payment_id);
            $payment->payment_name = $request->payment_name;
            $payment->payment_details = $request->payment_details;
            $payment->href = $request->href;
            $payment->status = $request->status == true ? '1':'0';
            $payment->update();
            return redirect()->back()->with('message', 'Method Successfully Added');

        }
    }

    // Use when necessary later
    public function activateTerm($id){
        $data = PaymentMethod::all();
        foreach ($data as $datas){
            $datas->status = 0;
            $datas->save();
        }
        $default = PaymentMethod::find($id);
        if($default){
            $default->status = 1;
            $default->save();
            return redirect()->back()->with('message','This Payment has been Set to Default');
        }
        else{
            return redirect()->back()->with('error','Payment ID Not Found');
        }
    }


    //Logo and favicons settings
    public function logoPage(){
        $data['title'] = 'Logo & Favicon Settings';
        $data['logofav'] = LogoFavicon::find(1);
        return view('admin.settings.logo-favicon', $data);
    }

    public function StoreLogofav(LogoFormRequest $request){

        $logoFav = LogoFavicon::find(1);
        if($logoFav){
            if($request->hasFile('logo')){
                $destination_path = 'uploads/logofav/'.$logoFav->logo;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('logo');
                $filename = 'logo_1'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo = $filename;
            }
            if($request->hasFile('logo2')){
                $destination_path = 'uploads/logofav/'.$logoFav->logo2;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('logo2');
                $filename = 'logo_2'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo2 = $filename;
            }
            if($request->hasFile('favicon')){
                $destination_path = 'uploads/logofav/'.$logoFav->favicon;
                if(File::exists($destination_path)){
                    File::delete($destination_path);
                }
                $file = $request->file('favicon');
                $filename = 'favicon'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->favicon = $filename;
            }

            $logoFav->save();
            return redirect()->back()->with('message', 'Logo & Favicon Updated Successfully');
        }
        else{
            $logoFav = new LogoFavicon();
            if($request->hasFile('logo'))
            {
                $file = $request->file('logo');
                $filename = 'logo_1'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo = $filename;
            }
            if($request->hasFile('logo2'))
            {
                $file = $request->file('logo2');
                $filename = 'logo_2'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->logo2 = $filename;
            }
            if($request->hasFile('favicon'))
            {
                $file = $request->file('favicon');
                $filename = 'favicon'. time() . '.' . $file->hashName();
                $file->move('uploads/logofav/', $filename);
                $logoFav->favicon = $filename;
            }

            $logoFav->save();
            return redirect()->back()->with('message', 'Logo & Favicon Created Successfully');
        }
    }


}
