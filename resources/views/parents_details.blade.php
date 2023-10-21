<html lang="en">
<!-- @include('header') -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark  fixed-top">
    <!-- Brand/logo -->
    <a href="https://www.npsypr.edu.in/" class="navbar-brand">
        <img src="https://leap.npsypr.edu.in/uploads/logo.png" alt="Logo" style="width: 45px; height: auto;">
        <span>NATIONAL PUBLIC SCHOOL, YESHWANTHPUR</span><br/>
    </a>
    
    <!-- Navbar toggle button for mobile -->
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Navbar links -->
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
<br/>
<br/>
<br/>
<br/>
<head>
<title>Online Registration</title>
<link rel="icon" href="https://leap.npsypr.edu.in/uploads/logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    </head>
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
<div style="max-width: 1200px; margin: 0 auto; padding: 2px;">
    <div class="container-fluid py-4">
        <div class="card">
        <section style="d-flex justify-content-center align-items-center">
        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5">
        <div class="step-container">
    <div class="progress-container">
        <div class="circle-container">
            <div class="circle progress-completed ">
                1
                <div class="lineaq"></div>
            </div>
            <div class="circle active">
                2
                <div class="lineaq"></div>
            </div>
            <div class="circle">
                3
                <div class="lineaq"></div>
            </div>
            <div class="circle">
                4
                <div class="lineaq"></div>
            </div>
            <div class="circle">
                5
                <div class="lineaq"></div>
            </div>
        </div>
    </div>
</div>
    </section>
          
            <div class="card-body pt-4 p-3">
                <form id="myForm" action="{{ url('store-parent') }}" enctype="multipart/form-data">
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

                            <?php 
                            $id = $_GET['appli_id'];
                            $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                            ?>
