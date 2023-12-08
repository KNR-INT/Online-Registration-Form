<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;
use App\Mail\WelcomeEmail;
use App\Mail\OtpMail;
use App\Mail\OtpController;
use App\Models\Mail;
use App\Models\Secondary;
use Illuminate\Support\Carbon;

// use Illuminate\Support\Facades\Mail;
use App\Mail\MyMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Otp;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;


class CustomAuthController extends Controller
{
    public function home()
    {
        return view('login');
    }

    public function index()
    {
        return view('login');
    }

    public function otppostlogin(Request $request)
    {
        $email = $request->email;
        session()->push('login.email', $email);
    
        $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
    
        if (empty($users)) {
            $created = date("D-m-y h:i:s");
            $data = array("email" => $email, "created_at" => $created);
            DB::table('users')->insert($data);
    
            $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
            $user_id = $users[0]->id;
            session()->push('users.user_id', $user_id);
        } else {
            $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
            $user_id = $users[0]->id;
            session()->push('users.user_id', $user_id);
        }
    
        $rand = mt_rand(100000, 999999);
        $data = [
            'name' => $email,
            'otp_number' => $rand,
        ];
        $log_orderid = DB::table('otp')->insert([
            'email' => $email,
            'otp' => $rand,
        ]);
    
        Mail::send('emails.test', $data, function (Message $message) use ($email) {
            $message->to($email)
                ->subject('OTP for Login');
        });
    
        return view('otp');
    }
    

    public function otp(Request $request)
    {
        $otp = $request->otp;
        $session = request()->session()->get('login.email');
        if(empty($session[0]))
        {
            return redirect('/login');
        }
        else {
        $ses_email = $session[0];
        }

        if($ses_email == 'admissions@npsypr.edu.in'){
            $teacher_otp = 123456;
            if($teacher_otp == $otp){
                return view ('dashboard');
            }
            else{
                return back()->with('error', 'Invalid Teacher OTP');
            }
        }
        else{
            $users = DB::table('otp')
            ->where('email', $ses_email)
            ->orderBy('id', 'desc')
            ->first();
            // $users = DB::select("SELECT * FROM `otp` WHERE `email` = '$ses_email' ORDER BY `id` DESC LIMIT 1");
            $user_otp = $users->otp ?? '';
            $rand_key = 987654321;
            session()->push('login.rand_key', $rand_key);

            // $session = Session::get('login.email');
            // $ses_email = $session[0];
            if($user_otp == $otp){
                $delete_otp =DB::table('otp')
                ->where('email', $ses_email)
                ->delete();
                return redirect("dashboard");

                // header("Location: dashboard");
            }
         
            else{
                return back()->with('error', 'Invalid OTP');
            }
        }
    }

    public function signup()
    {
        return view('registration');
    }

