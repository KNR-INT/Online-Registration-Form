<!DOCTYPE html>
<html lang="en">
@include('header')

<head>
    <meta charset="utf-8">
    <meta name="description" content="My Application Description">
    <meta name="author" content="Sammy">
    <meta name="viewport" content="width=device-width, initial-scale=0.5" >
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<!-- <body style="background-color:white;">
  <div> -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
<div style="max-width: 1200px; margin: 0 auto; padding: 2px;">
    <div class="container-fluid py-4">
        <div class="card">
<section class="step-wizard" style="margin-left: 20px;">
<div class="step-container">
    <div class="progress-container">
        <div class="circle-container">
            <div class="circle progress-completed">
                1
                <div class="lineaq"></div>
            </div>
            <div class="circle progress-completed">
                2
                <div class="lineaq"></div>
            </div>
            <div class="circle progress-completed">
                3
                <div class="lineaq"></div>
            </div>
            <div class="circle progress-completed">
                4
                <div class="lineaq"></div>
            </div>
            <div class="circle active">
                5
                <div class="lineaq"></div>
            </div>
        </div>
    </div>
</div>
    </section>
    <br>
    <div class="card-body pt-4 p-3">
                <form id="myForm" action="{{url('update-updateadmitted')}}" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
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
                    
                    <?php 
                    $id = $_GET['appli_id'];
                    $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                    ?>
                    
                    <h3 style="color:#343a40;"><b>Application Fee Payment For Academic Year <?php echo $student[0]->academic_year; ?></b></h3>
               
                    <br>
                      <?php 
                            $class = $_GET['class'];
                        ?>
                        <?php 
                        $id = $_GET['appli_id'];
                        $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                        ?>
        <div class="card-body table-responsive p-1">

<table class="table table-bordered table-hover" id="Applications">

     <input type="hidden" id="page_type" name="page_type" value="<?php echo $_GET['class']; ?>">
    <input type="hidden" id="status" name="status" value="Submitted">
    <input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">
    <?php
    $academic = $student[0]->academic_year;
    $acad_yr = explode('-',$academic);
    $apid = $student[0]->id;
    $last_appli_id = sprintf('%04u', $apid);
    ?>
    <input type="hidden" id="application_no" name="application_no" value="YPR/<?php echo $student[0]->class;?>/<?php echo $acad_yr[0];?>/<?php echo $last_appli_id ?>">

<tr id="a">
<th>Student Name</th>
<td><input class="form-control" type="text" style="text-transform:uppercase"  value="<?php echo $student[0]->name; ?>" readonly></td>
</tr>

<tr id="a">
<th>Father's Name</th>
<td><input class="form-control" type="text" style="text-transform:uppercase" value="<?php echo $student[0]->father_name ?>" readonly></td>
</tr>

<tr id="a">
<th>Mother's Name</th>
<td><input class="form-control" type="text" style="text-transform:uppercase" value="<?php echo $student[0]->mother_name ?>" readonly></td>
</td>
</tr>

<tr id="a">
<th>For Class</th>
<td><input class="form-control" type="text" style="text-transform:uppercase" value="<?php echo $student[0]->class ?>" readonly></td>
</tr>

<tr id="a">
    <th>Application No</th>
    <td><input class="form-control" type="text" style="text-transform:uppercase" value="YPR/<?php echo $student[0]->class;?>/<?php echo $acad_yr[0];?>/<?php echo $last_appli_id ?>"readonly></td>    
</tr>

<tr id="a">
    <th>Payable amount</th>
    <td><input class="form-control" type="text" style="text-transform:uppercase" value="{{$registrationFee}}"readonly></td>
</tr>
</table>
</div>

<br>
<div class="justify-content-center">
 <center>   
<button class="btn  btn-submit btn-primary"  height="100px;" id="btn1" >
Payment</button></center>

<br/>
</div>
</div>
</div>
</div>

@include('footer')     
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $('.btn-submit').click(function(){
            document.getElementById("myForm").submit();
        });
</script>
    </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"></script>
</body>  
</html>

<style>
    .circle-container {

justify-content: center;
display: flex;
align-items: center;
overflow-x: auto; 
margin: 0 -10px; 
}

.circle {
width: 40px; 
height: 40px; 
border-radius: 50%;
background-color: #ccc;
display: flex;
align-items: center;
justify-content: center;
font-size: 14px;
color: #fff;
margin: 0 10px; 
position: relative;
}

.active {
background-color: #007bff;
}

.progress-completed {
background-color: #228B22;
}

.lineaq {
position: absolute;
width: calc(100% - 40px); 
height: 3px;
background-color: #ccc;
top: 50%; 
transform: translateY(-50%);
left: 20px;
z-index: -1;
}

@media (max-width: 576px) {
.circle {
    width: 30px; 
    height: 30px; 
    font-size: 12px;
}

.lineaq {
    width: calc(100% - 30px); 
    left: 30px; 
}
}

#btn1 {background-color: #007bff;
height:50px;
width:100px;
}
</style>

<style>
    h3{
  font-family: Calibri; 
  font-size: 25pt;         
  font-style: normal; 
  font-weight: normal; 
  color:Black;
  text-align: center; 
}

table{
  font-family: Calibri; 
  color:Black; 
  font-size: 18pt; 
  font-style: normal;
  font-weight: normal;
  text-align:; 
  width:450px;
  height:80px;
  background-color: white; 
  border-collapse: collapse; 
   
}
#a{
    background-color: white;
  height:10px;
}
table.inner{
  border: 0px;
}

</style>

<style>
    h2{
  font-family: Calibri; 
  font-size: 35pt;         
  font-style:normal; 
  font-weight:bold; 
  color:Black;
  text-align: center; 
}

h4{
  font-family: Calibri; 
  color:Black; 
  font-size:20pt; 
  text-align:center; 
  width:500px;
  background-color:lightgrey; 
}

</style>


