<?php

namespace App\Http\Controllers;

use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function index($email)
    {
        $otp = Str::random(6);
        $data=['name'=>"vishal",'data'=>"Hello Vishal",'otp'=>$otp];
        $user['to']='no-reply@npsypr.edu.in';
        Mail :: send('mail',$data,function($messages)use($user){
            $messages->to($user['to']);
            $messages->subject('Hello Dev');
        });
         // Generate a 6-digit OTP
        Otp::create(['email' => $email, 'otp' => $otp]);

        // Code for sending email with OTP
        Mail::to($user)->send(new OtpMailController($otp));

        $otp = Str::random(6);
        $otp = mt_rand(1000,9999);
        return $otp;
    }
}
