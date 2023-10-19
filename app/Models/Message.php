<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Mail\MyMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class Message extends Model
{
    use HasFactory;

    protected $table = 'otp';
    protected $fillable = ['email', 'otp'];



    public function sendToEmail($otp_number,$email) {

        $data = array(
            'otp' => $otp_number,
            'email' => $email,
            'subject' => 'OTP for Application submission to NPS YPR'
        );
        $mail_details = [
            'subject' => 'OTP for Application submission to NPS YPR',
            'body' => 'Your OTP is : '. $otp_number
        ];
        
        Mail::to($email)->send(new Message($data));
        // Mail::to($email)->send(new SendMail($mail_details));
        // return response(["status" => 200, "message" => "OTP sent successfully"]);
    }
}
