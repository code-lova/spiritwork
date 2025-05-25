<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AgreementActionRequired;
use App\Mail\RentPayment;
use App\Models\Agreement;
use App\Models\PaymentMethod;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AgreementController extends Controller
{
    public function index(){
        $data['title'] = 'Property Agreements';
        $data['agreement'] = Agreement::latest()->get();
        $data['settings'] = Settings::findOrFail(1);
        return view('admin.agreements.index', $data);
    }

    public function generateAgreement(int $agreementId){

        $agreement = Agreement::findOrFail($agreementId);

        $agreement->update([
            'payment_status' => 1,
            'agreement_date' => now(),
        ]);

        // Send email
        if ($agreement->email) {
            Mail::to($agreement->email)->send(new AgreementActionRequired($agreement));
        }

        return redirect()->back()->with('message', 'Agreement generated. user notified successfully.');
    }

    public function updatePaymentStatus(Request $request, int $agreementId){

        $agreement = Agreement::findOrFail($agreementId);
        $agreement->payment_status = $request->payment_status == true ? '2':'0';
        $agreement->agreement_date = now();
        $agreement->update();

        //send a mail here to notify tenant
        if ($agreement->email) {
            Mail::to($agreement->email)->send(new RentPayment($agreement));
        }

        return redirect()->back()->with('message','Payment Status and Agreement Date Updated Successfully');

    }
}
