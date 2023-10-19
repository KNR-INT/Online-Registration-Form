<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
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
            width: 45px;
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
            padding-top: 40px; 
        }

        @media (max-width: 1000px) {
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
            <img src="https://leap.npsypr.edu.in/uploads/logo.png" alt="Logo" style="width: 45px; height: auto;">
            <span>NATIONAL PUBLIC SCHOOL, YESHWANTHPUR</span><br/>
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
</html>
