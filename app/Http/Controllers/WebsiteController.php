<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Str;
use App\Models\Otp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class WebsiteController extends Controller
{
    public function index(){
        
        $otp = mt_rand(100000, 999999);
        $data=['name'=>"vishal",'data'=>"Hello Vishal",'otp'=>$otp];
        $user['to']='padmajaac07@gmail.com';
        Mail :: send('mail',$data,function($messages)use($user){
            $messages->to($user['to']);
            $messages->subject('Hello Dev');
        });

        Otp::create(['user' => $user, 'otp' => $otp]);
       
}

}