<!-- value="{{ strtoupper($student[0]->name) }}" mother_name -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Father's Name*</b>
         <input type="text" class="form-control" placeholder="Enter Father name" required id="father_name" name="father_name"  maxlength="70" value="{{ strtoupper($student[0]->father_name) }}" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" style="text-transform:uppercase" >
         <span id="father_name_err" style="color:red;"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Name*</b>
         <input type="text"  class="form-control" placeholder="Enter Mother name" required id="mother_name" name="mother_name"  maxlength="70" value="{{ strtoupper($student[0]->mother_name) }}" oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);" style="text-transform:uppercase" >
         <span id="mother_name_err" style="color:red;"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field" ><b>Father's Mobile Number*</b>
         <input type="text" class="form-control" placeholder="Enter Father mobile number" required id="father_mob" name="father_mob"  maxlength="14" value="<?php echo $student[0]->father_mob;?>" maxlength="10"><span id="father_mob_err" style="color:red;"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Mobile Number*</b>
        <input type="text" class="form-control" placeholder="Enter Mother mobile number" required id="mother_mob" name="mother_mob"  maxlength="14" value="<?php echo $student[0]->mother_mob;?>" maxlength="10"><span id="mother_mob_err" style="color:red;"></span>
                </div>
            </div>
        </div>
    </div>
                        
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Father's Email Id*</b>
        <input type="text" class="form-control" placeholder="Enter Father Email Id" required id="father_email_verified_at" name="father_email_verified_at" maxlength="50" value="<?php echo $student[0]->father_email_verified_at;?>"><span id="father_email_verified_at_err" style="color:red;"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Email Id*</b>
         <input type="text" class="form-control" placeholder="Enter Mother Email Id" required id="mother_email_verified_at" name="mother_email_verified_at"  maxlength="50" value="<?php echo $student[0]->mother_email_verified_at;?>"><span id="mother_email_verified_at_err" style="color:red;"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Father's Mother Tongue*</b>
        <select class="form-control" required id="father_mother_tongue" name="father_mother_tongue" style="padding: 10px;">
        <option disabled selected value="">--SELECT--</option>
        <option value="Kannada"<?php if($student[0]->father_mother_tongue == "Kannada"){ echo "SELECTED"; } ?>>Kannada</option>
        <option value="Tamil"<?php if($student[0]->father_mother_tongue == "Tamil"){ echo "SELECTED"; } ?>>Tamil</option>
         <option value="Telugu"<?php if($student[0]->father_mother_tongue == "Telugu"){ echo "SELECTED"; } ?>>Telugu</option>
         <option value="Hindi"<?php if($student[0]->father_mother_tongue == "Hindi"){ echo "SELECTED"; } ?>>Hindi</option>
         <option value="Assamese"<?php if($student[0]->father_mother_tongue == "Assamese"){ echo "SELECTED"; } ?>>Assamese</option>
         <option value="Bengali"<?php if($student[0]->father_mother_tongue == "Bengali"){ echo "SELECTED"; } ?>>Bengali</option>
         <option value="English"<?php if($student[0]->father_mother_tongue == "English"){ echo "SELECTED"; } ?>>English</option>
         <option value="Marathi"<?php if($student[0]->father_mother_tongue == "Marathi"){ echo "SELECTED"; } ?>>Marathi</option>
         <option value="Urdu"<?php if($student[0]->father_mother_tongue == "Urdu"){ echo "SELECTED"; } ?>>Urdu</option>
         <option value="Malayalam"<?php if($student[0]->father_mother_tongue == "Malayalam"){ echo "SELECTED"; } ?>>Malayalam</option>
         <option value="Gujarathi"<?php if($student[0]->father_mother_tongue == "Gujarathi"){ echo "SELECTED"; } ?>>Gujarathi</option>
         <option value="Others"<?php if($student[0]->father_mother_tongue == "Others"){ echo "SELECTED"; } ?>>Others</option>
          </select><span id="father_mother_tongue_err" style="color:red;"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Mother Tongue*</b>
         <select class="form-control" required id="mother_mother_tongue" name="mother_mother_tongue" style="padding: 10px;">
         <option disabled selected value="">--SELECT--</option>
        <option value="Kannada"<?php if($student[0]->mother_mother_tongue == "Kannada"){ echo "SELECTED"; } ?>>Kannada</option>
        <option value="Tamil"<?php if($student[0]->mother_mother_tongue == "Tamil"){ echo "SELECTED"; } ?>>Tamil</option>
         <option value="Telugu"<?php if($student[0]->mother_mother_tongue == "Telugu"){ echo "SELECTED"; } ?>>Telugu</option>
         <option value="Hindi"<?php if($student[0]->mother_mother_tongue == "Hindi"){ echo "SELECTED"; } ?>>Hindi</option>
         <option value="Assamese"<?php if($student[0]->mother_mother_tongue == "Assamese"){ echo "SELECTED"; } ?>>Assamese</option>
         <option value="Bengali"<?php if($student[0]->mother_mother_tongue == "Bengali"){ echo "SELECTED"; } ?>>Bengali</option>
         <option value="English"<?php if($student[0]->mother_mother_tongue == "English"){ echo "SELECTED"; } ?>>English</option>
         <option value="Marathi"<?php if($student[0]->mother_mother_tongue == "Marathi"){ echo "SELECTED"; } ?>>Marathi</option>
         <option value="Urdu"<?php if($student[0]->mother_mother_tongue == "Urdu"){ echo "SELECTED"; } ?>>Urdu</option>
         <option value="Malayalam"<?php if($student[0]->mother_mother_tongue == "Malayalam"){ echo "SELECTED"; } ?>>Malayalam</option>
         <option value="Gujarathi"<?php if($student[0]->mother_mother_tongue == "Gujarathi"){ echo "SELECTED"; } ?>>Gujarathi</option>
         <option value="Others"<?php if($student[0]->mother_mother_tongue == "Others"){ echo "SELECTED"; } ?>>Others</option>
            </select><span id="mother_mother_tongue_err" style="color:red;"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Father's Qualification*</b>
        <br>
        <select class="form-control" required id="father_graduation" name="father_graduation" style="padding: 10px;">
        <option disabled selected value="">--SELECT--</option>
        <option value="HSC"<?php if($student[0]->father_graduation == "HSC"){ echo "SELECTED"; } ?>>HSC</option>
        <option value="PUC/+2"<?php if($student[0]->father_graduation == "PUC/+2"){ echo "SELECTED"; } ?>>PUC/+2</option>
        <option value="Graduation"<?php if($student[0]->father_graduation == "Graduation"){ echo "SELECTED"; } ?>>Graduation</option>
        <option value="Post-Graduation"<?php if($student[0]->father_graduation == "Post-Graduation"){ echo "SELECTED"; } ?>>Post-Graduation</option>
        <option value="Professional Course"<?php if($student[0]->father_graduation == "Professional Course"){ echo "SELECTED"; } ?>>Professional Course</option>
        <option value="Others"<?php if($student[0]->father_graduation == "Others"){ echo "SELECTED"; } ?>>Others</option>
        </select><span id="father_graduation_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Qualification*</b>
        <br>
        <select class="form-control" required id="mother_graduation" name="mother_graduation" style="padding: 10px;">
        <option disabled selected value="">--SELECT--</option>
        <option value="HSC"<?php if($student[0]->mother_graduation == "HSC"){ echo "SELECTED"; } ?>>HSC</option>
        <option value="PUC/+2"<?php if($student[0]->mother_graduation == "PUC/+2"){ echo "SELECTED"; } ?>>PUC/+2</option>
        <option value="Graduation"<?php if($student[0]->mother_graduation == "Graduation"){ echo "SELECTED"; } ?>>Graduation</option>
        <option value="Post-Graduation"<?php if($student[0]->mother_graduation == "Post-Graduation"){ echo "SELECTED"; } ?>>Post-Graduation</option>
        <option value="Professional Course"<?php if($student[0]->mother_graduation == "Professional Course"){ echo "SELECTED"; } ?>>Professional Course</option>
        <option value="Others"<?php if($student[0]->mother_graduation == "Others"){ echo "SELECTED"; } ?>>Others</option>
           </select><span id="mother_graduation_err" style="color:red;"></span>
</div>
</div>
</div>
</div>
  
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <p><b>RESIDENTIAL DETAILS - FATHER</b></p>
</div>
</div>


