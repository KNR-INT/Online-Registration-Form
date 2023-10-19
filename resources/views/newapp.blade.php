<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
<title>Online Registration</title>
<link rel="icon" href="https://leap.npsypr.edu.in/uploads/logo.png" type="image/x-icon">
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .alert {
            margin-bottom: 0;
            border-radius: 0;
            background-color: #17a2b8;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .card-footer {
            background-color: #f8f9fa;
            padding: 10px;
            text-align: center;
        }

        .card-footer a {
            text-decoration: none;
            color: #333;
        }
     </style>
      <style>
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand img {
            width: 50px;
            height: 45px;
            vertical-align: middle;
        }

        .navbar-brand span {
            font-size: 18px;
            vertical-align: middle;
        }

        .navbar-toggler-icon {
            background-color: white;
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
        }

        .navbar-nav .nav-item:last-child {
            margin-right: 0;
        }
	   .container {
            padding-top: 40px; /* Adjust the value as needed */
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-item {
                margin-right: 0;
                margin-bottom: 5px;
            }

            .navbar-nav .nav-item:last-child {
                margin-bottom: 0;
            }
        }
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="https://www.npsypr.edu.in/" class="navbar-brand">
            <img src="public/Image/NPS_logo.png" alt="Logo" style="width: 45px; height: auto;">
            <span>NATIONAL PUBLIC SCHOOL, YESHWANTHPUR</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('dashboard')}}" class="nav-link"><i class="fa fa-home"></i> <span>HOME</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('signout') }}" class="nav-link"><i class="fa fa-power-off"></i> <span>LOGOUT</span></a>
                </li>
            </ul>
        </div>
    </nav>

<body  style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
 
    
    <div class="container">
        <div class="row justify-content-center">
        <?php 
            // echo($row->name);
            $startDate = $mont_registration_date->from_date ; // Example start date from_date
            $endDate = $mont_registration_date->end_date; 
            $currentDate = date('Y-m-d');
            
            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                ?>
            <div class="col-md-3 col-sm-6">
                <div class="card" style="padding:10px;">
                    <div class="alert alert-info">
                    <a href="{{ url('guidelinesmont/a?class=mont') }}"><img src="public/Image/Mont.jpg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="card-footer text-center">
                        <h4> <a href="{{ url('guidelinesmont/a?class=mont') }}" class="d-block"> Montessori</a></h4>
                    </div>
                </div>
            </div>
            <?php
            }
        
            ?>

            <?php 
            // echo($row->name);
            $startDate = $kg_registration_date->from_date ; // Example start date from_date
            $endDate = $kg_registration_date->end_date; 
            $currentDate = date('Y-m-d');
            
            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                ?>

<div class="col-md-3 col-sm-6">
                <div class="card" style="padding:10px;">
                    <div class="alert alert-info">
                        <a href="{{ url('guidelinesmont/a?class=kinder') }}"><img src="public/Image/kindergarden.jpg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="card-footer text-center">
                        <h4><a href="{{ url('guidelinesmont/a?class=kinder') }}" class="d-block"> Kindergarten</a></h4>
                    </div>
                </div>
            </div>
<?php
            }
        
            ?>

            <?php 
            // echo($row->name);
            $startDate = $grade1to9_registration_date->from_date ; // Example start date from_date
            $endDate = $grade1to9_registration_date->end_date; 
            $currentDate = date('Y-m-d');
            
            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                ?>

            <div class="col-md-3 col-sm-6">
                <div class="card" style="padding:10px;">
                    <div class="alert alert-info">
                        <a href="{{ url('guidelinesmont/a?class=1to9') }}"><img src="public/Image/grade 1-9.jpg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="card-footer text-center">
                        <h4><a href="{{ url('guidelinesmont/a?class=1to9') }}" class="d-block"> Grade 1-9</a></h4>
                    </div>
                </div>
            </div>
            <?php
            }
        
            ?>

            <?php 
            // echo($row->name);
            $startDate = $grade11_registration_date->from_date ; // Example start date from_date
            $endDate = $grade11_registration_date->end_date; 
            $currentDate = date('Y-m-d');
            
            if ($currentDate >= $startDate && $currentDate <= $endDate) {
                ?>

            <div class="col-md-3 col-sm-6">
                <div class="card" style="padding:10px;">
                    <div class="alert alert-info">
                        <a href="{{ url('guidelinesmont/a?class=11') }}"><img src="public/Image/grade 11.jpg" alt=""  class="img-fluid"></a>
                    </div>
                    <div class="card-footer text-center">
                        <h4><a href="{{ url('guidelinesmont/a?class=11') }}" class="d-block"> Grade 11</a></h4>
                    </div>
                </div>
            </div>
            <?php
            }
        
            ?>

        </div>
    </div>
</body>

</html>
@include('footer')


