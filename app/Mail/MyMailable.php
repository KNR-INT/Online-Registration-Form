<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMailable;

class MyMailable1 extends Mailable
{
    use Queueable, SerializesModels;

    
    public $emails;
    public function __construct($details){
        // $this->emails = $emails;
        $this->details = $details;
    }

    public function build()
    {
        // return $this->subject('OTP for Application Submission to NPS YPR')
        //             ->view('otpgeneration')  
        //             ->with('otpgeneration', $this->emails);  
                    return $this->from('knrintind@gmail.com', 'Sender Name')
                    ->subject('Your Subject')
                    ->markdown('otpgeneration')
                    ->with('details', $this->details);
    }

    }

?>