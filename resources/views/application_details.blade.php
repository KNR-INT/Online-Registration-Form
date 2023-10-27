<html lang="en">
@include('header')
<body style="background-color: #ffffff; font-family: Arial, sans-serif;">
<div style="max-width: 1200px; margin: 0 auto; padding: 2px;">
    <div class="container-fluid py-4">
        <div class="card">
        <section  style="d-flex justify-content-center align-items-center">
   
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
            <div class="circle active">
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
                <form id="myForm" action="{{ url('update-applino') }}" enctype="multipart/form-data">
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
                    <br/>
                    <?php 
                        $id = $_GET['appli_id'];
                        $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                    ?>
                    <div class="col-15">
                    <div class="text-align: center;" >	
                    <center>
                    <?php if ($student[0]->class == 'Montessori I' || $student[0]->class == 'Montessori II' || $student[0]->class == 'Montessori III'): ?>
                    <center><label style="color:#343a40;"><h1><b>I - 5 ACADEMY</b></h1></label></center>
                    <?php else: ?>
                    <center><label style="color:#343a40;"><h1><b>NATIONAL PUBLIC SCHOOL</b></h1></label></center>
                    <?php endif; ?>		
                    <label style="color:#343a40;"><h3><b>YESHWANTHPUR</b></h3></label>
                    <br>
                    <label style="color:#343a40;"><h4><b><u>Application For Registration</u></b></h4>
                   <?php
                    $academic = $student[0]->academic_year;
                    $acad_yr = explode('-',$academic);
                    $apid = $student[0]->id;
                    $last_appli_id = sprintf('%04u', $apid);
                   ?>
                    <label style="color:#343a40;font-family: Calibri, sans-serif;"><h2><b>Application Number: YPR/<?php echo $student[0]->class;?>/<?php echo $acad_yr[0];?>/<?php echo $last_appli_id ?></b></h2></label>
                    </div></center>
                    </div>

                    <div class="card">
                    <div class="card-header" style="background-color:#99d6ff; height:50px;">  
                    <center>          
                        <label style="color:#343a40;"><h5><b>Student Details</b></h5>
                    </center>
                    </div> 
                    </div> 

                   

                    <input type="hidden" id="page_type" name="page_type" value="<?php echo $_GET['class']; ?>">

                    <input type="hidden" id="application_no" name="application_no" value="YPR/<?php echo $student[0]->class;?>/<?php echo $acad_yr[0];?>/<?php echo $last_appli_id ?>">

                    <input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">

                    </form>
        
                    <table align="left" cellpadding = "20" >
                            <?php 
                            $class = $_GET['class'];
                            ?>
                            <?php 
                            $id = $_GET['appli_id'];
                            $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                            ?>

                    <tr>
                    <td><b>Name Of the Student</b></td>
                    <td><input class="form-control" type="text" id="name" value="<?php echo $student[0]->name; ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Gender</b></td>
                    <td><input class="form-control" type="text" id="gender" value="<?php echo $student[0]->gender ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Nationality</b></td>
                    <td><input class="form-control" type="text" id="nationality" value="<?php echo $student[0]->nationality ?>" readonly></td>
                    </tr>
                    
                    <td><b>Mother Tongue</b></td>
                    <td><input class="form-control" type="text" id="tongue" value="<?php echo $student[0]->mother_tongue ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Aadhar Card No</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->aadhar))
                        {
                        echo '<input class="form-control" type="text" id="aadhar" value="'.$student[0]->aadhar.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="aadhar" value="NIL" readonly>';
                        }
                        ?></td>
                    </tr>

                    <tr>
                    <td><b>Sibling studying in NPS YPR</b></td>
                    <td>
                        <?php
                        if($student[0]->sibling_change == 'Yes')
                        {
                        echo '<input class="form-control" type="text" id="sib1_name" value="' . $student[0]->sib1_name . ', ' . $student[0]->sib1_cls_sec . '" readonly> <br/>';
                        if (!empty($student[0]->sib2_name) && !empty($student[0]->sib2_cls_sec)){
                        echo '<input class="form-control" type="text" id="sib2_name" value="' . $student[0]->sib2_name . ', ' . $student[0]->sib2_cls_sec . '" readonly>';
                        }
                        }
                        else {
                        echo '<input class="form-control" type="text" id="sib2_name" value="' . $student[0]->sibling_change . '" readonly>';
                        }
                        ?>
                        </td>
                    </tr>

                    <tr>
                    <td>
                    <?php if ($student[0]->class =='Grade 1' || $student[0]->class =='Grade 2' || $student[0]->class =='Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8' ): ?>    
                    <b>Language 3</b></td>
                    <td><input class="form-control" type="text" id="transport" value="<?php echo $student[0]->third_language ?>" readonly>
                    <?php endif; ?>
                    </td>
                    </tr>
                    </table>

                    <table align="right" cellpadding = "20">
                    <tr>
                    <td><b>Date Of Birth</b></td>
                    <td><input class="form-control" type="text" id="birth" value="<?php echo date('d-m-Y', strtotime($student[0]->dob)); ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Class</b></td>
                    <td><input class="form-control" type="text" id="class1" value="<?php echo $student[0]->class ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Religion</b></td>
                    <td><input class="form-control" type="text" id="religion" value="<?php echo $student[0]->religion ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Birth Place</b></td>
                    <td><input class="form-control" type="text" id="place" value="<?php echo $student[0]->birth_place ?>"  readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Mode Of Transport</b></td>
                    <td><input class="form-control" type="text" id="transport" value="<?php echo $student[0]->transport ?>" readonly></td>
                    </tr>

                    <tr>
                    <?php if ($student[0]->link_class == "1to9"): ?>
                    <td> 
                    <b>Language 2</b></td>
                    <td><input class="form-control" type="text" id="transport" value="<?php echo $student[0]->sec_language ?>" readonly>
                    </td>
                    <?php elseif ($student[0]->link_class == "11"): ?>
                    <?php
                        $courseData = DB::connection('secondary')->table('create_course')
                        ->select('course_name', DB::raw('GROUP_CONCAT(subject_name ORDER BY sequence ASC) as subject_names'))
                        ->where('course_name', '=', $student[0]->electives) 
                        ->groupBy('course_name')
                        ->get();
                    ?>
                        <td> 
                    <b>Stream Selected</b></td>
                    <td><input class="form-control" type="text" id="transport" value="<?php echo $student[0]->electives;?><?php echo ' ('.$courseData[0]->subject_names.')' ?>" readonly>
                    </td>
                    <?php endif; ?>
                    </tr>
                    </table>
                    </div>

                    <div class="card ">
                    <div class="card-header" style="background-color:#99d6ff; height:50px; margin-left:15px; margin-right:15px;">
                    <center>
                        <label style="color:#343a40;"><h5><b>Parent Details</b></h5>
                    </center> 
                    </div>
                   
                    <div class="card-body table-responsive p-1">

                    <table align="left" cellpadding = "20" style="margin-left:10px;">

                    <tr>
                    <td><b>Father Name</b></td>
                    <td><input class="form-control" type="text" id="father_name" value="<?php echo $student[0]->father_name ?>" readonly></td>
                    </td>
                    </tr>
                    
                    <tr>
                    <td><b>Father's Mobile Number</b></td>
                    <td><input class="form-control" type="text" id="mobile_number" value="<?php echo $student[0]->father_mob ?>" readonly></td>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Email Id</b></td>
                    <td><input class="form-control" type="text" id="email_id" value="<?php echo $student[0]->father_email_verified_at ?>" readonly></td>

                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Mother Tongue</b></td>
                    <td><input class="form-control" type="text" id="name1" value="<?php echo $student[0]->father_mother_tongue ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Father's Qualification</b></td>
                    <td><input class="form-control" type="text" id="father_graduation" value="<?php echo $student[0]->father_graduation ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Residential Address</b></td>
                    <td><input class="form-control" type="text" id="residential" value="<?php echo $student[0]->father_residential_address ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Area</b></td>
                    <td><input class="form-control" type="text" id="area" value="<?php echo $student[0]->father_area ?>" readonly></td>

                    </tr>
                    <tr>
                    <td><b>District</b></td>
                    <td><input class="form-control" type="text" id="district" value="<?php echo $student[0]->father_district ?>" readonly></td>

                    </tr>
                    <tr>
                    <td><b>State</b></td>
                    <td><input class="form-control" type="text" id="state" value="<?php echo $student[0]->father_state ?>" readonly></td>

                    </tr>
                    <tr>
                    <td><b>Country</b></td>

                    <td><input class="form-control" type="text" id="country" value="<?php echo $student[0]->father_country ?>" readonly></td>

                    </td>
                    </tr>
                    <tr>
                    <td><b>Pincode</b></td>
                    <td><input class="form-control" type="text" id="pincode" value="<?php echo $student[0]->father_pincode ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Telephone(R)</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_residential_no))
                        {
                        echo '<input class="form-control" type="text" id="father_residential_no" value="'.$student[0]->father_residential_no.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_residential_no" value="NIL" readonly>';
                        }
                        ?></td>
                    </tr>
                    
                    </table>

                    <table align="right" cellpadding = "20" style="margin-right:10px;">
                    
                    <tr>
                    <td><b>Mother Name</b></td>
                    <td><input class="form-control" type="text" id="mother_name" value="<?php echo $student[0]->mother_name ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Mother's Mobile Number</b></td>
                    <td><input class="form-control" type="text" id="mobile_number1" value="<?php echo $student[0]->mother_mob ?>" readonly></td>
                    </tr>
                    
                    <tr>
                    <td><b>Mother's Email Id</b></td>
                    <td><input class="form-control" type="text" id="mother_email_id" value="<?php echo $student[0]->mother_email_verified_at ?>" readonly></td>
                    </td>
                    </tr>
                    
                    <tr>
                    <td><b>Mother's Mother Tongue</b></td>
                    <td><input class="form-control" type="text" id="mother_tongue" value="<?php echo $student[0]->mother_mother_tongue ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Mother's Qualification</b></td>
                    <td><input class="form-control" type="text" id="mother_graduation" value="<?php echo $student[0]->mother_graduation ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Residential Address</b></td>
                    <td><input class="form-control" type="text" id="mother_residential_address" value="<?php echo $student[0]->mother_residential_address ?>" readonly></td>
                    </tr> 

                    <tr>
                    <td><b>Area</b></td>
                    <td><input class="form-control" type="text" id="mother_area" value="<?php echo $student[0]->mother_area ?>" readonly></td>
                    </tr>
                    <tr>
                    <td><b>District</b></td>
                    <td><input class="form-control" type="text" id="mother_district" value="<?php echo $student[0]->mother_district ?>" readonly></td>
                    </tr>
                    <tr>
                    <td><b>State</b></td>
                    <td><input class="form-control" type="text" id="mother_state" value="<?php echo $student[0]->mother_state ?>" readonly></td>
                    </tr>
                    <tr>
                    <td><b>Country</b></td>
                    <td><input class="form-control" type="text" id="mother_country" value="<?php echo $student[0]->mother_country ?>" readonly></td>
                    </tr>
                    <tr>
                    <td><b>Pincode</b></td>
                    <td><input class="form-control" type="text" id="mother_pincode" value="<?php echo $student[0]->mother_pincode ?>" readonly></td>
                    </tr>

                    <tr>
                    <td><b>Telephone(R)</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->mother_residential_no))
                        {
                        echo '<input class="form-control" type="text" id="mother_residential_no" value="'.$student[0]->mother_residential_no.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_residential_no" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
                   
                    </table>
                    </div>

                    <div class="card ">
                    <div class="card-header" style="background-color:#99d6ff; height:50px; margin-left:15px; margin-right:15px;">
                    <center>
                        <label style="color:#343a40;"><h5><b>Company Details</b></h5>
                    </center>
                    </div>
                    
                    <div class="card-body table-responsive p-1">
                    <table align="left" cellpadding = "20" style="margin-left:10px;">

                    <tr>
                    <td><b>Nature of Employment</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_organization))
                        {
                        echo '<input class="form-control" type="text" id="father_organization" value="'.$student[0]->father_organization.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_organization" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Profession</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_profession))
                        {
                        echo '<input class="form-control" type="text" id="father_profession" value="'.$student[0]->father_profession.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_profession" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Company Name</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_company))
                        {
                        echo '<input class="form-control" type="text" id="father_company" value="'.$student[0]->father_company.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_company" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Designation</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_designation))
                        {
                        echo '<input class="form-control" type="text" id="father_designation" value="'.$student[0]->father_designation.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_designation" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
  
                    <tr>
                    <td><b>Father's Company address</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_company_address))
                        {
                        echo '<input class="form-control" type="text" id="father_company_address" value="'.$student[0]->father_company_address.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_company_address" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Office Number</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->father_office_number))
                        {
                        echo '<input class="form-control" type="text" id="father_office_number" value="'.$student[0]->father_office_number.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="father_office_number" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Father's Annual Income(INR)</b></td>
                    <td><input class="form-control" type="text" id="gross" value="<?php echo $student[0]->father_annual_income ?>" readonly></td>
                    </tr>

                    </table>

                    <table align="right" cellpadding = "20" style="margin-right:10px;">

                    <tr>
                    <td><b>Nature of Employment</b></td>
                    <td> 
                    <?php
                        if(!empty($student[0]->mother_organization))
                        {
                        echo '<input class="form-control" type="text" id="mother_organization" value="'.$student[0]->mother_organization.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_organization" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Mother's Profession</b></td>
                    <td> 
                    <?php
                        if(!empty($student[0]->mother_profession))
                        {
                        echo '<input class="form-control" type="text" id="mother_profession" value="'.$student[0]->mother_profession.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_profession" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
 
                    <tr>
                    <td><b>Mother's Company Name</b></td>
                    <td> 
                    <?php
                        if(!empty($student[0]->mother_company))
                        {
                        echo '<input class="form-control" type="text" id="mother_company" value="'.$student[0]->mother_company.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_company" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Mother's Designation</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->mother_designation))
                        {
                        echo '<input class="form-control" type="text" id="mother_designation" value="'.$student[0]->mother_designation.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_designation" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
                    
                    <tr>
                    <td><b>Mother's Company address</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->mother_company_address))
                        {
                        echo '<input class="form-control" type="text" id="mother_company_address" value="'.$student[0]->mother_company_address.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_company_address" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Mother's Office Number</b></td>
                    <td>
                    <?php
                        if(!empty($student[0]->mother_office_number))
                        {
                        echo '<input class="form-control" type="text" id="mother_office_number" value="'.$student[0]->mother_office_number.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="mother_office_number" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Mother's Annual Income(INR)</b></td>
                    <td><input class="form-control" type="text" id="mother_gross" value="<?php echo $student[0]->mother_annual_income ?>" readonly></td>
                    </tr>
                    
                    </table>
                    </div>

                    <?php if ($student[0]->class =='Grade 2' || $student[0]->class == 'Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8' || $student[0]->class =='Grade 9' || $student[0]->class =='Grade 11'): ?>
                    <div class="card ">
                    <div class="card-header" style="background-color:#99d6ff; height:50px; margin-left:15px; margin-right:15px;">
                    <center>
                        <label style="color:#343a40;"><h5><b>Details of Schooling</b></h5>
                    </center> 
                    </div>
                   <?php   
                    $old_school = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' ORDER BY `rec_id` ASC");
                    ?>
                    <div class="card-body table-responsive p-1">

                <?php foreach($old_school as $row): ?>
                    <table align="left" cellpadding = "20" style="margin-left:10px;">
                    <tr>
                    <td><b>Academic Year</b></td>
                    <td><input class="form-control" type="text" id="academic_year" value="<?php echo $row->academic_year ?>" readonly></td>
                    </td>
                    </tr>
                    
                    <tr>
                    <td><b>Class</b></td>
                    <td>
                    <?php
                        if(!empty($row->old_class))
                        {
                        echo '<input class="form-control" type="text" id="old_class" value="'.$row->old_class.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="old_class" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </td>
                    </tr>
<!-- 
                    <tr>
                    <td>
                    <?php
                    // if ($row->academic_year == "2023-24"){
                    //     echo "Mid-Term Examination Subjects Percentage / Grade";
                    // }
                    ?>
                    </td>
                    </tr> -->

                    <tr>
                    <td><b>Engish Percentage / Grade</b></td>
                    <td>
                    <?php
                        if(!empty($row->eng_marks))
                        {
                        echo '<input class="form-control" type="text" id="eng_marks" value="'.$row->eng_marks.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="eng_marks" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Lang II 
                        <?php 
                        if (!empty($row->lang2_name)) {
                            echo $row->lang2_name;
                        } else {
                            echo "NIL"; 
                        }
                    ?> Percentage / Grade</b></td>

                    <td>
                    <?php
                        if(!empty($row->lang2_marks))
                        {
                        echo '<input class="form-control" type="text" id="lang2_marks" value="'.$row->lang2_marks.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="lang2_marks" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
                    </table>

                    <table align="right" cellpadding = "20" style="margin-right:10px;">
                    <tr>
                    <td><b>School</b></td>
                    <td>
                    <?php
                        if(!empty($row->school_name))
                        {
                        echo '<input class="form-control" type="text" id="school_name" value="'.$row->school_name.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="school_name" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Board</b></td>
                    <td>
                    <?php
                        if(!empty($row->board))
                        {
                        echo '<input class="form-control" type="text" id="board" value="'.$row->board.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="board" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>

                    <tr>
                    <td><b>Maths Percentage / Grade</b></td>
                    <td>
                    <?php
                        if(!empty($row->math_marks))
                        {
                        echo '<input class="form-control" type="text" id="math_marks" value="'.$row->math_marks.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="math_marks" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
                    
                    <tr>
                    <td><b>Science Percentage / Grade</b></td>
                    <td>
                    <?php
                        if(!empty($row->science_marks))
                        {
                        echo '<input class="form-control" type="text" id="science_marks" value="'.$row->science_marks.'" readonly>';
                        }
                        else {
                        echo '<input class="form-control" type="text" id="science_marks" value="NIL" readonly>';
                        }
                    ?>
                    </td>
                    </tr>
                    </table>
                <?php endforeach; ?>
                    </div>
        <?php endif; ?>

                    <div class="card ">
                    <div class="card-header" style="background-color:#99d6ff; height:50px; margin-left:15px; margin-right:15px;">
                    <center>
                        <label style="color:#343a40;"><h5><b>Documents</b></h5>
                    </center>
                    </div>
           
                   <br>
        
                    <table align="left" cellpadding="10" style="margin-left:25px;">

                    <tr>
                    <td><b> Student's Photo</b></td>
                    <td>
                    @php
                    $fileInfo = pathinfo($student[0]->std_image);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah6" src="{{ asset('public/' . $student[0]->std_image) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview6" src="{{ asset('public/' . $student[0]->std_image) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
                    <!-- <td  colspan="2"></td> -->

                    <td><b> Birth Certificate</b></td>
                    <td>
                    @php
                    $fileInfo = pathinfo($student[0]->birth_cer);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah2" src="{{ asset('public/' . $student[0]->birth_cer) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview2" src="{{ asset('public/' . $student[0]->birth_cer) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
                    </tr>
                
                    <tr>
                    <td><b> Father's Aadhar card</b></td>
                    <td> 
                    @php
                    $fileInfo = pathinfo($student[0]->father_aadhar);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah1" src="{{ asset('public/' . $student[0]->father_aadhar) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview1" src="{{ asset('public/' . $student[0]->father_aadhar) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
     
                    <td><b> Mother's Aadhar card</b></td>
                    <td>    
                    @php
                    $fileInfo = pathinfo($student[0]->mother_aadhar);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah3" src="{{ asset('public/' . $student[0]->mother_aadhar) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview3" src="{{ asset('public/' . $student[0]->mother_aadhar) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
                    <!-- <td colspan="2"></td> -->
                    </tr>

                    <?php if($student[0]->class == 'Grade 2' || $student[0]->class == 'Grade 3' || $student[0]->class == 'Grade 4' || $student[0]->class == 'Grade 5' ||$student[0]->class == 'Grade 6' || $student[0]->class == 'Grade 7' || $student[0]->class == 'Grade 8' || $student[0]->class == 'Grade 9' || $student[0]->class == 'Grade 11')
                    {
                    ?>
                    <tr>
                    <td><b> Student's Aadhar card</b></td>
                    <td> 
                    @php
                    $fileInfo = pathinfo($student[0]->student_adr);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah" src="{{ asset('public/' . $student[0]->student_adr) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview" src="{{ asset('public/' . $student[0]->student_adr) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
                    <td colspan="2"></td>
                    <?php
                    }
                    ?>

                    <?php if($student[0]->class =='Montessori I' || $student[0]->class =='Montessori II' || $student[0]->class == 'Montessori III' || $student[0]->class =='PRE-K' ||$student[0]->class =='Kindergarten I' || $student[0]->class =='Kindergarten II' || $student[0]->class =='Grade 1')
                    {
                    ?>
                    <td><b> Immunization Card</b></td>
                    <td>  
                    @php
                    $fileInfo = pathinfo($student[0]->immunization_card);
                    $fileExtension = isset($fileInfo['extension']) ? $fileInfo['extension'] : null;
                    @endphp
                    @if ($fileExtension && in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah4" src="{{ asset('public/' . $student[0]->immunization_card) }}" alt="Image" style="width:150px;height:200px; margin-left:20px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <iframe id="pdfPreview4" src="{{ asset('public/' . $student[0]->immunization_card) }}" style="width:150px; height:200px; margin-left:50px;">
                        </iframe>
                    @endif
                    </td>
                    <td colspan="2"></td>
                    <?php
                    }
                    ?>
                    </tr>
                    </tr>
                    </table>
 
                        <div class="card-body pt-4 p-3">
                            <div class="justify-content-center" style="margin-top:50px; margin-left: 40px; margin-right: 40px;">
                            <div class="container-fluid">
                            <?php if ($student[0]->link_class == "mont"): ?>
                                    <h3 style= "color:#343a40"><b>NOTE TO PARENTS</b></h3><br/>
                                    <ul>
                                    <li> Copies of documents mentioned below to be attested by both the parents and submitted on the day of Interaction.</li><br/>
                                        <ol>
                                        <li>Birth certificate of the student </li><br/>
                                        <li>Immunisation Card of the student </li><br/>
                                        <li>Study Certificate (Mont 2 and Mont 3) </li>
                                        <br/>
                                        <li>Student’s Aadhar Card</li><br/>
                                        <li>Parents’ Aadhar Card </li><br/>
                                        <li>If your child is a Foreign National then please submit a copy of your ward's passport attested by both parents.</li>
                                        </ol>
                                    </ul>    
                                    <ul>
                                    <li>Names entered in the registration form should be as per the student’s Birth Certificate. </li>
                                    <br/>
                                    <li>Incomplete forms will be rejected </li>
                                    <br/>
                                    <li>Registration for admission does not ensure an admission.  Admission is granted on availability of seats. </li><br/>
                                    <li>An annual fee increase of 10 to 15 percent is effective to offset the increasing expenditure by way of salary, maintenance, material and other expenditures.  I – 5 Academy is a private unaided self-financing institution. </li>
                                    <br/>
                                    <li>If an intimation is not received from the school, it should be presumed that there is no vacancy and no separate intimation will be sent to the applicants who are not selected.  </li>
                                    <br/>
                                    </ul>

                                    <h3 style= "color:#343a40"><b>DECLARATION BY PARENT/GUARDIAN</b></h3>
                                    <br/>
                                    <p>I have read the rules and regulations of I – 5 Academy and I fully agree to abide by them, if admitted. I am aware that my ward’s appropriate photo/video will be put on school website / social media to showcase his / her achievements / talents as decided by school authorities.  </p>
                                    <p>I understand that the School refund policy will be applicable for my ward's withdrawal after admission.</p>
                                    <p>I will refrain from posting any derogatory remarks about the school or school fraternity on social media platforms.</p>
                                    <p>I hereby declare that the information furnished above is true and correct to the best of my knowledge and I undertake to inform you of any changes therein, immediately. </p>

                            <?php else: ?>
                                <h3 style= "color:#343a40"><b>NOTE TO PARENTS</b></h3><br/>
                                    <ul>
                                    <li>The Copies of documents mentioned below to be attested by both the parents and submitted on the day of entrance (Classes 1- 12) / Interaction day (for Preprimary classes). </li><br/>
                                        <ol>
                                        <li>Birth certificate of the student </li><br/>
                                        <li>Immunisation Card for classes Pre-Primary – Class 1 </li><br/>
                                        <li>Class 2 & above applicants should provide previous 2 years academic progress report and current year Mid-term report card. Class 1 applicants should submit Study Certificate from the previous school.</li>
                                        <br/>
                                        <li>Student’s Aadhar Card</li><br/>
                                        <li>Parents’ Aadhar Card </li><br/>
                                        <li>If your child is a Foreign National then please submit a copy of your ward's passport attested by both parents.</li>
                                        </ol>
                                    </ul>    
                                    <ul>
                                    <li>Student and Parents names entered in the registration form should be as per the Birth Certificate (For Class 1 and below) / as mentioned in the student’s current school records (For Classes 2 and above).  </li>
                                    <br/>
                                    <li>Incomplete forms will be rejected </li>
                                    <br/>
                                    <li>Registration for admission does not ensure admission.  Admission is granted on merit and availability of seats.  Entrance test for classes 1 to 9 & 11 will be conducted before granting admission. </li><br/>
                                    <li>An annual fee increase of 10 to 15 percent is effective to offset the increasing expenditure by way of salary, maintenance, material and other expenditure.  National Public School Yeshwanthpur is a private unaided self-financing institution.</li>
                                    <br/>
                                    <li>If an intimation is not received from the school, it should be presumed that there is no vacancy and no separate intimation will be sent to the applicants who are not selected. </li>
                                    <br/>
                                    </ul>

                                    <h3 style= "color:#343a40"><b>DECLARATION BY PARENT/GUARDIAN</b></h3>
                                    <br/>
                                    <p>I have read the rules and regulations of National Public School, Yeshwanthpur and I fully agree to abide by them, if admitted. I am aware that my ward’s appropriate photo/video will be put on school website / social media to showcase his / her achievements / talents as decided by school authorities.</p>
                                    <p>I understand that the School refund policy will be applicable for my ward's withdrawal after admission.</p>
                                    <p>I will refrain from posting any derogatory remarks about the school or school fraternity on social media platforms.</p>
                                    <p>I hereby declare that the information furnished above is true and correct to the best of my knowledge and I undertake to inform you of any changes therein, immediately. </p>
                            <?php endif; ?>
                            </div>
                            </div>
                            </div>

                            <div class="icheck-primary d-inline" style="margin-left:70px;">
                                <input type='checkbox'  id="checkbox" name = "checkbox"> 
                                <label for="checkbox">
                                <b>I Agree</b>
                                </label>
                            </div>
                            <br>
                            <center>
                                <a class="btn btn-back  btn-primary float-center ">Edit Application</a>
                                <button  DISABLED class="btn btn-submit btn-primary" id="btn1" >Continue </button>
                            </center>
                            <br/>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
  $('#checkbox').click(function() {
        if ($(this).is(':checked')) {
        		$('#btn1').removeAttr('disabled');
            
        } else {
            $('#btn1').attr('disabled', 'disabled');
        }
    });
    $('.btn-back').click(function(){
            let class_name = document.getElementById("page_type").value;
            let appli_id = document.getElementById("appli_id").value;
            window.location.href = "{{ url('onlinereg') }}/a?class="+class_name+"&appli_id="+appli_id;
        });

        $('.btn-submit').click(function(){
            document.getElementById("myForm").submit();
        });

</script>
@include('footer')

<style>
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
    /* background-color:  #00008B;
    background-image: linear-gradient(19deg, #21d4fd 0%, #b721ff 100%); */
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

    .icon {
        font-size: 20px;
    }
}
    
</style>