    public function signupsave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'unique:users,email_address,'

        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard");
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    public function dashboard()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        $session = request()->session()->get('users.user_id');
        return view('dashboard');
        }
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function header()
    {
        return view('headerpage');
    }
    public $successStatus = 200;
    public function loginWithOtp(Request $request)
    {
        Log::info($request);
        $user = User::where([['email', '=', request('email')], ['otp', '=', request('otp')]])->first();
        if ($user) {
            Auth::login($user, true);
            User::where('email', '=', $request->email)->update(['otp' => 7878]);
            return view('home');
        } else {
            return Redirect::back();
        }
    }

    public function sendOtp(Request $request)
    {
        $otp = rand(1000, 9999);
        Log::info("otp = " . $otp);
        $user = User::where('email', '=', $request->email)->update(['otp' => $otp]);
        return response()->json([$user], 200);
    }

    public function newapp()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        $registration_date = DB::connection('secondary')->table('online_application_date')->get();

        $kg_registration_date = DB::connection('secondary')
            ->table('online_application_date')
            ->where('name', '=', 'Kindergarten') 
            ->first();

        $mont_registration_date = DB::connection('secondary')
            ->table('online_application_date')
            ->where('name', '=', 'Montessori')
            ->first();

        $grade1to9_registration_date = DB::connection('secondary')
            ->table('online_application_date')
            ->where('name', '=', 'Grade 1-9') 
            ->first();

        $grade11_registration_date = DB::connection('secondary')
            ->table('online_application_date')
            ->where('name', '=', 'Grade 11') 
            ->first();

        return view('newapp', ['registration_date' => $registration_date, 'kg_registration_date' => $kg_registration_date, 'mont_registration_date' => $mont_registration_date, 'grade1to9_registration_date' => $grade1to9_registration_date, 'grade11_registration_date' => $grade11_registration_date]);
        }
    }

    public function guidelinesmont()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
            $acadamic_year_online= DB::connection('secondary')
            ->table('academic_year')
            ->where('set_application_year', '=', 'Yes') 
            ->first();
            $registrationFee = DB::connection('secondary')
            ->table('application_fee')
            ->where('year', '=', $acadamic_year_online->academic_year)
            ->value('amount');
        return view('guidelinesmont', ['registrationFee' => $registrationFee]);
        }
    }

    public function parents_details()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        return view('parents_details');
        }
    }


    public function upload_doc()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        $acadamic_year = DB::connection('secondary')
        ->table('academic_year')
        ->where('lock_fee_settings', '=', 'Yes') // Replace 'name' with your column name
        ->first();
        return view('upload_image', ['acadamic_year' => $acadamic_year,]);
        }
    }
    public function imageretriew()
    {
        return view('imageretriew');
    }

    public function application_details(Request $request)
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); 
        }
        else{
        $appli_id = $request->input('appli_id');
        $class = $request->input('page_type');
        $students = Student::all();
        $acadamic_year_online= DB::connection('secondary')
        ->table('academic_year')
        ->where('set_application_year', '=', 'Yes') 
        ->first();
        // return view('upload_image', ['acadamic_year' => $acadamic_year,]);
        return view('application_details', compact('students'), ['acadamic_year_online' => $acadamic_year_online,]) ;
        return redirect('payment/a?class=' . $class . "&appli_id=" . $appli_id);
        }
    }

    public function payment()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); 
        }
        else{
        $acadamic_year_online= DB::connection('secondary')
        ->table('academic_year')
        ->where('set_application_year', '=', 'Yes') 
        ->first();
        $registrationFee = DB::connection('secondary')
        ->table('application_fee')
        ->where('year', '=', $acadamic_year_online->academic_year)
        ->value('amount');
        return view('payment', ['registrationFee' => $registrationFee], ['acadamic_year_online' => $acadamic_year_online,]);
        // return view('payment');
        }
    }
    public function admitted(Request $request)
    {
        return view('admitted');
    }
    public function onlinereg()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
            $currentDateIST = Carbon::now()->timezone('Asia/Kolkata')->toDateString();
            $acadamic_year_online= DB::connection('secondary')
            ->table('academic_year')
            ->where('set_application_year', '=', 'Yes') 
            ->first();
            return view('onlinereg' ,['currentDateIST' => $currentDateIST], ['acadamic_year_online' => $acadamic_year_online,]);
        }
    }

    // public function paymentsuccess(Request $request)
    // {
    //     // $appli_id = $request->input('appli_id');
    //     $appli_id = '570';
    //     return view('paymentsuccess',['order_id' => $appli_id]);
    // }


    public function create_id(Request $request)
    {
        $class_name = $request->input('class_name');
        $session = Session::get('login.email');
        $ses_email = $session[0];
        $sessions1 = Session::get('users.user_id');
        $ses_userid = $sessions1[0];
        $created = date("d-m-y h:i:s");
        $data = array("email_id" => $ses_email, "user_id" => $ses_userid, "created_at" => $created, "link_class" => $class_name, "status" => "Draft");
        DB::table('students')->insert($data);
        $users = DB::select("SELECT * FROM `students` WHERE `email_id` = '$ses_email' ORDER BY `id` DESC LIMIT 1");
        $user_id = $users[0]->id;

        echo json_encode($user_id);
        exit();
    }

    public function myapp()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        return view('myapp');
        }
    }

    public function draft()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        $sessions = request()->session()->get('users.user_id');
        $ses_userid = $sessions[0];
        $student = Student::where('status', 'Draft')
        ->where('user_id', $ses_userid)
        ->whereNotNull('name')
        ->get();
        return view('draft', compact('student'));
        }
    }

    public function submited()
    {
        if (!session()->has('users.user_id')) {
            return redirect('/login'); // Redirect to the login page
        }
        else{
        $sessions = request()->session()->get('users.user_id');
        $ses_userid = $sessions[0];
        $student = DB::select("SELECT * FROM `students` WHERE `status` LIKE 'Submitted' AND `user_id` = '$ses_userid'");
        return view('submited', compact('student'));
     }
    }


    public function displayImage($imageName)
    {
        $path = public_path('public/' . $imageName);
        // $request->image->move(public_path('public\Image'), $imageName);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
   
    public function login(Request $request)
    {
        if (session()->has('users.user_id')) {
            return redirect('/dashboard'); // Redirect to the login page
        }
        else{
        Session::forget('login');
        Session::forget('users.user_id');
        $email = $request->email;
        session()->push('login.email', $email);
        $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
        if (empty($users)) {
            $created = date("Y-m-d h:i:s");
            $data = array("email" => $email, "created_at" => $created);
            DB::table('users')->insert($data);

            $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
            $user_id = $users[0]->id;
            session()->push('users.user_id', $user_id);

            $otp_number = mt_rand(100000, 999999);
            $data = ['name' => "Dear Parent,", 'otp' => $otp_number];
            $user['to'] = $email;

            return view('otp');
        } 
        else {
            $users = DB::select("SELECT * FROM `users` WHERE `email` = '$email'");
            $user_id = $users[0]->id;
            session()->push('users.user_id', $user_id);

            $otp_number = mt_rand(100000, 999999);
            $data = ['name' => "Dear Parent,", 'otp' => $otp_number];
            $user['to'] = $email;
            return view('otp');
        }
    }
    }

    public function paytm_appli()
    {
        return view('otpgeneration');
    }

    public function fee_receipt()
    {
        return view('print_fee_receipt');
    }
    public function application_form()
    {
        return view('print_application_form');
    }


    public function applicationpdf()
    {
        $online_applications = Student::all();
        return view('applicationpdf', ['online_applications' => $online_applications]);
    }

    public function download_forms(Request $request)
    {
        $order_id = $request->input('appli_id');
        $pdf = app('dompdf.wrapper');

        try {
            $ppp = 'preetam';
            $pdf_name = $order_id . "_application_form" . time();
            $file_name1 = $order_id."_application_form.pdf";
            $data = array("application_form" => $file_name1);
            $where = array("id" => $order_id);
            DB::table('students')->where($where)->update($data);
            $data = ['appli_id' => $order_id];
            $pdf = $pdf->loadView('print_application_form')->save(public_path('public/'.$order_id . "_application_form.pdf"));
            $content = $pdf->download($order_id . "_application_form");
            $content1 = $pdf->stream($order_id . "_application_form");
            return Response::make($content1)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $pdf_name . '.pdf"');

            $publicpath = 'public';
            Storage::put($publicpath, $content);
        } catch (Exception $e) {
            throw new Exception("Error PDF");
        }
    }

    public function download_fee_reciepts(Request $request)
    {
        $order_id = $request->input('appli_id');
        $pdf = app('dompdf.wrapper');

        try {
            $ppp = 'preetam';
            $pdf_name = $order_id . "print_fee_receipt" . time();
            $file_name = $order_id."print_fee_receipt.pdf";
            $data = array("fee_receipt" => $file_name);
            $where = array("id" => $order_id);
            DB::table('students')->where($where)->update($data);
            $data = ['appli_id' => $order_id];
            $pdf = $pdf->loadView('print_fee_receipt')->save(public_path('public/'.$order_id . "print_fee_receipt.pdf"));

            $content = $pdf->download($order_id . "print_fee_receipt");
            $content1 = $pdf->stream($order_id . "print_fee_receipt");
            return Response::make($content1)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $pdf_name . '.pdf"');

            $publicpath = 'public';
            Storage::put($publicpath, $content);
        } catch (Exception $e) {
            throw new Exception("Error PDF");
        }
    }

}