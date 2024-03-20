<!DOCTYPE html>
<html lang="en">
@include('head')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

<body  style="background-color: #ffffff; font-family: Arial, sans-serif;">   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="custom-info-alert">
                        <a href="newapp" class="center-image"><img src="public/public/Image/111.jpeg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="card-footer" style="background-color: #FFB673;">
    <h4><a href="newapp" class="d-block">New Application</a></h4>
</div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="custom-info-alert">
                        <a href="myapp" class="center-image"><img src="public/public/Image/666.jpeg" alt="" class="img-fluid"></a>
                    </div>
                    <div class="card-footer" style="background-color: #BCDF66;">
                        <h4><a href="myapp" class="d-block">My Application</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .custom-info-alert {
    padding: 10px; 
    border-radius: 5px; 
    }

    .custom-info-alert a {
        text-decoration: none;
    }

    .custom-info-alert img {
        justify-content: center;
        max-width: 100%;
        height: auto;
    }

    .center-image {
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none; 
    }

    .custom-text-footer{
        background-color: #4CBEC1; 
        justify-content: center;
        align-items: center;
    }

    .custom-text-footer a{
        color: white;
    }

</style>
</html>
@include('footer')