<div class="col-md-6">
            <div class="form-group"> 
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Residential Address*</b>
           <input type="text" class="form-control" placeholder="Enter Residential Address" required id="father_residential_address" name="father_residential_address"  maxlength="150" value="<?php echo $student[0]->father_residential_address;?>"><span id="father_residential_address_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
            <div class="input-field"><b>Area*</b>
        <input type="text" class="form-control" placeholder="Enter Area" required id="father_area" name="father_area"  maxlength="100" value="<?php echo $student[0]->father_area;?>"><span id="father_area_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>District*</b>
            <input type="text"  class="form-control" placeholder="Enter District" required id="father_district"  maxlength="100" name="father_district" value="<?php echo $student[0]->father_district;?>"><span id="father_district_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <div class="input-field"><b>State*</b>
    <input type="text"  class="form-control" placeholder="Enter state" required id="father_state" name="father_state"  maxlength="100" value="<?php echo $student[0]->father_state;?>"><span id="father_state_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Country*</b>
           <select class="form-control" required id="father_country" name="father_country" style="padding: 10px;">
           <option disabled selected value="">--SELECT--</option>
                 <option value="India"<?php if($student[0]->father_country =="India"){ echo "SELECTED"; } ?>>India</option>
                 <option value="America"<?php if($student[0]->father_country =="America"){ echo "SELECTED"; } ?>>America</option>
                <option value="Australia"<?php if($student[0]->father_country =="Australia"){ echo "SELECTED"; } ?>>Australia</option>
                <option value="Brazil"<?php if($student[0]->father_country =="Brazil"){ echo "SELECTED"; } ?>>Brazil</option>
                <option value="Canada"<?php if($student[0]->father_country =="Canada"){ echo "SELECTED"; } ?>>Canada</option>
                 <option value="Germany"<?php if($student[0]->father_country =="Germany"){ echo "SELECTED"; } ?>>Germany</option>
                <option value="France"<?php if($student[0]->father_country =="France"){ echo "SELECTED"; } ?>>France</option>
                 <option value="Italy"<?php if($student[0]->father_country =="Italy"){ echo "SELECTED"; } ?>>Italy</option>
                <option value="Others"<?php if($student[0]->father_country =="Others"){ echo "SELECTED"; } ?>>Others</option>
                </select><span id="father_country_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <div class="input-field"><b>Pincode*</b>
    <input type="text" class="form-control" placeholder="Enter Pincode" required id="father_pincode" name="father_pincode" value="<?php echo $student[0]->father_pincode;?>"  maxlength="8"><span id="father_pincode_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Residential Number</b>
            <input type="text" class="form-control" placeholder="Enter Residential Number" required id="father_residential_no" name="father_residential_no" value="<?php echo $student[0]->father_residential_no;?>" maxlength="11"><span id="father_residential_no_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group"> 
</div>
</div>
</div>

<!-- <div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <p><b>RESIDENTIAL DETAILS - MOTHER</b></p>
</div>
</div>


<div class="col-md-6">
            <div class="form-group"> 
</div>
</div>
</div> -->

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <p><b>RESIDENTIAL DETAILS - MOTHER (SAME AS FATHER)</b>&emsp;<input type="checkbox" class="mother_details" id="mother_details" name="mother_details"> </p>
</div>
</div>

<div class="col-md-6">
            <div class="form-group"> 
</div>
</div>
</div>
       
<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Residential Address*</b>
          <input type="text" class="form-control" placeholder="Enter Residential Address" required id="mother_residential_address" name="mother_residential_address"  maxlength="150" value="<?php echo $student[0]->mother_residential_address;?>"><span id="mother_residential_address_err" style="color:red;"></span>
</div>
</div>
</div>
      
<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Area*</b>
            <input type="text" class="form-control" placeholder="Enter Area" required id="mother_area"  maxlength="100" name="mother_area" value="<?php echo $student[0]->mother_area;?>"><span id="mother_area_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>District*</b>
             <input type="text"  class="form-control" placeholder="Enter District" required id="mother_district" name="mother_district"  maxlength="100" value="<?php echo $student[0]->mother_district;?>"><span id="mother_district_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>State*</b>
             <input type="text"  class="form-control" placeholder="Enter state" required id="mother_state" name="mother_state"  maxlength="100" value="<?php echo $student[0]->mother_state;?>"><span id="mother_state_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Country*</b>
                    <select class="form-control" required id="mother_country" name="mother_country" style="padding: 10px;">
                    <option disabled selected value="">--SELECT--</option>
                <option value="India"<?php if($student[0]->mother_country == "India"){   echo "SELECTED"; } ?>>India</option>
                 <option value="America"<?php if($student[0]->mother_country =="America"){ echo "SELECTED"; } ?>>America</option>
                <option value="Australia"<?php if($student[0]->mother_country =="Australia"){ echo "SELECTED"; } ?>>Australia</option>
                <option value="Brazil"<?php if($student[0]->mother_country =="Brazil"){ echo "SELECTED"; } ?>>Brazil</option>
                <option value="Canada"<?php if($student[0]->mother_country =="Canada"){ echo "SELECTED"; } ?>>Canada</option>
                <option value="Germany"<?php if($student[0]->mother_country =="Germany"){ echo "SELECTED"; } ?>>Germany</option>
                <option value="France"<?php if($student[0]->mother_country =="France"){ echo "SELECTED"; } ?>>France</option>
                <option value="Italy"<?php if($student[0]->mother_country =="Italy"){ echo "SELECTED"; } ?>>Italy</option>
                <option value="Others"<?php if($student[0]->mother_country == "Others"){ echo "SELECTED"; } ?>>Others</option>
                     </select><span id="mother_country_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Pincode*</b>
             <input type="text" class="form-control" placeholder="Enter Pincode" required id="mother_pincode" name="mother_pincode"value="<?php echo $student[0]->mother_pincode;?>"  maxlength="8"><span id="mother_pincode_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Residential Number</b>
             <input type="text" class="form-control" placeholder="Enter Residential Number" required id="mother_residential_no" name="mother_residential_no" value="<?php echo $student[0]->mother_residential_no;?>" maxlength="11"><span id="mother_residential_no_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group"> 
</div>
</div>
</div>
      
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <p style:color="#15375A;"> <b>EMPLOYMENT DETAILS - FATHER</b>

</div>
</div>


<div class="col-md-6">
            <div class="form-group">
            <b>EMPLOYMENT DETAILS - MOTHER</b> 
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
            <div class="form-group">
            <b>Not Applicable</b> <input type="checkbox" class="f_details" id="f_details" name="f_details"> 
</div>
</div>
<div class="col-md-6">
            <div class="form-group">
            <b>Not Applicable</b> <input type="checkbox" class="m_details" id="m_details" name="m_details"> 
