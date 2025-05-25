<?php

namespace App\Helpers;

use App\Models\Agreement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\RenewalReminder; // You’ll create this in a moment

class AgreementRenewalHelper
{
    /**
     * Find all agreements whose agreement_date was exactly one year ago today,
     * send them a reminder email, and reset their payment_status to 0.
     */
    public static function sendRenewalReminders()
    {
        $today      = Carbon::today();
        $oneYearAgo = $today->copy()->subYear()->toDateString();

       // Grab everything still marked paid, with agreement_date <= one year ago
        //we will implement crone job here

       Agreement::where('payment_status', 2)
        ->whereDate('agreement_date', $oneYearAgo)
        ->chunkById(100, function ($agreements) {
            foreach ($agreements as $agreement) {
                // send the reminder
                Mail::to($agreement->email)
                    ->send(new RenewalReminder($agreement));

                // reset their status so we don’t remind again
                $agreement->update([
                    'payment_status' => 0,
                ]);
            }
        });
    }
}
