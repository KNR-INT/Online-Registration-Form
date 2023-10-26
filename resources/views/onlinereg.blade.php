<html lang="en">
@include('header')
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
<div style="max-width: 1200px; margin: 0 auto; padding: 2px;">
    <div class="container-fluid py-4">
        <div class="card">
        <section  style="d-flex justify-content-center align-items-center">
   
        <div class="step-container">
    <div class="progress-container">
        <div class="circle-container">
            <div class="circle active">
                1
                <div class="lineaq"></div>
            </div>
            <div class="circle">
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
                <form id="myForm" action="{{ url('store-student') }}" enctype="multipart/form-data">
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
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <?php 
                            $id = $_GET['appli_id'];
                            $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                            ?>
                            <?php
                            $courseData = DB::connection('secondary')->table('create_course')
                            ->select('course_name', DB::raw('GROUP_CONCAT(subject_name) as subject_names'))
                            ->groupBy('course_name')
                            ->get();
                           ?>
                            <input type="hidden" id="academic_year" name="academic_year" value="<?php echo $student[0]->academic_year; ?>">

                            <label class="form-control-label"><b>Name of the Student*</b></label>
                            <input  class="form-control" type="text" placeholder="Enter Student name"  id="name" name="name" maxlength="70" value="{{ strtoupper($student[0]->name) }}" style="text-transform: uppercase;">
                            <span id="name_err" style="color:red;"></span>
                             </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        
                        <div class="form-group">
                            <label class="form-control-label" style="font-weight: bold;">Gender*</label>
                            <select class="form-control" id="gender" name="gender" style="color: #495057;">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Boy" <?php if($student[0]->gender == "Boy"){ echo "selected"; } ?> style="text-transform: capitalize;">Boy</option>
                                <option value="Girl" <?php if($student[0]->gender == "Girl"){ echo "selected"; } ?> style="text-transform: capitalize;">Girl</option>
                            </select>
                            <span id="gender_err" style="color: red;"></span>
                        </div>
                    </div>

                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label  class="form-control-label" ><b>Date of Birth*</b></label>
                            <input type="date" class="form-control" placeholder="Enter birth date"  id="dob" name="dob" value="<?php echo $student[0]->dob; ?>" >
                            <span id="dob_err" style="color:red;"></span>
                        </div>
                        <?php 
                            $class = $_GET['class'];
                        ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b> Class*</b></label>
                        <input type="hidden" id="class_old" name="class_old" value="<?php if(!empty($student[0]->class)) { echo $student[0]->class; } ?>">
                            <select  class="form-control" id="class" name="class">
                                <option disabled selected value="">--SELECT--</option>
                                <?php
                                $acadamic_year_online= DB::connection('secondary')
                                ->table('academic_year')
                                ->where('set_application_year', '=', 'Yes') 
                                ->first();
                
                                if($class == "mont")
                                {
                                ?>
                                    <?php
                                    $mont1 = "Montessori I";
                                    $dynamic_grade_mont1 = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $mont1)
                                    ->first();
                                    // echo  $dynamic_grade_mont1;

                                    $startdate = $dynamic_grade_mont1->start_date  ?? '' ;
                                    $enddate = $dynamic_grade_mont1->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Montessori I"<?php if($student[0]->class == "Montessori I"){ echo "SELECTED"; } ?>>Montessori I</option>
                                    <?php }?>
                                    
                                    <?php
                                    $mont2 = "Montessori II";
                                    $dynamic_grade_mont2 = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $mont2)
                                    ->first();

                                    $startdate = $dynamic_grade_mont2->start_date  ?? '' ;
                                    $enddate = $dynamic_grade_mont2->end_date  ?? '' ;

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Montessori II" <?php if($student[0]->class == "Montessori II"){ echo "SELECTED"; } ?> >Montessori II</option>
                                    <?php }?>

                                    <?php
                                    $mont3 = "Montessori III";
                                    $dynamic_grade_mont3 = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $mont3)
                                    ->first();

                                    $startdate = $dynamic_grade_mont3->start_date  ?? '' ;
                                    $enddate = $dynamic_grade_mont3->end_date  ?? '' ;

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Montessori III" <?php if($student[0]->class == "Montessori III"){ echo "SELECTED"; } ?>>Montessori III</option>
                                    <?php }?>

                                <?php
                                }
                                elseif($class == "kinder")  
                                {
                                ?>
                                    <?php
                                    $grade = "PRE-K";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="PRE-K"<?php if($student[0]->class == "PRE-K"){ echo "SELECTED"; } ?>>PRE-K</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Kindergarten I";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Kindergarten I"<?php if($student[0]->class == "Kindergarten_I"){ echo "SELECTED"; } ?>>Kindergarten I</option>
                                    <?php }?>
                                    
                                    <?php
                                    $grade = "Kindergarten II";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Kindergarten II" <?php if($student[0]->class == "Kindergarten_II"){ echo "SELECTED"; } ?>>Kindergarten II</option>
                                    <?php }?>

                                <?php
                                }
                                elseif($class == "1to9")
                                {
                                ?>
                                    <?php
                                    $grade = "Grade 1";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 1"<?php if($student[0]->class == "Grade 1"){ echo "SELECTED"; } ?>>Grade 1</option>
                                    <?php }?>
                                    
                                    <?php
                                    $grade = "Grade 2";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 2"<?php if($student[0]->class == "Grade 2"){ echo "SELECTED"; } ?>>Grade 2</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 3";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 3"<?php if($student[0]->class == "Grade 3"){ echo "SELECTED"; } ?>>Grade 3</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 4";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 4"<?php if($student[0]->class == "Grade 4"){ echo "SELECTED"; } ?>>Grade 4</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 5";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 5"<?php if($student[0]->class == "Grade 5"){ echo "SELECTED"; } ?>>Grade 5</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 6";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 6"<?php if($student[0]->class == "Grade 6"){ echo "SELECTED"; } ?>>Grade 6</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 7";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 7"<?php if($student[0]->class == "Grade 7"){ echo "SELECTED"; } ?>>Grade 7</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 8";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 8"<?php if($student[0]->class == "Grade 8"){ echo "SELECTED"; } ?>>Grade 8</option>
                                    <?php }?>

                                    <?php
                                    $grade = "Grade 9";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 9"<?php if($student[0]->class == "Grade 9"){ echo "SELECTED"; } ?>>Grade 9</option>
                                    <?php }?>

                                <?php
                                }
                                elseif($class == "11")
                                {
                                ?>
                                    <?php
                                    $grade = "Grade 11";
                                    $dynamic_grade = DB::connection('secondary')
                                    ->table('application_setting')
                                    ->where('year', $acadamic_year_online->academic_year)
                                    ->where('grade', $grade)
                                    ->first();

                                    $startdate = $dynamic_grade->start_date  ?? '';
                                    $enddate = $dynamic_grade->end_date  ?? '';

                                    if($startdate <= $currentDateIST && $currentDateIST <= $enddate) {?>
                                    <option value="Grade 11" <?php if($student[0]->class == "Grade 11"){ echo "SELECTED"; } ?>>Grade 11</option>
                                    <?php }?>

                                <?php
                                }
                                ?>
                                
                            </select>
                            <span id="class_name_err" style="color:red;"></span>
                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Birth Place*</b></label>
                            <input class="form-control" type="text" placeholder="Enter your Birth Place"  id="birth_place" name="birth_place"  maxlength="70" value="<?php echo $student[0]->birth_place; ?>">
                            <span id="birth_place_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Nationality*</b></label>
                            <select  class="form-control" id="nationality" name="nationality">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="American"<?php if($student[0]->nationality == "American"){ echo "SELECTED"; } ?>>American</option>
                                <option value="Australia" <?php if($student[0]->nationality == "Australia"){ echo "SELECTED"; } ?>>Australia</option>
                                <option value="British" <?php if($student[0]->nationality == "British"){ echo "SELECTED"; } ?>>British</option>
                                <option value="Canadian" <?php if($student[0]->nationality == "Canadian"){ echo "SELECTED"; } ?>>Canadian</option>
                                <option value="Indian" <?php if($student[0]->nationality == "Indian"){ echo "SELECTED"; } ?>>Indian</option>
                                <option value="Irish" <?php if($student[0]->nationality == "Irish"){ echo "SELECTED"; } ?>>Irish</option>
                                <option value="Nepalese"<?php if($student[0]->nationality == "Nepalese"){ echo "SELECTED"; } ?>>Nepalese</option>
                                <option value="Others"<?php if($student[0]->nationality == "Others"){ echo "SELECTED"; } ?>>Others</option>
                            </select>
                            <span id="nationality_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Religion*</b></label>
                            <select class="form-control" id="religion" name="religion">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Buddist" <?php if($student[0]->religion =="Buddist"){ echo "SELECTED"; } ?>>Buddhist</option>
                                <option value="Christian" <?php if($student[0]->religion=="Christian"){ echo "SELECTED"; } ?>>Christian</option>
                                <option value="Hindu" <?php if($student[0]->religion =="Hindu"){ echo "SELECTED"; } ?>>Hindu</option>
                                <option value="Islam" <?php if($student[0]->religion=="Islam"){ echo "SELECTED"; } ?>>Islam</option>
                                <option value="Jain" <?php if($student[0]->religion=="Jain"){ echo "SELECTED"; } ?>>Jain</option>
                                <option value="Muslim" <?php if($student[0]->religion=="Muslim"){ echo "SELECTED"; } ?>>Muslim</option>
                                <option value="Roman Catholic" <?php if($student[0]->religion=="Roman Catholic"){ echo "SELECTED"; } ?>>Roman Catholic</option>
                                <option value="Sikh" <?php if($student[0]->religion=="Sikh"){ echo "SELECTED"; } ?>>Sikh</option>
                                <option value="Zorastrian" <?php if($student[0]->religion=="Zorastrian"){ echo "SELECTED"; } ?>>Zoroastrian</option>
                                <option value="Others" <?php if($student[0]->religion=="Others"){ echo "SELECTED"; } ?>>Others</option>
                            </select>
                            <span id="religion_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Mother Tongue*</b></label>
                            <select class="form-control" id="mother_tongue" name="mother_tongue">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Assamese"<?php if($student[0]->mother_tongue == "Assamese"){ echo "SELECTED"; } ?>>Assamese</option>
                                <option value="Baduga"<?php if($student[0]->mother_tongue == "Baduga"){ echo "SELECTED"; } ?>>Baduga</option>
                                <option value="Bengali"<?php if($student[0]->mother_tongue == "Bengali"){ echo "SELECTED"; } ?>>Bengali</option>
                                <option value="Coorgi"<?php if($student[0]->mother_tongue == "Coorgi"){ echo "SELECTED"; } ?>>Coorgi</option>
                                <option value="English"<?php if($student[0]->mother_tongue == "English"){ echo "SELECTED"; } ?>>English</option>
                                <option value="Gujarathi"<?php if($student[0]->mother_tongue == "Gujarathi"){ echo "SELECTED"; } ?>>Gujarathi</option>
                                <option value="Haryanvi"<?php if($student[0]->mother_tongue == "Haryanvi"){ echo "SELECTED"; } ?>>Haryanvi</option>
                                <option value="Hindi"<?php if($student[0]->mother_tongue == "Hindi"){ echo "SELECTED"; } ?>>Hindi</option>
                                <option value="Kannada"<?php if($student[0]->mother_tongue == "Kannada"){ echo "SELECTED"; } ?>>Kannada</option>
                                <option value="Kashmiri"<?php if($student[0]->mother_tongue == "Kashmiri"){ echo "SELECTED"; } ?>>Kashmiri</option>
                                <option value="Khatri"<?php if($student[0]->mother_tongue == "Khatri"){ echo "SELECTED"; } ?>>Khatri</option>
                                <option value="Kodava"<?php if($student[0]->mother_tongue == "Kodava"){ echo "SELECTED"; } ?>>Kodava</option>
                                <option value="Konkani"<?php if($student[0]->mother_tongue == "Konkani"){ echo "SELECTED"; } ?>>Konkani</option>
                                <option value="Kutchi"<?php if($student[0]->mother_tongue == "Kutchi"){ echo "SELECTED"; } ?>>Kutchi</option>
                                <option value="Maithili"<?php if($student[0]->mother_tongue == "Maithili"){ echo "SELECTED"; } ?>>Maithili</option>
                                <option value="Malayalam"<?php if($student[0]->mother_tongue == "Malayalam"){ echo "SELECTED"; } ?>>Malayalam</option>
                                <option value="Manipuri"<?php if($student[0]->mother_tongue == "Manipuri"){ echo "SELECTED"; } ?>>Manipuri</option>
                                <option value="Marathi"<?php if($student[0]->mother_tongue == "Marathi"){ echo "SELECTED"; } ?>>Marathi</option>
                                <option value="Marwadi"<?php if($student[0]->mother_tongue == "Marwadi"){ echo "SELECTED"; } ?>>Marwadi</option>
                                <option value="Navyathi"<?php if($student[0]->mother_tongue == "Navyathi"){ echo "SELECTED"; } ?>>Navyathi</option>
                                <option value="Nepali"<?php if($student[0]->mother_tongue == "Nepali"){ echo "SELECTED"; } ?>>Nepali</option>
                                <option value="Odiya"<?php if($student[0]->mother_tongue == "Odiya"){ echo "SELECTED"; } ?>>Odiya</option>
                                <option value="Punjabi"<?php if($student[0]->mother_tongue == "Punjabi"){ echo "SELECTED"; } ?>>Punjabi</option>
                                <option value="Rajasthani"<?php if($student[0]->mother_tongue == "Rajasthani"){ echo "SELECTED"; } ?>>Rajasthani</option>
                                <option value="Sindhi"<?php if($student[0]->mother_tongue == "Sindhi"){ echo "SELECTED"; } ?>>Sindhi</option>
                                <option value="Sourashtra"<?php if($student[0]->mother_tongue == "Sourashtra"){ echo "SELECTED"; } ?>>Sourashtra</option>
                                <option value="Spanish"<?php if($student[0]->mother_tongue == "Spanish"){ echo "SELECTED"; } ?>>Spanish</option>
                                <option value="Tamil"<?php if($student[0]->mother_tongue == "Tamil"){ echo "SELECTED"; } ?>>Tamil</option>
                                <option value="Telugu"<?php if($student[0]->mother_tongue == "Telugu"){ echo "SELECTED"; } ?>>Telugu</option>
                                <option value="Tibetan"<?php if($student[0]->mother_tongue == "Tibetan"){ echo "SELECTED"; } ?>>Tibetan</option>
                                <option value="Tulu"<?php if($student[0]->mother_tongue == "Tulu"){ echo "SELECTED"; } ?>>Tulu</option>
                                <option value="Urdu"<?php if($student[0]->mother_tongue == "Urdu"){ echo "SELECTED"; } ?>>Urdu</option>
                                <option value="Others"<?php if($student[0]->mother_tongue == "Others"){ echo "SELECTED"; } ?>>Others</option>
                            </select>
                            <span id="mother_tongue_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Caste*</b></label>
                            <select class="form-control" id="caste" name="caste">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="BC"<?php if($student[0]->caste == "BC"){ echo "SELECTED"; } ?>>BC</option>
                                <option value="General"<?php if($student[0]->caste == "General"){ echo "SELECTED"; } ?>>General</option>
                                <option value="MBC"<?php if($student[0]->caste == "MBC"){ echo "SELECTED"; } ?>>MBC</option>
                                <option value="Minority"<?php if($student[0]->caste == "Minority"){ echo "SELECTED"; } ?>>Minority</option>
                                <option value="OBC"<?php if($student[0]->caste == "OBC"){ echo "SELECTED"; } ?>>OBC</option>
                                <option value="SC"<?php if($student[0]->caste == "SC"){ echo "SELECTED"; } ?>>SC</option>
                                <option value="ST"<?php if($student[0]->caste == "ST"){ echo "SELECTED"; } ?>>ST</option>  
                            </select>
                            <span id="caste_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>

                                <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <label class="form-control-label"><b>Blood Group*</b></label>
                            <select class="form-control" id="blood_group" name="blood_group">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="A+"<?php if($student[0]->blood_group == "A+"){ echo "SELECTED"; } ?>>A+</option>
                                <option value="A-"<?php if($student[0]->blood_group == "A-"){ echo "SELECTED"; } ?>>A-</option>
                                <option value="B+"<?php if($student[0]->blood_group == "B+"){ echo "SELECTED"; } ?>>B+</option>
                                <option value="B-"<?php if($student[0]->blood_group == "B-"){ echo "SELECTED"; } ?>>B-</option>
                                <option value="AB+"<?php if($student[0]->blood_group == "AB+"){ echo "SELECTED"; } ?>>AB+</option>
                                <option value="AB-"<?php if($student[0]->blood_group == "AB-"){ echo "SELECTED"; } ?>>AB-</option>
                                <option value="O+"<?php if($student[0]->blood_group == "O+"){ echo "SELECTED"; } ?>>O+</option>
                                <option value="O-"<?php if($student[0]->blood_group == "O-"){ echo "SELECTED"; } ?>>O-</option>
                            </select>
                            <span id="blood_group_err" style="color:red;"></span>
                        </div>
                                </div>
                                </div>
                                </div>

                        <div class="input-field">
                        </div>                        
                    <br>
                    <input type="hidden" id="sec_lan_old" name="sec_lan_old" value="<?php if(!empty($student[0]->sec_language)) { echo $student[0]->sec_language; } ?>">
                    <input type="hidden" id="trd_lan_old" name="trd_lan_old" value="<?php if(!empty($student[0]->third_language)) { echo $student[0]->third_language; } ?>">
                 <div id="language_mont">  
                </div> 
                <div id="language1234">  
                </div>
                <div id="language56">
                </div>
                <div id="language9">
                </div>
                <div id="language11">
                </div>
                <div class="row">
                        <div class="col-md-6">
                <input type="hidden" id="sibling_change_old" name="sibling_change_old" value="<?php if(!empty($student[0]->sibling_change)) { echo $student[0]->sibling_change; } ?>">
                <!-- <span id="sibling_change_err" style="color:red;"></span> -->
                <div class="sibling">
                    <span class="title"><b>Sibling currently studying at NPS Yeshwanthpur*</b>
                        <div class="input-field">
                            <select class="form-control" id="sibling_change" name="sibling_change">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Yes" <?php if($student[0]->sibling_change == "Yes"){ echo "SELECTED"; } ?>>Yes</option>
                                <option value="No" <?php if($student[0]->sibling_change == "No"){ echo "SELECTED"; } ?>>No</option>
                            </select>
                            <span id="sibling_change_err" style="color:red;"></span>
                        </div>
                    </span>
                    <br></br>
                    <div class="fields siblings" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                        <div class="input-field">
                            <input class="form-control" type="text" placeholder="Enter name" id="sib1_name" name="sib1_name"  maxlength="70" value="<?php if(!empty($student[0]->sib1_name)) { echo $student[0]->sib1_name; } ?>">
                            
                            <span id="sib1_name_err" style="color:red;"></span>
                               </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-field">
                                  <input class="form-control" type="text" placeholder="Enter class and section" id="sib1_cls_sec" name="sib1_cls_sec"  maxlength="50" value="<?php if(!empty($student[0]->sib1_cls_sec)) { echo $student[0]->sib1_cls_sec; } ?>">
                                  </div>
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                              <div class="col-md-6">
                             <div class="form-group">
                                  <div class="input-field">
                               <input class="form-control" type="text" placeholder="Enter name" id="sib2_name" name="sib2_name"  maxlength="70" value="<?php if(!empty($student[0]->sib2_name)) { echo $student[0]->sib2_name; } ?>">
                           </div>
                           </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                        <div class="input-field">
                            <input class="form-control" type="text" placeholder="Enter class and section " id="sib2_cls_sec" name="sib2_cls_sec"  maxlength="50" value="<?php if(!empty($student[0]->sib2_cls_sec)) { echo $student[0]->sib2_cls_sec; } ?>">
                            </div>
                                  </div>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                            <label class="form-control-label"><b>Is your child physically challenged?*</b></label>
                            <select class="form-control" id="phy_clg" name="phy_clg">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Yes" <?php if($student[0]->phy_clg == "Yes"){ echo "SELECTED"; } ?>>Yes</option>
                                <option value="No" <?php if($student[0]->phy_clg == "No"){ echo "SELECTED"; } ?>>No</option>
                            </select>
                            <span id="phy_clg_err" style="color:red;"></span>
                         </div>
                                </div>
                                </div>

                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                            <label class="form-control-label"><b>Child has any special need/learning challenges?*</b></label>
                            <select class="form-control" id="slp_need" name="slp_need">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="Yes" <?php if($student[0]->slp_need == "Yes"){ echo "SELECTED"; } ?>>Yes</option>
                                <option value="No" <?php if($student[0]->slp_need == "No"){ echo "SELECTED"; } ?>>No</option>
                            </select>
                            <span id="slp_need_err" style="color:red;"></span>
                         </div>
                                </div>
                                </div>
                                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                            <?php
                            $class = $_GET['class'];
                            if($student[0]->class =='Montessori I' || $student[0]->class =='Montessori II' || $student[0]->class == 'Montessori III' || $student[0]->class =='PRE-K' ||$student[0]->class =='Kindergarten I' || $student[0]->class =='Kindergarten II' || $student[0]->class =='Grade 1')
                            : ?>
                                 <label class="form-control-label"><b>Aadhar of the Student</b></label>
                            <?php else: ?>
                                <label class="form-control-label"><b>Aadhar of the Student*</b></label>
                            <?php endif; ?>
                            <input class="form-control" type="text" placeholder="XXXX-XXXX-XXXX"  id="aadhar" name="aadhar" value="<?php echo $student[0]->aadhar; ?>" maxlength="14">
                            <span id="aadhar_err" style="color:red;"></span>
                        </div>
                        </div>
                        </div>

                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                            <label class="form-control-label"><b>Mode of transport*</b></label>
                            <select class="form-control" id="transport" name="transport">
                                <option disabled selected value="">--SELECT--</option>
                                <option value="School Bus"<?php if($student[0]->transport == "School Bus"){ echo "SELECTED"; } ?>>School Bus</option>
                                <option value="Private"<?php if($student[0]->transport == "Private"){ echo "SELECTED"; } ?>>Private</option>
                            </select>
                            <span id="transport_err" style="color:red;"></span>
                        </div>
                        </div>
                        </div>
                        </div>

                        <input type="hidden" id="page_type" name="page_type" value="<?php echo $_GET['class']; ?>">
                        <input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">
                        <br> 
                        <button type="button" class="btn btn-submit btn-primary float-right">
                         <b>Save and Continue</b>
                         <span class="btn-icon">
                          <i class="uil uil-navigator icon"></i>
                         </span>
                         </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function preview() {
   blah.src=URL.createObjectURL(event.target.files[0]);
}
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
 </script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            let class_name = document.getElementById("class_old").value;

            if(class_name == "Grade 1" || class_name == "Grade 2" || class_name == "Grade 3" || class_name == "Grade 4")
            {
                
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                           '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '</select>'+
                                '<span id="sec_language_err" style="color:red;"></span>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                                '<label class="form-control-label"><b>Third Language*</b></label>'+
                                '<select class="form-control" id="third_language" name="third_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '</select>'+
                                '<span id="third_language_err" style="color:red;"></span>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '</div>';

                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";
                
                $('#language1234').append(row);

                let sec_lan_old = document.getElementById("sec_lan_old").value;
                let trd_lan_old = document.getElementById("trd_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;
                document.getElementById('third_language').value = trd_lan_old;
            }
            else if(class_name == "Grade 6" || class_name == "Grade 5" || class_name == "Grade 7" || class_name == "Grade 8")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                            '<label class="form-control-label"><b>Third Language*</b></label>'+
                            '<select class="form-control" id="third_language" name="third_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '<option value="Sanskrit">Sanskrit</option>'+
                            '</select>'+
                            '<span id="third_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language56').append(row);

                let sec_lan_old = document.getElementById("sec_lan_old").value;
                let trd_lan_old = document.getElementById("trd_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;
                document.getElementById('third_language').value = trd_lan_old;

            }
            else if(class_name == "Grade 9")
            {
                var row =  '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi" >Hindi</option>'+
                                '<option value="Sanskrit" >Sanskrit</option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                        '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                                 '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language9').append(row);
                let sec_lan_old = document.getElementById("sec_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;

            }
            else if(class_name == "Grade 11")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                        '<label class="form-control-label"><b>Please Select the choice of Stream (Compulsary Language:English)*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="PCMB" >Physics, Chemistry, Mathematics, Biology</option>'+
                                '<option value="PCMCs">Physics, Chemistry, Mathematics, Computer Science</option>'+
                                '<option value="PCME" >Physics, Chemistry, Mathematics, Economics</option>'+
                                '<option value="PCMPe" >Physics, Chemistry, Mathematics, Physical Education</option>'+
                                '<option value="PCBPe" >Physics, Chemistry, Biology, Physical Education</option>'+
                                '<option value="PCBIp" >Physics, Chemistry, Informatics Practices, Biology</option>'+
                                '<option value="EABsM" >Economics, Accountancy, Business Studies, Applied Mathematics </option>'+
                                '<option value="EABsPe" >Economics, Accountancy, Business Studies, Physical Education </option>'+
                                '<option value="EABsIP" >Economics, Applied Mathematics, Business Studies, Informatics Practice </option>'+
                                '<option value="HPEPe" >History, Political Science, Economics, Physical Education </option>'+
                                '<option value="HPEM" >History, Political Science, Economics, Applied Mathematics </option>'+
                                '<option value="HPEIp" >History, Political Science, Economics, Informatic Practices  </option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                        '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                             '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language11').append(row);
                let sec_lan_old = document.getElementById("sec_lan_old").value;
            document.getElementById('sec_language').value = sec_lan_old;
            }
            else if(class_name == "Montessori I"||class_name == "Montessori II"||class_name == "Montessori III"||class_name == "PRE-K"||class_name == "Kindergarten I"||class_name == "Kindergarten II")
            {
                var row =  '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<input type="hidden" id="sec_language" name="sec_language" value=" ">'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                            '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";

                $('#language_mont').append(row);

            }

            
            let sibling_change = document.getElementById("sibling_change_old").value;
            if(sibling_change == "Yes")
            {
                $('div.siblings').removeAttr('hidden');
            }
            else if(sibling_change == "No")
            {
                $('div.siblings').attr('hidden', 'hidden');
            }
        });
        $('#class').on('change', function() {
            let class_name = $(this).val();
            document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";
            if(class_name == "Grade 1" || class_name == "Grade 2" || class_name == "Grade 3" || class_name == "Grade 4")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '</select>'+
                                '<span id="sec_language_err" style="color:red;"></span>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                                '<label class="form-control-label"><b>Third Language*</b></label>'+
                                '<select class="form-control" id="third_language" name="third_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '</select>'+
                                '<span id="third_language_err" style="color:red;"></span>'+
                                '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';

                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";
                
                $('#language1234').append(row);

                let sec_lan_old = document.getElementById("sec_lan_old").value;
                let trd_lan_old = document.getElementById("trd_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;
                document.getElementById('third_language').value = trd_lan_old;
            }
            else if(class_name == "Grade 6" || class_name == "Grade 5" || class_name == "Grade 7" || class_name == "Grade 8")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                            '<label class="form-control-label"><b>Third Language*</b></label>'+
                            '<select class="form-control" id="third_language" name="third_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi">Hindi</option>'+
                                '<option value="Kannada">Kannada</option>'+
                                '<option value="Sanskrit">Sanskrit</option>'+
                            '</select>'+
                            '<span id="third_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language56').append(row);

                let sec_lan_old = document.getElementById("sec_lan_old").value;
                let trd_lan_old = document.getElementById("trd_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;
                document.getElementById('third_language').value = trd_lan_old;

            }
            else if(class_name == "Grade 9")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Second Language*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="Hindi" >Hindi</option>'+
                                '<option value="Sanskrit" >Sanskrit</option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                        '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                        '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language11").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language9').append(row);
                let sec_lan_old = document.getElementById("sec_lan_old").value;
                document.getElementById('sec_language').value = sec_lan_old;

            }
            else if(class_name == "Grade 11")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<label class="form-control-label"><b>Please Select the choice of Stream (Compulsary Language:English)*</b></label>'+
                            '<select class="form-control" id="sec_language" name="sec_language">'+
                                '<option disabled selected value="">--SELECT--</option>'+
                                '<option value="PCMB" >Physics, Chemistry, Mathematics, Biology</option>'+
                                '<option value="PCMCs">Physics, Chemistry, Mathematics, Computer Science</option>'+
                                '<option value="PCME" >Physics, Chemistry, Mathematics, Economics</option>'+
                                '<option value="PCMPe" >Physics, Chemistry, Mathematics, Physical Education</option>'+
                                '<option value="PCBPe" >Physics, Chemistry, Biology, Physical Education</option>'+
                                '<option value="PCBIp" >Physics, Chemistry, Informatics Practices, Biology</option>'+
                                '<option value="EABsM" >Economics, Accountancy, Business Studies, Applied Mathematics </option>'+
                                '<option value="EABsIP" >Economics, Accountancy, Business Studies, Informatics Practices </option>'+
                                '<option value="EABsPe" >Economics, Accountancy, Business Studies, Physical Education </option>'+
                                '<option value="HPEPe" >History, Political Science, Economics, Physical Education </option>'+
                                '<option value="HPEM" >History, Political Science, Economics, Applied Mathematics </option>'+
                                '<option value="HPEIp" >History , Political Science, Economics, Informatic Practices  </option>'+
                            '</select>'+
                            '<span id="sec_language_err" style="color:red;"></span>'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                        '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                        '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language_mont").innerHTML = "";

                $('#language11').append(row);
                let sec_lan_old = document.getElementById("sec_lan_old").value;
            document.getElementById('sec_language').value = sec_lan_old;
            }
            else if(class_name == "Montessori I"||class_name == "Montessori II"||class_name == "Montessori III"||class_name == "PRE-K"||class_name == "Kindergarten I"||class_name == "Kindergarten II")
            {
                var row = '<div class="row">'+
                            '<div class="col-md-6">'+
                            '<div class="form-group">'+
                        '<div class="input-field">'+
                            '<input type="hidden" id="sec_language" name="sec_language" value=" ">'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                '<div class="col-md-6">'+
                                 '<div class="form-group">'+
                                '<div class="input-field">'+
                            '<input type="hidden" id="third_language" name="third_language" value=" ">'+
                            '</div>'+
                                '</div>'+
                                '</div>'+
                                 '</div>';
                     document.getElementById("language1234").innerHTML = "";
                document.getElementById("language56").innerHTML = "";
                document.getElementById("language9").innerHTML = "";
                document.getElementById("language11").innerHTML = "";

                $('#language_mont').append(row);

            }

        });

        $('#name').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("name_err").innerHTML = "";
            } else {
                document.getElementById("name_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#birth_place').on('change', function() {
            if (/^[a-zA-Z ]*$/g.test($(this).val())) {
                document.getElementById("birth_place_err").innerHTML = "";
            } else {
                document.getElementById("birth_place_err").innerHTML = "Only alphabets are allowed";
            }
        });

        $('#sibling_change').change(function(){
            let sibling_change = $(this).val();
            if(sibling_change == "Yes")
            {
                $('div.siblings').removeAttr('hidden');
            }
            else if(sibling_change == "No")
            {
                $('div.siblings').attr('hidden', 'hidden');
            }
        });

        $('.btn-submit').click(function(){
            let name = document.getElementById("name").value;
            let gender = document.getElementById("gender").value;
            let dob = document.getElementById("dob").value;
            let class_name = document.getElementById("class").value;
            let birth_place = document.getElementById("birth_place").value;
            let nationality = document.getElementById("nationality").value;
            let religion = document.getElementById("religion").value;
            let mother_tongue = document.getElementById("mother_tongue").value;
            let caste = document.getElementById("caste").value;
            let blood_group = document.getElementById("blood_group").value;
            let phy_clg = document.getElementById("phy_clg").value;
            let slp_need = document.getElementById("slp_need").value;
            let aadhar = document.getElementById("aadhar").value;

           
            if(class_name == "PRE-K" || class_name == "Montessori I" || class_name == "Montessori II"|| class_name == "Montessori III"|| class_name == "Kindergarten I"|| class_name == "Kindergarten II" || class_name == "Grade 1"){
                var aadhar1 = "2234 1234 1234";
                // alert("1");
            }
            else {
                var aadhar1 = document.getElementById("aadhar").value;
                // alert("2");

            }

            let transport = document.getElementById("transport").value;
            let sibling_change = document.getElementById("sibling_change").value;

             if(!name || !/^[a-zA-Z ]*$/g.test(name) || !gender || !dob || !class_name || !birth_place || !/^[a-zA-Z ]*$/g.test(birth_place) || !nationality || !religion || !mother_tongue || !caste || !blood_group || !phy_clg || !slp_need || !aadhar1 || !transport || !sibling_change)
                {
                    if(!name)
                    {
                        document.getElementById("name_err").innerHTML = "This is Required Field";
                    }
                    else if(!/^[a-zA-Z ]*$/g.test(name))
                    {
                        document.getElementById("name_err").innerHTML = "Only alphabets are allowed";
                    }
                    else
                    {
                        document.getElementById("name_err").innerHTML = "";
                    }

                    if(!gender)
                    {
                        document.getElementById("gender_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("gender_err").innerHTML = "";
                    }

                    if(!dob)
                    {
                        document.getElementById("dob_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("dob_err").innerHTML = "";
                    }

                    if(!class_name)
                    {
                        document.getElementById("class_name_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("class_name_err").innerHTML = "";
                    }

                    if(!birth_place)
                    {
                        document.getElementById("birth_place_err").innerHTML = "This is Required Field";
                    }
                    else if(!/^[a-zA-Z ]*$/g.test(birth_place))
                    {
                        document.getElementById("birth_place_err").innerHTML = "Only alphabets are Allowed";
                    }
                    else
                    {
                        document.getElementById("birth_place_err").innerHTML = "";
                    }

                    if(!nationality)
                    {
                        document.getElementById("nationality_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("nationality_err").innerHTML = "";
                    }
                    
                    if(!religion)
                    {
                        document.getElementById("religion_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("religion_err").innerHTML = "";
                    }

                    if(!mother_tongue)
                    {
                        document.getElementById("mother_tongue_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("mother_tongue_err").innerHTML = "";
                    }

                    if(!caste)
                    {
                        document.getElementById("caste_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("caste_err").innerHTML = "";
                    }

                    if(!blood_group)
                    {
                        document.getElementById("blood_group_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("blood_group_err").innerHTML = "";
                    }

                    if(!phy_clg)
                    {
                        document.getElementById("phy_clg_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("phy_clg_err").innerHTML = "";
                    }

                    if(!slp_need)
                    {
                        document.getElementById("slp_need_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("slp_need_err").innerHTML = "";
                    }

                    if(!aadhar1)
                    {
                        document.getElementById("aadhar_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        // alert("3");
                        document.getElementById("aadhar_err").innerHTML = "";
                    }

                    if(!transport)
                    {
                        document.getElementById("transport_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("transport_err").innerHTML = "";
                    }

                    if(!sibling_change)
                    {
                       
                        document.getElementById("sibling_change_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("sibling_change_err").innerHTML = "";
                    }
                }

                else if(!/^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/.test(aadhar1))   
                {
                    document.getElementById("aadhar_err").innerHTML = "Aadhar Format is Incorrect e.g.,XXXX XXXX XXXX";
                }
                else if(!document.getElementById("sec_language").value){
                    document.getElementById("sec_language_err").innerHTML = "This is Required Field";
                }
                else if(!document.getElementById("third_language").value){
                    document.getElementById("third_language_err").innerHTML = "This is Required Field";
                }
                else
                {
                    document.getElementById("aadhar_err").innerHTML =" ";
                    document.getElementById("myForm").submit();
                }

                // let sec_language = document.getElementById("sec_language").value;
                // let third_language = document.getElementById("third_language").value;
                // if(!sec_language)
                //     {
                       
                //         document.getElementById("sec_language_err").innerHTML = "This is Required Field";
                //     }
                //     else
                //     {
                //         document.getElementById("sec_language_err").innerHTML = "";
                //     }

                //     if(!third_language)
                //     {
                       
                //         document.getElementById("third_language_err").innerHTML = "This is Required Field";
                //     }
                //     else
                //     {
                //         document.getElementById("third_language_err").innerHTML = "";
                //     }

        });
    </script>

    <script>
        document.getElementById('language1234').addEventListener('change', function() {
        var secLanguageSelect = document.getElementById('sec_language');
        var thirdLanguageSelect = document.getElementById('third_language');
        var selectedValue = secLanguageSelect.value;

            for (var i = 0; i < thirdLanguageSelect.options.length; i++) {
                var option = thirdLanguageSelect.options[i];
                if (option.value === selectedValue) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            }
        });

        document.getElementById('language56').addEventListener('change', function() {
        var secLanguageSelect = document.getElementById('sec_language');
        var thirdLanguageSelect = document.getElementById('third_language');
        var selectedValue = secLanguageSelect.value;

            for (var i = 0; i < thirdLanguageSelect.options.length; i++) {
                var option = thirdLanguageSelect.options[i];
                if (option.value === selectedValue) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            }
        });
    </script>

</body>
@include('footer')

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

    .icon {
        font-size: 20px;
    }
}
</style>