</div>
</div>
</div>
        
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Nature of Employment</b>
            <select class="form-control" required id="father_organization" name="father_organization" style="padding: 10px;" >
                <option disabled selected value="">--SELECT--</option>
                <option value="Agriculture"<?php if($student[0]->father_organization == "Agriculture"){ echo " SELECTED"; } ?>>Agriculture</option>
                <option value="Business"<?php if($student[0]->father_organization == "Business"){ echo " SELECTED"; } ?>>Business</option>
                <option value="Private Sector"<?php if($student[0]->father_organization == "Private Sector"){ echo " SELECTED"; } ?>>Private Sector</option>
                <option value="Public sector"<?php if($student[0]->father_organization == "Public sector"){ echo " SELECTED"; } ?>>Public sector</option>
                <option value="Others"<?php if($student[0]->father_organization == "Others"){ echo " SELECTED"; } ?>>Others</option>
                                </select>
                                <span id="father_organization_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Nature of Employment</b>
             <select class="form-control" required id="mother_organization" name="mother_organization" style="padding: 10px;" >
                <option disabled selected value="">--SELECT--</option>
                <option value="Agriculture"<?php if($student[0]->mother_organization == "Agriculture"){ echo " SELECTED"; } ?>>Agriculture</option>
                <option value="Business"<?php if($student[0]->mother_organization == "Business"){ echo " SELECTED"; } ?>>Business</option>
                <option value="Private Sector"<?php if($student[0]->mother_organization == "Private Sector"){ echo " SELECTED"; } ?>>Private Sector</option>
                <option value="Public sector"<?php if($student[0]->mother_organization == "Public sector"){ echo " SELECTED"; } ?>>Public sector</option>
                <option value="Others"<?php if($student[0]->mother_organization == "Others"){ echo " SELECTED"; } ?>>Others</option>
             </select>
             <span id="mother_organization_err" style="color:red;"></span>

</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Father's Profession</b>
            <input type="text" class="form-control" placeholder="Enter Profession" required id="father_profession" name="father_profession"  maxlength="100" value="<?php echo $student[0]->father_profession;?>" ><span id="father_profession_err" style="color:red;"></span>
</div>
</div>
</div>

<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Mother's Profession</b>
             <input type="text" class="form-control" placeholder="Enter Profession" required id="mother_profession" name="mother_profession"  maxlength="100" value="<?php echo $student[0]->mother_profession;?>" >
             <span id="mother_profession_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Father's Company Name</b>
            <input type="text" class="form-control" placeholder="Enter Company Name" required id="father_company" name="father_company"  maxlength="100" value="<?php echo $student[0]->father_company;?>" ><span id="father_company_err" style="color:red;"></span>
</div>
</div>
</div>



<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Mother's Company Name</b>
             <input type="text" class="form-control" placeholder="Enter Company Name" required id="mother_company" name="mother_company"  maxlength="100" value="<?php echo $student[0]->mother_company;?>" >
             <span id="mother_company_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Father's Designation</b>
            <input type="text" class="form-control" placeholder="Enter Designation" required id="father_designation" name="father_designation"  maxlength="50" value="<?php echo $student[0]->father_designation;?>" ><span id="father_designation_err" style="color:red;"></span>
</div>
</div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Mother's Designation </b>
             <input type="text" class="form-control" placeholder="Enter Designation" required id="mother_designation" name="mother_designation"  maxlength="50" value="<?php echo $student[0]->mother_designation;?>" >
             <span id="mother_designation_err" style="color:red;"></span>
</div>
</div>
</div>
</div>


<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Father's Company Address</b>
            <input type="text" class="form-control" placeholder="Enter Company" required id="father_company_address" name="father_company_address"  maxlength="150" value="<?php echo $student[0]->father_company_address;?>"  ><span id="father_company_address_err" style="color:red;"></span>
</div>
</div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Mother's Company Address</b>
             <input type="text" class="form-control" placeholder="Enter Company" required id="mother_company_address" name="mother_company_address"  maxlength="150" value="<?php echo $student[0]->mother_company_address;?>" >
             <span id="mother_company_address_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Father's Office Number</b>
             <input type="text" class="form-control"  placeholder="Enter Office Number" required id="father_office_number" name="father_office_number"  maxlength="11" value="<?php echo $student[0]->father_office_number;?>"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\.*)\./g, '$1')" maxlength="10"><span id="father_office_number_err" style="color:red;"></span>
</div>
</div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Enter Mother's Office Number</b>
              <input type="text" class="form-control"  placeholder="Enter Office Number" required id="mother_office_number" name="mother_office_number"  maxlength="11" value="<?php echo $student[0]->mother_office_number;?>"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\.*)\./g, '$1')" maxlength="10">
              <span id="mother_office_number_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Father's Annual Income (INR)*</b>
             <input type="text" class="form-control"  placeholder="Enter Annual Income" required id="father_annual_income" name="father_annual_income" value="<?php echo $student[0]->father_annual_income;?>"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\.*)\./g, '$1')" maxlength="15"><span id="father_annual_income_err" style="color:red;"></span>
</div>
</div>
</div>
<div class="col-md-6">
            <div class="form-group">
                <div class="input-field"><b>Mother's Annual Income (INR)*</b>
              <input type="text" class="form-control"  placeholder="Enter Annual Income" required id="mother_annual_income" name="mother_annual_income" value="<?php echo $student[0]->mother_annual_income;?>"  oninput="this.value = this.value.replace(/[^0-9.]/g,'').replace(/(\.*)\./g, '$1')" maxlength="15">
              <span id="mother_annual_income_err" style="color:red;"></span>
