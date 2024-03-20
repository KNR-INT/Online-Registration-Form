@extends('layout')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="https://leap.npsypr.edu.in/uploads/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

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
        .bg-image {
            align-items: flex-start;
        }

        .card {
            margin: 10px;
            padding: 20px;
        }

        .logo {
            height: 50px;
            width: 50px;
        }

        h1 {
            font-size: 1.5rem;
        }

        h3 {
            font-size: 1.2rem;
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

        .error-message {
            font-size: 0.9rem;
        }
    }
    </style>
</head>
<body>
    <div class="bg-image">
        <div class="card">
        <div class="card-header">
                    <!-- <div class="user-panel"> -->
            <div>
                <?php
                $school_details = DB::connection('secondary')->table('schooldetails')->get();
                // print_r($school_details);
                $school_logo = $school_details[0]->schoollogo;
                $base_url = $school_details[0]->base_url;
                echo '<img src="'.$base_url.$school_logo.'" class="logo" alt="Logo">'
                ?>
            </div><br/>
            <div class="card-body">
                <h1><?php echo $school_details[0]->schoolname ?></h1>
                <h3>Online Registration</h3>
            </div>
            <!-- </div> -->
            @if (\Session::has('message'))
                <div class="alert alert-info">
                    {{ \Session::get('message') }}
                </div>
            @endif
            <form method="GET" action="{{ route('postlogin') }}">
                @csrf
                <div class="col-md-10 form-group mx-auto">
                    <input type="text" placeholder="Enter your Email" id="email" class="form-control" maxlength="50" name="email" autofocus>
                    @if ($errors->has('email'))
                        <span class="error-message">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="col-12 md-3 d-flex justify-content-center my-2">
  <div class="g-recaptcha" data-sitekey="6LfuTH0gAAAAADa966cAoO4eHhGyIla2OkKzXlNK" data-callback="enableBtn" ></div>
</div>
                <button disabled="disabled" type="submit" id="button1" class="btn btn-dark btn-block">Send OTP</button>
            </form>
        </div>
    </div>

    <script>
        $('#email').on('change', function() {
            if (/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/.test($(this).val())) {
                document.getElementById("email_err").innerHTML = "";
            } else {
                document.getElementById("email_err").innerHTML = "Invalid Email ID";
            }
        });

        function enableBtn() {
            document.getElementById("button1").disabled = false;
        }
    </script>
</body>
</head>
</html>
@include('footer')
@endsection