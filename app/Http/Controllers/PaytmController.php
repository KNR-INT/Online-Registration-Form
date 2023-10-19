<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PaytmWallet;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class PaytmController extends Controller
{
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function PaytmPayment(Request $request)
    {
        $appli_id = $request->input('appli_id');
        // $session = session()->get('login.email');
      //   $ses_email = $session[0];
        $users = DB::select("SELECT * FROM `students` WHERE `id` = '$appli_id'");
        $randomNumber = rand(100000, 99999990);
        $order_id = "NPSO2024".$randomNumber;
        
       $insertorder_id =  DB::table('students')
        ->where('id', $appli_id)
        ->update(['order_id' => $order_id]);
        
        $log_orderid = DB::table('orderid_logs')->insert([
        'application_id' => $appli_id,
        'order_id' => $order_id,
        ]);
    
      //   $user_id = $users[0]->id;
        $payment = PaytmWallet::with('receive');
        $acadamic_year_online= DB::connection('secondary')
        ->table('academic_year')
        ->where('set_application_year', '=', 'Yes') 
        ->first();
        $registrationFee = DB::connection('secondary')
        ->table('application_fee')
        ->where('year', '=', $acadamic_year_online->academic_year)
        ->value('amount');
        $payment->prepare([
          'order' => $order_id,
          'user' => $appli_id,
          'mobile_number' => $users[0]->father_mob,
          'email' => $users[0]->email_id,
          'amount' => $registrationFee,
          'callback_url' => route('paytm.callback'),
        ]);
        return $payment->receive();
    }

    

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paytmCallback(Request $request)
    {
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful())
        {
          //Transaction Successful
          $payment = new PaytmWallet();
          $order_id = $response['ORDERID'];
          $txn_id = $response['TXNID'];
          $txn_amount = $response['TXNAMOUNT'];
          $txn_date = $response['TXNDATE'];
          $status = $response['STATUS'];
          if( isset( $response["RESPMSG"] ) ){
              $RESPMSG = $response["RESPMSG"];
         }
         else
         {
            $RESPMSG = null;
         }
        if( isset( $response["BANKNAME"] ) ){
            $bank_name = $response["BANKNAME"];
          }
          else
          {
            $bank_name = null;
          }
        if( isset( $response["BANKTXNID"] ) ){
            $BANKTXNID = $response["BANKTXNID"];
          }
          else
          {
            $BANKTXNID = null;
          }
          $user = DB::table('students')
          ->where('order_id', $order_id)
          ->first();
          $acad = $user->academic_year;
          $appli_id = $user->id;
          // Update other relevant fields based on your requirements
          $data=array("order_id"=>$order_id,"txn_id"=>$txn_id,"bank_name"=>$bank_name,"txn_amount"=>$txn_amount,"txn_date"=>$txn_date,"status"=>$status,"appli_id" => $appli_id,"response_msg"=>$RESPMSG, "bank_txn_id"=>$BANKTXNID);
          DB::table('payment')->insert($data);

          
          $data1=array("appli_id"=>$order_id);
          
          DB::table('fee_receipt_number')->insert($data1);
          
          $users = DB::select("SELECT * FROM `fee_receipt_number` WHERE `appli_id` = '$order_id' ORDER BY `receipt_number` DESC LIMIT 1");
          $rno = $users[0]->receipt_number;
          $last_fee_receipt = sprintf('%04u', $rno);
          $fee_receipt_no = "NPSYPR/".$acad."/".$last_fee_receipt;
          
          DB::table('students')->where("order_id",$order_id)->update(["fee_receipt_no"=>$fee_receipt_no,"status"=>"Submitted"]);


          $users = DB::select("SELECT * FROM `students` WHERE `order_id` = '$order_id'");
          $user = DB::table('students')
          ->where('order_id', $order_id)
          ->first();
          
          $email = $user->email_id;
          $pdf = app('dompdf.wrapper');
          $order_id = $user->id;

          // $patment_data =  [];
          DB::table('students')->where("id",$order_id)->update(['fee_tranx_date' => $txn_date , 'fee_status'=>'PAID']);
         
          try {
            $ppp = 'preetam';
            $pdf_name = $order_id."_fee_receipt" . time();
            $file_name = $order_id."_fee_receipt.pdf";
            $data = ['appli_id'=>$order_id];
            $pdf = $pdf->loadView('print_fee_receipt', $data)->save(public_path('public/'.$order_id."_fee_receipt.pdf"));
            DB::table('students')->where("id",$order_id)->update(["fee_receipt"=>$file_name]);
            $content = $pdf->download($order_id."_fee_receipt");
            $publicpath = 'public';
            Storage::put($publicpath, $content);
          } catch(Exception $e) {
             throw new Exception("Error PDF");
          }

          // Send the email with the attached PDF
          // Mail::send('emails.transcation', $data, function (Message $message) use ($email, $order_id) {
          //     $message->to($email)
          //         ->subject('Application Details - Fee Receipt')
          //         ->attach(public_path($order_id . "_fee_receipt.pdf"));
          //         // ->attach(public_path($order_id . "_application_form.pdf"));
          // });
          // return redirect()->route('send_application', ['appli_id' => $order_id]);
          // return redirect()->action(
          //   'PaytmController@send_application', ['appli_id' => $order_id]
        // );
        return redirect('send_application/a?appli_id='.$order_id);

      //   Mail::send('emails.transcation', $data, function (Message $message) use ($email, $order_id) {
      //     $message->to($email)
      //         ->subject('Application Details - Application form')
      //         // ->attach(public_path($order_id . "_fee_receipt.pdf"))
      //         ->attach(public_path($order_id . "_application_form.pdf"));
      // });
      // redirect('application_form/a?appli_id='.$order_id);

        }

        else if($transaction->isFailed())
        {
          //Transaction Failed
          $payment = new PaytmWallet();
          $order_id = $response['ORDERID'];
          $txn_amount = $response['TXNAMOUNT'];
          $status = $response['STATUS'];
          // Update other relevant fields based on your requirements
          $data=array("order_id"=>$order_id,"txn_amount"=>$txn_amount,"status"=>$status);
          DB::table('payment')->insert($data);
          return view('paytm.paytm-fail');
        }

        else if($transaction->isOpen())
        {
          //Transaction Open/Processing
          $payment = new PaytmWallet();
          $order_id = $response['ORDERID'];
          $txn_amount = $response['TXNAMOUNT'];
          $status = $response['STATUS'];
          // Update other relevant fields based on your requirements
          $data=array("order_id"=>$order_id,"txn_amount"=>$txn_amount,"status"=>$status);
          DB::table('payment')->insert($data);
          return view('paytm.paytm-fail');
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }

    /**
     * Paytm Payment Page
     *
     * @return Object
     */
    public function send_application(Request $request)
    {
      
      $order_id = $request->appli_id;
      $pdf = app('dompdf.wrapper');
      $users = DB::select("SELECT * FROM `students` WHERE `id` = '$order_id'");
      $email = $users[0]->email_id;
      $appli_no = $users[0]->application_no;
      $appli_class = $users[0]->link_class;

      $father_email = $users[0]->father_email_verified_at;
      $mother_email = $users[0]->mother_email_verified_at;

      try {
        $ppp = 'preetam';
        $pdf_name= $order_id."_application_form" . time();
        $file_name1 = $order_id."_application_form.pdf";
        $data = ['appli_id'=>$order_id];
        $pdf = $pdf->loadView('print_application_form', $data)->save(public_path('public/'.$order_id."_application_form.pdf"));
        DB::table('students')->where("id",$order_id)->update(["application_form"=>$file_name1]);
        $content = $pdf->download($order_id."_application_form");
        $publicpath = 'public';
        Storage::put($publicpath, $content);
      } catch(Exception $e) {
         throw new Exception("Error PDF");
      }

      if($appli_class == '1to9' || $appli_class == '11'){
      Mail::send('emails.transcation', $data, function (Message $message) use ($email,  $father_email, $mother_email, $order_id, $appli_no) {
        $message->to($email)
                ->cc($father_email)
                ->bcc($mother_email)
            ->subject('NPS YPR – ONLINE APPLICATION FOR REGISTERATION "'.$appli_no.'"')
            ->attach(public_path('public/'.$order_id . "_fee_receipt.pdf"))
            ->attach(public_path('public/'.$order_id . "_application_form.pdf"));
      });
      }
      elseif ($appli_class == 'kinder') {
        Mail::send('emails.kinder_mail', $data, function (Message $message) use ($email, $father_email, $mother_email, $order_id, $appli_no) {
          $message->to($email)
                  ->cc($father_email)
                  ->bcc($mother_email)
              ->subject('NPS YPR – ONLINE APPLICATION FOR REGISTERATION "'.$appli_no.'"')
              ->attach(public_path('public/'.$order_id . "_fee_receipt.pdf"))
              ->attach(public_path('public/'.$order_id . "_application_form.pdf"));
        });
      }
      elseif ($appli_class == 'mont') {
        Mail::send('emails.mont_mail', $data, function (Message $message) use ($email, $father_email, $mother_email, $order_id, $appli_no) {
          $message->to($email)
                  ->cc($father_email)
                  ->bcc($mother_email)
              ->subject('I-5 Academy - ONLINE APPLICATION "'.$appli_no.'"')
              ->attach(public_path('public/'.$order_id . "_fee_receipt.pdf"))
              ->attach(public_path('public/'.$order_id . "_application_form.pdf"));
        });
      }
    return View::make('paymentsuccess',['order_id' => $order_id])->with('delay', 5000);
    // return Redirect::to('paymentsuccess')->delay(5);
    // return view('login');
    }
    public function paytmPurchase()
    {
        return view('paytm.payment-page');
    } 
}