</div>
</div>
</div>
</div>

      <input type="hidden" id="page_type" name="page_type" value="<?php echo $_GET['class'];?>">
      <input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">
      </form>

        <div class="col">  
              <div class="form-check">  
               <center> 
               <span id="parent_details_err" style="color:red;"></span><br/>
               <button class=" btn btn-back btn-primary">Go back</button>
                <button class="btn btn-submit btn-primary">Save & continue</button></center>
             </div>
            </div>
</form>
</div>
</div>
</div>
</div>
</body>

    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkbox = document.getElementById('f_details');

        checkbox.addEventListener('click', function () {
            if (checkbox.checked) {
                checkbox.enabled = true;
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        var checkbox = document.getElementById('m_details');

        checkbox.addEventListener('click', function () {
            if (checkbox.checked) {
                checkbox.enabled = true;
            }
        });
    });
</script>

    <script>

         $('#father_name').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("father_name_err").innerHTML = "";
            } else {
                document.getElementById("father_name_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#mother_name').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("mother_name_err").innerHTML = "";
            } else {
                document.getElementById("mother_name_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#father_mob').on('change', function() {
            if (/^(0|91)?[6-9][0-9]{9}$/.test($(this).val())) {
                document.getElementById("father_mob_err").innerHTML = "";
            } else {
                document.getElementById("father_mob_err").innerHTML = "Invalid Mobile Number";
            }
        });
        $('#mother_mob').on('change', function() {
            if (/^(0|91)?[6-9][0-9]{9}$/.test($(this).val())) {
                document.getElementById("mother_mob_err").innerHTML = "";
            } else {
                document.getElementById("mother_mob_err").innerHTML = "Invalid Mobile Number";
            }
        });

        $('#father_email_verified_at').on('change', function() {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/.test($(this).val())) {
                document.getElementById("father_email_verified_at_err").innerHTML = "";
            } else {
                document.getElementById("father_email_verified_at_err").innerHTML = "Invalid Email ID";
            }
        });
        $('#mother_email_verified_at').on('change', function() {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/.test($(this).val())) {
                document.getElementById("mother_email_verified_at_err").innerHTML = "";
            } else {
                document.getElementById("mother_email_verified_at_err").innerHTML = "Invalid Email ID";
            }
        });

        $('#father_district').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("father_district_err").innerHTML = "";
            } else {
                document.getElementById("father_district_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#mother_district').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("mother_district_err").innerHTML = "";
            } else {
                document.getElementById("mother_district_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#father_state').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("father_state_err").innerHTML = "";
            } else {
                document.getElementById("father_state_err").innerHTML = "Only alphabets are allowed";
            }
        });
        $('#mother_state').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("mother_state_err").innerHTML = "";
            } else {
                document.getElementById("mother_state_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#father_pincode').on('change', function() {
            if (/^(\d{4}|\d{6})$/.test($(this).val())) {
                document.getElementById("father_pincode_err").innerHTML = "";
            } else {
                document.getElementById("father_pincode_err").innerHTML = "Invalid Pincode";
            }
        });
        $('#mother_pincode').on('change', function() {
            if (/^(\d{4}|\d{6})$/.test($(this).val())) {
                document.getElementById("mother_pincode_err").innerHTML = "";
            } else {
                document.getElementById("mother_pincode_err").innerHTML = "Invalid Pincode ";
                // Contain other characters also
            }
        });
  
        $('#father_residential_no').on('change', function() {
            if (/^(0|91)?[6-9][0-9]{9}$/.test($(this).val())) {
                document.getElementById("father_residential_no_err").innerHTML = "";
                // Contain numbers only
            } else {
                document.getElementById("father_residential_no_err").innerHTML = "Invalid Residential Number";
                // Contain other characters also
            }
        });
        $('#mother_residential_no').on('change', function() {
            if (/^(0|91)?[6-9][0-9]{9}$/.test($(this).val())) {
                document.getElementById("mother_residential_no_err").innerHTML = "";
                // Contain numbers only
            } else {
                document.getElementById("mother_residential_no_err").innerHTML = "Invalid Residential Number";
                // Contain other characters also
            }
        });
    
        $('.mother_details').click(function(){
    if ($(this).is(':checked')) {
        let father_residential_address = document.getElementById("father_residential_address").value;
        let father_area = document.getElementById("father_area").value;
        let father_district = document.getElementById("father_district").value;
        let father_state = document.getElementById("father_state").value;
        let father_country = document.getElementById("father_country").value;
        let father_pincode = document.getElementById("father_pincode").value;
        let father_residential_no = document.getElementById("father_residential_no").value;

        document.getElementById("mother_residential_address").value = father_residential_address;
        document.getElementById("mother_area").value = father_area;
        document.getElementById("mother_district").value = father_district;
        document.getElementById("mother_state").value = father_state;
        document.getElementById("mother_country").value = father_country;
        document.getElementById("mother_pincode").value = father_pincode;
        document.getElementById("mother_residential_no").value = father_residential_no;

    } else {
        document.getElementById("mother_residential_address").value = "";
        document.getElementById("mother_area").value = "";
        document.getElementById("mother_district").value = "";
        document.getElementById("mother_state").value = "";
        document.getElementById("mother_country").value = "";
        document.getElementById("mother_pincode").value = "";
        document.getElementById("mother_residential_no").value = "";
    }
});

