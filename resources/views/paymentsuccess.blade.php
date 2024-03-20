<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .myform-container {
            /* background-color: #f8f9fa; */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .logo-container {
            margin-bottom: 20px;
        }

        .logo-container h3{
            color: #15375A;
            font-weight: bold;
        }

        .logo-container img {
            height: 250px;
            border-radius: 10px;
            padding: 0px;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .button-container a {
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px; 
        }

        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #0056b3; /* Darken the button on hover */
        }
    </style>
</head>
<body>
    @csrf
    @if($errors->any())
        <div class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
            <span class="alert-text text-black">
                {{$errors->first()}}
            </span>
        </div>
    @endif
    @if(session('success'))
        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
            <span class="alert-text text-white">
            {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </button>
        </div>
    @endif
<div style="max-width: 400px; margin: 100px auto; padding: 0px; cellspacing:0px; ">
        <div class="col-md-1">
            <div class="myform-container">
                <div class="logo-container">
                    <img id="blah" src="https://cdn.dribbble.com/users/1751799/screenshots/5512482/media/1cbd3594bb5e8d90924a105d4aae924c.gif" alt="your image">
                    
                   <center> <h3>Payment Successful</h3></center>
                   <center> <h3>Application Submitted Successfully!</h3></center>

                </div>
                <div class="clearfix"></div>
                <div class="button-container">
                    <a href="{{ url('download_forms') }}/a?appli_id={{ $order_id }}" class="download">
                    <center> <button>Download Application Form</button></center>
                    </a>
                    <a href="{{ url('download_fee_reciepts') }}/a?appli_id={{ $order_id }}" class="fee-receipt">
                      <center>  <button>Download Fee Receipt</button></center>
                    </a>
                    <a href="{{ url('dashboard') }}" class="home">
                    <center> <button>Home</button></center>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
