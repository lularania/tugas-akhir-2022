<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\SignupEmail;


class MailController extends Controller
{
    public static function sendSignUpEmail($email, $verification_code) {
        $data = [
            'email' => $email,
            'verification_code' => $verification_code
        ];
        // dd($email);
       Mail::to($email)->send(new SignupEmail($data));
    }
}
