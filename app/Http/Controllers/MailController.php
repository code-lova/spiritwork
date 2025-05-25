<?php

namespace App\Http\Controllers;

use App\Mail\SendSignUpEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function SendSignUpEmail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];

        Mail::to($email)->send(new SendSignUpEmail($data));
    }
}
