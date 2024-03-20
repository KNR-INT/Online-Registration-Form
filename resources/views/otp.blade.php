<?php
$rand_key = request()->session()->get('login.rand_key');
$rand_key0 = $rand_key[0] ?? '';

if (!empty($rand_key[0])) {
    header("Refresh: 2;");
    header("Location: dashboard");
    exit();
}
?>
@extends('layout')
@section('content')
<html lang="en">
<head>
<link rel="icon" href="https://leap.npsypr.edu.in/uploads/logo.png" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script> -->
</head>
<body>
    <div class="bg-image">
        <div class="card">
        <div class="card-header">
                    <div class="user-panel">
            <div>
                <?php
               $school_details = DB::connection('secondary')->table('schooldetails')->get();
                // print_r($school_details);
                $school_logo = $school_details[0]->schoollogo;
                $base_url = $school_details[0]->base_url;
                echo '<img src="'.$base_url.$school_logo.'" class="logo" alt="Logo">'
                ?>
                <!--<img src="{{ asset('public/Image/NPS_logo.png') }}" class="logo" alt="Logo">-->
            </div><br/>
            <div class="card-body">
                <h1><?php echo $school_details[0]->schoolname ?></h1>
                <h3>Online Registration</h3>
            </div>
            </div>
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div>
                <h6>OTP for login has been sent to your email id. Please check your spam folder as well</h6>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-info">
                    {{ \Session::get('message') }}
                </div>
            @endif
            <form method="GET" action="{{ route('otp') }}">
                @csrf
                <div class="col-md-6 form-group mx-auto">
                <input type="text" placeholder="Enter the OTP" id="otp" class="form-control" name="otp" autofocus>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                <div class="g-recaptcha" data-sitekey="6LfuTH0gAAAAADa966cAoO4eHhGyIla2OkKzXlNK" data-callback="enableBtn"></div>
                </div>
                <button disabled="disabled" type="submit" id="button1" class="btn btn-dark btn-block">Login</button>
            </form>
        </div>
    </div>

    <script>
        function enableBtn(){
                  document.getElementById("button1").disabled = false;
              }
    </script>
</body>
<style>
        body {
          overflow: auto;
          } 

          .bg-image {
            position: relative; 
            max-width: 1000px; 
            min-height: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .bg-image::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("public/public/Image/school-background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(5px);
            z-index: -1; 
        }

        .logo {
            height: 70px;
            width: 70px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8); 
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 450px;
            width: 100%;
            margin-top: 30px; 
            margin-bottom: 30px;
        }

        .card img {
            height: 100px;
            width: 100px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
        }

        h3 {
            font-family: Calibri, sans-serif;
            color: black;
            font-size: 1.5rem;
        }

        .form-control {
            width: 100%;
            margin-top: 15px;
        }

        .g-recaptcha {
            margin-top: 20px;
        }

        .btn-dark {
            margin-top: 15px;
        }

        .error-message {
            color: red;
        }

    
        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            h3 {
                font-size: 1.2rem;
                width: auto;
            }

            .logo {
                height: 50px;
                width: 50px;
            }

            .form-control {
                margin-top: 10px;
            }

            .g-recaptcha {
                margin-top: 15px;
            }

            .btn-dark {
                margin-top: 10px;
            }
        }
    </style>
@include('footer')
</html>

@endsection