$("input:checkbox[id='f_details']").on("click", function(){
            if(this.checked)
            {
                $('#father_company').attr('disabled', 'disabled');
                $('#father_designation').attr('disabled', 'disabled');
                $('#father_organization').attr('disabled', 'disabled');
                $('#father_profession').attr('disabled', 'disabled');
                $('#father_company_address').attr('disabled', 'disabled');
                $('#father_office_number').attr('disabled', 'disabled');
                // $('#father_annual_income').attr('disabled', 'disabled');
            }
            else{
                $('#father_company').removeAttr('disabled');
                $('#father_designation').removeAttr('disabled');
                $('#father_organization').removeAttr('disabled');
                $('#father_profession').removeAttr('disabled');
                $('#father_company_address').removeAttr('disabled');
                $('#father_office_number').removeAttr('disabled');
                // $('#father_annual_income').removeAttr('disabled');  
            }
          });

          $("input:checkbox[id='m_details']").on("click", function(){
            if(this.checked)
            { 
                $('#mother_company').attr('disabled', 'disabled');
                $('#mother_designation').attr('disabled', 'disabled');
                $('#mother_organization').attr('disabled', 'disabled');
                $('#mother_profession').attr('disabled', 'disabled');
                $('#mother_company_address').attr('disabled', 'disabled');
                $('#mother_office_number').attr('disabled', 'disabled');
                // $('#mother_annual_income').attr('disabled', 'disabled');
            }
            else{
                $('#mother_company').removeAttr('disabled');
                $('#mother_designation').removeAttr('disabled');
                $('#mother_organization').removeAttr('disabled');
                $('#mother_profession').removeAttr('disabled');
                $('#mother_company_address').removeAttr('disabled');
                $('#mother_office_number').removeAttr('disabled');
                // $('#mother_annual_income').removeAttr('disabled');     
            }
          });

        $('.btn-back').click(function(){
            let page_type = document.getElementById("page_type").value;
            let appli_id = document.getElementById("appli_id").value;
            window.location.href ="{{ url('onlinereg/a?class=') }}"+page_type+"&appli_id="+appli_id;
        });
        $('.btn-submit').click(function(){

            let father_name = document.getElementById("father_name").value;
            let father_mob = document.getElementById("father_mob").value;
            let father_email_verified_at = document.getElementById("father_email_verified_at").value;
            let father_mother_tongue = document.getElementById("father_mother_tongue").value;
            let father_residential_address = document.getElementById("father_residential_address").value;
            let father_graduation = document.getElementById("father_graduation").value;
            // let father_qualification = document.getElementById("father_qualification").value;
            let father_area = document.getElementById("father_area").value;
            let father_district = document.getElementById("father_district").value;
            let father_state = document.getElementById("father_state").value;
            let father_country = document.getElementById("father_country").value;
            let father_pincode = document.getElementById("father_pincode").value;
            let father_residential_no = document.getElementById("father_residential_no").value;
            let father_designation = document.getElementById("father_designation").value;
            let father_profession = document.getElementById("father_profession").value;
            let father_organization = document.getElementById("father_organization").value;
            let father_company = document.getElementById("father_company").value;
            let father_company_address = document.getElementById("father_company_address").value;
            let father_office_number = document.getElementById("father_office_number").value;
            let father_annual_income = document.getElementById("father_annual_income").value;
   
            let mother_name = document.getElementById("mother_name").value;
            let mother_mob = document.getElementById("mother_mob").value;
            let mother_email_verified_at = document.getElementById("mother_email_verified_at").value;
            let mother_mother_tongue = document.getElementById("mother_mother_tongue").value;
            let mother_graduation = document.getElementById("mother_graduation").value;
            // let mother_qualification = document.getElementById("mother_qualification").value;
            let mother_residential_address = document.getElementById("mother_residential_address").value;
            let mother_area = document.getElementById("mother_area").value;
            let mother_district = document.getElementById("mother_district").value;
            let mother_state = document.getElementById("mother_state").value;
            let mother_country = document.getElementById("mother_country").value;
            let mother_pincode = document.getElementById("mother_pincode").value;
            let mother_residential_no = document.getElementById("mother_residential_no").value;
            let mother_organization = document.getElementById("mother_organization").value;
            let mother_profession = document.getElementById("mother_profession").value;
            let mother_company = document.getElementById("mother_company").value;
            let mother_company_address = document.getElementById("mother_company_address").value;
            let mother_office_number = document.getElementById("mother_office_number").value;
            let mother_annual_income = document.getElementById("mother_annual_income").value;
            let mother_designation = document.getElementById("mother_designation").value;
            var f_details = document.getElementById("f_details");
            var f_value = f_details.checked ? 1 : 0;
            var m_details = document.getElementById("m_details");
            var m_value = m_details.checked ? 1 : 0;

            if(!father_name ||!/^[a-zA-Z ]*$/g.test(father_name) || !father_mob ||!/^(0|91)?[6-9][0-9]{9}$/.test(father_mob) || !father_email_verified_at ||!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(father_email_verified_at)|| !father_mother_tongue || !father_graduation || !father_residential_address || !father_area|| !father_district ||!/^[a-zA-Z ]*$/g.test(father_district) || !father_state ||!/^[a-zA-Z ]*$/g.test(father_state) || !father_country || !father_pincode ||!/^(\d{4}|\d{6})$/.test(father_pincode) || !father_annual_income || !mother_name ||!/^[a-zA-Z ]*$/g.test(mother_name) || !mother_mob ||!/^(0|91)?[6-9][0-9]{9}$/.test(mother_mob) || !mother_email_verified_at ||!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mother_email_verified_at) || !mother_mother_tongue || !mother_graduation || !mother_residential_address || !mother_area  || !mother_district ||!/^[a-zA-Z ]*$/g.test(mother_district)|| !mother_state ||!/^[a-zA-Z ]*$/g.test(mother_state) || !mother_country || !mother_pincode ||!/^(\d{4}|\d{6})$/.test(mother_pincode) || !mother_annual_income ||!father_designation && f_value == 0 ||!father_profession && f_value == 0 || !mother_designation && m_value == 0 || !father_organization && f_value == 0 || !mother_organization && m_value == 0 || !mother_profession && m_value == 0 || !father_company && f_value == 0 || !mother_company && m_value == 0 || !father_company_address && f_value == 0 || !mother_company_address && m_value == 0 || f_value == 1 && m_value == 1)
            {
                if(!father_name)
                {
                   
                    document.getElementById("father_name_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(father_name))
                {
                    document.getElementById("father_name_err").innerHTML = "Only alphabets are allowed";
                }
                else
                {
                    document.getElementById("father_name_err").innerHTML = "";
                }

                if(!father_mob)
                {
                    
                    document.getElementById("father_mob_err").innerHTML = "This is Required Field";
                }
                else if(!/^(0|91)?[6-9][0-9]{9}$/.test(father_mob))
                {
                    document.getElementById("father_mob_err").innerHTML = "Only Numbers are allowed";
                }
                else
                {
                    document.getElementById("father_mob_err").innerHTML = "";
                }

                if(!father_email_verified_at)
                {
                  
                    document.getElementById("father_email_verified_at_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(father_email_verified_at))
                {
                    document.getElementById("father_email_verified_at_err").innerHTML = "Invalid Email ID";
                }
                else
                {
                    document.getElementById("father_email_verified_at_err").innerHTML = "";
                }

                if(!father_mother_tongue)
                {
                    document.getElementById("father_mother_tongue_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_mother_tongue_err").innerHTML = "";
                }

                if(!father_graduation)
                {
                    document.getElementById("father_graduation_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_graduation_err").innerHTML = "";
                }

                if(!father_residential_address)
                {
                  
                    document.getElementById("father_residential_address_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_residential_address_err").innerHTML = "";
                }

                if(!father_area)
                {

                    document.getElementById("father_area_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_area_err").innerHTML = "";
                }
                
                if(!father_district)
                {
                    document.getElementById("father_district_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(father_district))
                {
                    document.getElementById("father_district_err").innerHTML = "Only alphabets are allowed";
                }
                else
                {
                    document.getElementById("father_district_err").innerHTML = "";
                }

                if(!father_state)
                {
                    document.getElementById("father_state_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(father_district))
                {
                    document.getElementById("father_state_err").innerHTML = "Only alphabets are allowed";
                }
                else
                {
                    document.getElementById("father_state_err").innerHTML = "";
                }

                if(!father_country)
                {
                    document.getElementById("father_country_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_country_err").innerHTML = "";
                }

                if(!father_pincode)
                {
                    document.getElementById("father_pincode_err").innerHTML = "This is Required Field";
                }
                else if(!/^(\d{4}|\d{6})$/.test(father_pincode))
                {
                    document.getElementById("father_pincode_err").innerHTML = "Invalid Pincode";
                }
                else
                {
                    document.getElementById("father_pincode_err").innerHTML = "";
                }
               
                if(!father_annual_income)
                {
                    document.getElementById("father_annual_income_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_annual_income_err").innerHTML = "";
                }

                if(!mother_name)
                {
                    document.getElementById("mother_name_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(mother_name))
                {
                    document.getElementById("mother_name_err").innerHTML = "Only alphabets are allowed";
                }
                
                else
                {
                    document.getElementById("mother_name_err").innerHTML = "";
                }

                if(!mother_mob)
                {
                    document.getElementById("mother_mob_err").innerHTML = "This is Required Field";
                }
                else if(!/^(0|91)?[6-9][0-9]{9}$/.test(mother_mob))
                {
                    document.getElementById("mother_mob_err").innerHTML = "Only Numbers are allowed";
                }
                else
                {
                    document.getElementById("mother_mob_err").innerHTML = "";
                }

                if(!mother_email_verified_at)
                {
                    document.getElementById("mother_email_verified_at_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mother_email_verified_at))
                {
                    document.getElementById("mother_email_verified_at_err").innerHTML = "Invalid Email ID";
                }
                else
                {
                    document.getElementById("mother_email_verified_at_err").innerHTML = "";
                }
                if(!mother_mother_tongue)
                {
                    document.getElementById("mother_mother_tongue_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_mother_tongue_err").innerHTML = "";
                }

                if(!mother_graduation)
                {
                    document.getElementById("mother_graduation_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_graduation_err").innerHTML = "";
                }

                if(!mother_residential_address)
                {
                    document.getElementById("mother_residential_address_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_residential_address_err").innerHTML = "";
                }

                if(!mother_area)
                {
                    document.getElementById("mother_area_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_area_err").innerHTML = "";
                }
                
                if(!mother_district)
                {
                    document.getElementById("mother_district_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(mother_district))
                {
                    document.getElementById("mother_district_err").innerHTML = "Only alphabets are allowed";
                }
                else
                {
                    document.getElementById("mother_district_err").innerHTML = "";
                }

                if(!mother_state)
                {
                    document.getElementById("mother_state_err").innerHTML = "This is Required Field";
                }
                else if(!/^[a-zA-Z ]*$/g.test(mother_state))
                {
                    document.getElementById("mother_state_err").innerHTML = "Only alphabets are allowed";
                }
                else
                {
                    document.getElementById("mother_state_err").innerHTML = "";
                }

                if(!mother_country)
                {
                    document.getElementById("mother_country_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_country_err").innerHTML = "";
                }

                if(!mother_pincode)
                {
                    document.getElementById("mother_pincode_err").innerHTML = "This is Required Field";
                }
                else if(!/^(\d{4}|\d{6})$/.test(mother_pincode))
                {
                    document.getElementById("mother_pincode_err").innerHTML = "Invalid Pincode";
                }
                else
                {
                    document.getElementById("mother_pincode_err").innerHTML = "";
                }

                if(!father_designation && f_value == 0)
                {
                    document.getElementById("father_designation_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_designation_err").innerHTML = "";
                }

                if(!father_profession && f_value == 0)
                {
                    document.getElementById("father_profession_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_profession_err").innerHTML = "";
                }

                if(!father_organization && f_value == 0)
                {
                    document.getElementById("father_organization_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_organization_err").innerHTML = "";
                }

                if(!father_company && f_value == 0)
                {
                    document.getElementById("father_company_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_company_err").innerHTML = "";
                }

                if(!father_company_address && f_value == 0)
                {
                    document.getElementById("father_company_address_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("father_company_address_err").innerHTML = "";
                }

                if(!mother_designation && m_value == 0)
                {
                    document.getElementById("mother_designation_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_designation_err").innerHTML = "";
                }

                if(!mother_profession && m_value == 0)
                {
                    document.getElementById("mother_profession_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_profession_err").innerHTML = "";
                }

                if(!mother_organization && m_value == 0)
                {
                    document.getElementById("mother_organization_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_organization_err").innerHTML = "";
                }

                if(!mother_company && m_value == 0)
                {
                    document.getElementById("mother_company_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_company_err").innerHTML = "";
                }

                if(!mother_company_address && m_value == 0)
                {
                    document.getElementById("mother_company_address_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_company_address_err").innerHTML = "";
                }

                if(!mother_annual_income)
                {
                    document.getElementById("mother_annual_income_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("mother_annual_income_err").innerHTML = "";
                }
                
                if(f_value == 1 && m_value == 1)
                {
                    document.getElementById("parent_details_err").innerHTML = "Atleast One Parent Employment details to be updated";
                }
                else
                {
                    document.getElementById("parent_details_err").innerHTML = "";
                }
            }
            else
            {   
                document.getElementById("myForm").submit(); 
            }
        });
    </script>

</body>
</html>
<!-- @include('footer') -->

<style>

    .alert {
        position: relative;
        padding: 0.75rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        width: 50%; /* Adjust the width as needed */
        margin: 0 auto; /* Centers the alert horizontally */
    }

    .alert-primary {
        color: #004085;
        background-color: #cce5ff;
        border-color: #b8daff;
    }

    .btn-close {
        padding: 0.5rem 0.5rem;
    }

    .circle-container {

justify-content: center;
display: flex;
align-items: center;
overflow-x: auto; /* Add horizontal scrolling for small screens */
margin: 0 -10px; /* Negative margin to accommodate the scrollbar */
}

.circle {
width: 40px; /* Increase the circle size */
height: 40px; /* Increase the circle size */
border-radius: 50%;
background-color: #ccc;
display: flex;
align-items: center;
justify-content: center;
font-size: 14px;
color: #fff;
margin: 0 10px; /* Adjust the spacing */
position: relative;
}

.active {
background-color: #007bff;
}

.progress-completed {
background-color: #228B22;
}

/* Connecting Lines */
.lineaq {
position: absolute;
width: calc(100% - 40px); /* Width of the line */
height: 3px;
background-color: #ccc;
top: 50%; /* Center the line vertically */
transform: translateY(-50%);
left: 20px; /* Position the line to the right of the circle */
z-index: -1;
}

/* Responsiveness */
@media (max-width: 576px) {
.circle {
    width: 30px; /* Adjust circle size for small screens */
    height: 30px; /* Adjust circle size for small screens */
    font-size: 12px; /* Adjust font size for small screens */
}

.lineaq {
    width: calc(100% - 30px); /* Adjust line width for small screens */
    left: 30px; /* Adjust line position for small screens */
}
}

.step-wizard {
    height: 10vh;
    width: 10%;
    display: center;
    justify-content: center;
    align-items: center;
}
.step-wizard-list{
    display: flex;
    padding: 20px 10px;
    position: relative;
    z-index: 10;
}

.step-wizard-item{
    padding: 0 20px;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive:1;
    flex-grow: 1;
    max-width: 100%;
    display: flex;
    flex-direction: column;
    text-align: center;
    min-width: 170px;
    position: relative;
}
.step-wizard-item + .step-wizard-item:after{
    content: "";
    position: absolute;
    left: 0;
    top: 19px;
    background:  #1338BE;
    width: 100%;
    height: 2px;
    transform: translateX(-50%);
    z-index: -10;
}
.progress-count{
    height: 40px;
    width:40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-weight: 600;
    margin: 0 auto;
    position: relative;
    z-index:10;
    color: transparent;
}
.progress-count:after{
    content: "";
    height: 40px;
    width: 40px;
    background:  #1338BE;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    z-index: -10;
}
.progress-count:before{
    content: "";
    height: 10px;
    width: 20px;
    border-left: 3px solid #fff;
    border-bottom: 3px solid #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -60%) rotate(-45deg);
    transform-origin: center center;
}
.progress-label{
    font-size: 14px;
    font-weight: 600;
    margin-top: 10px;
}
.current-item .progress-count:before,
.current-item ~ .step-wizard-item .progress-count:before{
    display: none;
}
.current-item ~ .step-wizard-item .progress-count:after{
    height:10px;
    width:10px;
}
.current-item ~ .step-wizard-item .progress-label{
    opacity: 0.5;
}
.current-item .progress-count:after{
    background: #ff0000;
    border: 2px solid #ff0000;
}
.current-item .progress-count{
    color: #1338BE;
}
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}

@media (max-width: 768px) {
        .step-wizard-list {
            flex-direction: column;
            align-items: center;
        }
        
        .step-wizard-item {
            width: 60px;
            height: 60px;
            font-size: 20px;
        }
        .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s, transform 0.3s;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-icon {
        margin-left: 10px;
    }

    .icon {/*  */
        font-size: 20px;
    }

    body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
} 
}
</style>
