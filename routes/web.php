<?php
 
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CustomAuthController;
    use App\Http\Controllers\StudentController;
    use App\Http\Controllers\ParentsController;
    use App\Http\Controllers\ImageUploadController;
    use App\Http\Controllers\MailController;
    use App\Http\Controllers\OtpController;
    use App\Http\Controllers\OtpMailController;
    use App\Http\Controllers\OtpMail;
    use App\Http\Controllers\WebsiteController;
    use Illuminate\Support\Facades\Hash;
    use App\Http\Controllers\PaytmController;
    use App\Models\PaytmWallet;
    use App\Mail\MyMailable;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Mail\Message;
    use Illuminate\Mail\Mailer;
    use Illuminate\Http\Request;
    use Symfony\Component\Mime\Address;
    use App\Models\Secondary;
    use Illuminate\Support\Facades\DB;
    use App\Models\Student;
    use App\Models\Parent1;
    use App\Models\Oldschool;
    use App\Http\Controllers\PdfGeneratorController;
    use App\Models\Payment;
    use Dompdf\Dompdf;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\Facades\Storage;
    

Route::get('/', [CustomAuthController::class, 'home']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
// Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout'); 
Route::get('home', [CustomAuthController::class, 'home']); 
Route::post('home', [CustomAuthController::class, 'home']); 



Route::post('login', [CustomAuthController::class, 'login'])->name('newlogin');




Route::get('otp', [CustomAuthController::class, 'otp'])->name('otp'); 

// Route::post('otp', [CustomAuthController::class, 'otp'])->name('otp'); 

Route::get('paytm_appli/{id}', [CustomAuthController::class,'paytm_appli'])->name('paytm_appli');
Route::get('fee_receipt/{id}', [CustomAuthController::class,'fee_receipt'])->name('fee_receipt');
Route::get('application_form/{id}', [CustomAuthController::class,'application_form'])->name('application_form');
// Route::post('loginWithOtp', [CustomAuthController::class,'loginWithOtp'])->name('loginWithOtp');
Route::get('loginWithOtp', function () {
    return view('auth/OtpLogin');
})->name('loginWithOtp');

Route::any('sendOtp', [CustomAuthController::class,'sendOtp']);

// Route::post('newapp', [CustomAuthController::class, 'newapp'])->name('newapp'); 
Route::get('newapp', [CustomAuthController::class, 'newapp'])->name('newapp'); 




// Route::post('guidelinesmont/{id}', [CustomAuthController::class, 'guidelinesmont'])->name('guidelinesmont'); 
Route::get('guidelinesmont/{id}', [CustomAuthController::class, 'guidelinesmont'])->name('guidelinesmont'); 


Route::post('onlinereg/{id}', [CustomAuthController::class, 'onlinereg'])->name('onlinereg'); 
Route::get('onlinereg/{id}', [CustomAuthController::class, 'onlinereg'])->name('onlinereg'); 

Route::post('parents_details/{id}', [CustomAuthController::class, 'parents_details'])->name('parents_details'); 
Route::get('parents_details/{id}', [CustomAuthController::class, 'parents_details'])->name('parents_details'); 

Route::post('upload_doc/{id}', [CustomAuthController::class, 'upload_doc'])->name('upload_doc'); 
Route::get('upload_doc/{id}', [CustomAuthController::class, 'upload_doc'])->name('upload_doc'); 


Route::post('application_details/{id}', [CustomAuthController::class, 'application_details'])->name('application_details'); 
Route::get('application_details/{id}', [CustomAuthController::class, 'application_details'])->name(''); 
Route::get('download_forms/{id}', [CustomAuthController::class, 'download_forms'])->name(''); 
Route::get('download_fee_reciepts/{id}', [CustomAuthController::class, 'download_fee_reciepts'])->name(''); 

Route::get('send_application/{id}', [PaytmController::class, 'send_application'])->name('send_application'); 

Route::post('payment/{id}', [CustomAuthController::class, 'payment'])->name('payment'); 
Route::get('payment/{id}', [CustomAuthController::class, 'payment'])->name('payment');
Route::post('admitted/{id}', [CustomAuthController::class, 'admitted'])->name('admitted'); 
Route::get('admitted/{id}', [CustomAuthController::class, 'admitted'])->name('admitted'); 
Route::post('payment/{id}', [CustomAuthController::class, 'payment'])->name('payment'); 
Route::get('payment/{id}', [CustomAuthController::class, 'payment'])->name('payment'); 

Route::post('admitted/{id}', [CustomAuthController::class, 'admitted'])->name('admitted'); 
Route::get('admitted/{id}', [CustomAuthController::class, 'admitted'])->name('admitted'); 

Route::post('myapp', [CustomAuthController::class, 'myapp'])->name('myapp'); 
Route::get('myapp', [CustomAuthController::class, 'myapp'])->name('myapp'); 

Route::post('draft', [CustomAuthController::class, 'draft'])->name('draft'); 
Route::get('draft', [CustomAuthController::class, 'draft'])->name('draft'); 

Route::post('submited', [CustomAuthController::class, 'submited'])->name('submited'); 
Route::get('submited', [CustomAuthController::class, 'submited'])->name('submited');

Route::get('insert','CustomAuthController@insertform');
Route::post('create','CustomAuthController@insert');


//  backend_integration

Route::get('students', [CustomAuthController::class, 'onlinereg']);
Route::get('store-student', [StudentController::class, 'store']);
// Route::post('store-student', [StudentController::class, 'store']);
Route::post('update-student-image', [StudentController::class, 'updatestudentimage']);

// Route::post('store-student', [ ImageUploadController::class, 'store' ])->name('store-student');

Route::get('store-parent', [ParentsController::class, 'store']);
Route::get('get-data/{store-parent}', [ParentsController::class, 'edit']);
 
Route::get('image-upload', [ ImageUploadController::class, 'upload_doc' ])->name('image.upload');
// Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
// Route::post('/storeImage',[ImageUploadController::class,'storeImage']);
Route::get('/update-applino',[StudentController::class,'updateapplino']);


//For showing an image
Route::get('/view-image',[ImageUploadController::class,'upload_doc'])->name('images.view');
Route::get('students', [CustomAuthController::class, 'application_details']);
Route::get('create-id', [CustomAuthController::class, 'create_id']);


Route::get('/users/{id}','CustomAuthController@show');

// /For storing an image
Route::post('/storeImage',[ImageUploadController::class,'storeImage']);
Route::get('/update-applino',[StudentController::class,'updateapplino']);
Route::get('/update-updateadmitted',[StudentController::class,'updateadmitted']);


//For showing an image
Route::get('/view-image',[ImageUploadController::class,'upload_doc'])->name('images.view');
Route::get('students', [CustomAuthController::class, 'application_details']);
Route::get('create-id', [CustomAuthController::class, 'create_id']);
Route::get('paymentsuccess', [CustomAuthController::class, 'paymentsuccess']);


    // return Redirect::to('paymentsuccess')->delay(5);
    //Paytm Payment paymentsuccess
Route::get('paytm-payment',[PaytmController::Class, 'paytmPayment'])->name('paytm.payment');
Route::post('paytm-callback',[PaytmController::Class, 'paytmCallback'])->name('paytm.callback');
Route::get('paytm-purchase',[PaytmController::Class, 'paytmPurchase'])->name('paytm.purchase');
// Route::get('paytm-sucess-page',[PaytmController::Class, 'paytmPurchase'])->name('paytm.purchase');
Route::get('otppostlogin', [CustomAuthController::class, 'otppostlogin']);
Route::get('/postlogin', function (Request $request) {
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
    
        $check_otp = DB::table('otp')
            ->where('email', $email)
            ->orderBy('id', 'desc')
            ->first();
        if(empty($check_otp )){
            $rand = mt_rand(100000, 999999);
            $data = [
                'name' => $email,
                'otp_number' => $rand,
            ];
            $log_orderid = DB::table('otp')->insert([
                'email' => $email,
                'otp' => $rand,
            ]);
        }
        else{
            $data = [
                'name' => $check_otp->email,
                'otp_number' => $check_otp->otp,
            ];

        }
        
    
        Mail::send('emails.test', $data, function (Message $message) use ($email) {
            $message->to($email)
                ->subject('OTP for Login');
        });
    
        return view('otp');

})->name('postlogin');

Route::get('/application_details', [PdfGeneratorController::class, 'application_details']);
Route::get('/print_fee_receipt-pdf', [PaytmController::class, 'generatePDF']);

Route::get('applicationpdf', [CustomAuthController::class, 'applicationpdf']);
Route::get('/show-image/{id}', [ImageUploadController::class, 'showImage'])->name('show.image');


// Define the route for storing the image
Route::post('/show-image/{imageName}', [ImageUploadController::class, 'storeImage'])->name('store.image');





















