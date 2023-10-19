<!DOCTYPE html>
<html lang="en">
@include('head')

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

<body  style=" font-family: Arial, sans-serif;">
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-4">
                <div class="card" style="padding: 0px;">
                    <div class="custom-info-alert">
                        <a href="submited" class="center-image"><img src="public/Image/333.jpeg" alt="" class="img-fluid"></a>
                    </div>
                    <!-- <div class="custom-text-footer card-footer"> -->
                    <div class="card-footer" style="background-color: #CB878A;">

                        <h4><a href="submited" class="d-block">Submitted Application</a></h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="card" style="padding: 0px;">
                    <div class="custom-info-alert">
                        <a href="draft" class="center-image"><img src="public/Image/444.jpeg" alt="" class="img-fluid">
                    </a>
                    </div>
                    <div class="card-footer" style="background-color: #E2B432;">

                        <h4><a href="draft" class="d-block">Draft Application</a></h4>
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
