<html lang="en">
@include('header')

<body style="background-color: #f8f9fa; font-family: Arial, sans-serif;">
<div style="max-width: 1200px; margin: 0 auto; padding: 2px;">
    <div class="container-fluid py-4">
        <div class="card">
        <section class="step-wizard" style="d-flex justify-content-center align-items-center">
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
            <div class="circle active">
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
                <form id="myForm" action="{{ url('storeImage') }}" method="POST" enctype="multipart/form-data">
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
                   
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center pt-2 pb-4">
            <div class="upload-header"><h2>Upload Documents</h2></div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12 text-center pt-2 pb-4">
            <span style="float: left;">NOTE: Only .jpeg, .png, .jpg, .pdf documents can be uploaded & size of image / pdf should be less than 2MB</span>
        </div>
</div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <div class="input-field">
                            <?php 
                            $id = $_GET['appli_id'];
                            $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                            ?>
                            <label class="form-control-label"><b>Upload Student's Aadhar card * :</b></label>
                            <input class="form-control" type="file" id="Student_Aadhar_card" name="file" accept=".jpg, .jpeg, .png, .pdf" onchange="preview()" value="{{ $student[0]->student_adr }}">

                   @if($student[0]->student_adr) 
                        @php
                        $fileExtension = pathinfo($student[0]->student_adr)['extension'];
                        @endphp

                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                <img id="blah" src="{{ asset('public/' . $student[0]->student_adr) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                         @elseif ($fileExtension === 'pdf')
                         <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
                         <iframe id="pdfPreview" src="{{ asset('public/' . $student[0]->student_adr) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
                         @endif
                 @else
                 <img id="blah"  alt="Your Image" style="width:150px; height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                @endif
                <span id="Student_Aadhar_card_err" style="color:red;"></span>
                             </div>
                            </div>
                        </div>
                        
    <div class="col-md-6">
    <div class="form-group">
        <label class="form-control-label" style="font-weight: bold;">Upload Student's photograph * :</label>
        <span style="float: center;">(Only .jpeg, .png, .jpg can be uploaded)</span>
        <input class="form-control" type="file" id="std_image" name="file6" accept=".jpg, .jpeg, .png, .pdf" onchange="preview6()" value="{{ $student[0]->std_image }}">
         @if($student[0]->std_image)
                         @php
                        $fileExtension = pathinfo($student[0]->std_image)['extension'];
                        @endphp

            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
            <img id="blah6" src="{{ asset('public/' . $student[0]->std_image) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
            @elseif ($fileExtension === 'pdf')
            <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
            <iframe id="pdfPreview6" src="{{ asset('public/' . $student[0]->std_image) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
            @endif
         @else
         <img id="blah6"  alt="Your Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
         @endif
        <span id="std_image_err" style="color:red;"></span>
    </div>
</div>
</div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                <label  class="form-control-label" ><b>Upload Father's Aadhar card * :</b></label>
                   
                    <input class="form-control" type="file" id="Fathers_Aadhar_card" name="file1" accept=".jpg, .jpeg, .png, .pdf" onchange="preview1()" value="{{ $student[0]->father_aadhar }}">
         @if($student[0]->father_aadhar)
                         @php
                        $fileExtension = pathinfo($student[0]->father_aadhar)['extension'];
                        @endphp

            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah1" src="{{ asset('public/' . $student[0]->father_aadhar) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
            @elseif ($fileExtension === 'pdf')
            <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
            <iframe id="pdfPreview1" src="{{ asset('public/' . $student[0]->father_aadhar) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
            @endif
         @else
                    <img id="blah1"  alt="Your Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
         @endif
                    <span id="Fathers_Aadhar_card_err" style="color:red;"></span>
                </div>   
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                <label class="form-control-label"><b> Birth Certificate Of Student * :</b></label>
               
                <input class="form-control" type="file" id="Birth_Certificate_Of_Student" name="file2" accept=".jpg, .jpeg, .png, .pdf" onchange="preview2()" value="{{ $student[0]->birth_cer }}">
         @if($student[0]->birth_cer)
                         @php
                        $fileExtension = pathinfo($student[0]->birth_cer)['extension'];
                        @endphp

        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah2" src="{{ asset('public/' . $student[0]->birth_cer) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
            @elseif ($fileExtension === 'pdf')
            <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
            <iframe id="pdfPreview2" src="{{ asset('public/' . $student[0]->birth_cer) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
            @endif
        @else
        <img id="blah2" alt="Your Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
        @endif
                        <span id="Birth_Certificate_Of_Student_err" style="color:red;"></span>  
                </div>
                </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                <label class="form-control-label"><b>Upload Mother's Aadhar card* : </b></label>
             
                <input class="form-control" type="file" id="Mothers_Aadhar_card" name="file3" accept=".jpg, .jpeg, .png, .pdf" onchange="preview3()" value="{{ $student[0]->mother_aadhar }}">
                @if($student[0]->mother_aadhar)
                         @php
                        $fileExtension = pathinfo($student[0]->birth_cer)['extension'];
                        @endphp

                     @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                        <img id="blah3" src="{{ asset('public/' . $student[0]->mother_aadhar) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
                        <iframe id="pdfPreview3" src="{{ asset('public/' . $student[0]->mother_aadhar) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
                    @endif
                @else
                        <img id="blah3" alt="Your Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                        @endif
                        <span id="Mothers_Aadhar_card_err" style="color:red;"></span>
                        </div>
                        </div>
                        </div>

                        <?php
                $class = $_GET['class'];
                if($student[0]->class =='Montessori I' || $student[0]->class =='Montessori II' || $student[0]->class == 'Montessori III' || $student[0]->class =='PRE-K' ||$student[0]->class =='Kindergarten I' || $student[0]->class =='Kindergarten II' || $student[0]->class =='Grade 1')
                {
                ?>
                <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                <label class="form-control-label"><b>Upload Immunization card of the student*:</b> </label>
                         
                <input class="form-control" type="file" id="immunization_card" name="file4" accept=".jpg, .jpeg, .png, .pdf" onchange="preview4()" value="{{ $student[0]->immunization_card }}">
                @if($student[0]->immunization_card)
                         @php
                        $fileExtension = pathinfo($student[0]->immunization_card)['extension'];
                        @endphp

                     @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                            <img id="blah4" src="{{ asset('public/'.$student[0]->immunization_card) }}" alt="Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                    @elseif ($fileExtension === 'pdf')
                        <!-- <i class="fa fa-file-pdf-o"></i> PDF Document -->
                        <iframe id="pdfPreview4" src="{{ asset('public/' . $student[0]->immunization_card) }}" style="width:150px; height:200px; margin-left:100px;" class="fa fa-file-pdf-o"></iframe>
                    @endif
                            @else
                            <img id="blah4" alt="Your Image" style="width:150px;height:200px; margin-left:150px;" class="img-fluid img-thumbnail">
                             @endif
                            <span id="immunization_card_err" style="color:red;"></span>
                </div>
                </div>
                </div>
               

                <?php
                }
                ?>
                
                        <div class="col-md-6">
                <div class="form-group">
                <div class="input-field">
                </div>
                        </div>
                        </div>
                        </div>          
<br></br>

                <?php 
                if($student[0]->class =='Grade 2' || $student[0]->class == 'Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8' || $student[0]->class =='Grade 9' || $student[0]->class =='Grade 11')
                {
                    $users_id = DB::select("SELECT MAX(rec_id) AS rec_id FROM `old_school` WHERE `appli_id` = '$id'");
                    $users = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id'");
                    if(!empty($users))
                    {
                        ?>
            <?php
              $academic = $student[0]->academic_year;
              $acad_yr = explode('-',$academic);
              $acad_yr_1_1 = $acad_yr[0] - 1;
              $acad_yr_1_2 = $acad_yr[1] - 1;

              $acad_yr_2_1 = $acad_yr[0] - 2;
              $acad_yr_2_2 = $acad_yr[1] - 2;

              $acad_yr_3_1 = $acad_yr[0] - 3;
              $acad_yr_3_2 = $acad_yr[1] - 3;

              $academic_1 = $acad_yr_1_1."-".$acad_yr_1_2;
              $academic_2 = $acad_yr_2_1."-".$acad_yr_2_2;
              $academic_3 = $acad_yr_3_1."-".$acad_yr_3_2;

            ?>
            <center> <header><b><u><h3>Details of Schooling</h3></u></b></header></center>
            <div class="col-md-2 ml-auto">
        <button id="btn" type="button" class="btn btn-outline-primary add-row form-control" <?php if($users_id[0]->rec_id > 2){ echo "disabled";} ?>>Add</button>

        <input type="hidden" id="old_school_value" name="old_school_value" value="<?php echo $users_id[0]->rec_id - 1; ?>">
    </div>
                <br>
       <?php 
        if($users_id[0]->rec_id == "3")
        {
            $rec_1 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '1'");
            $rec_2 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '2'");
            $rec_3 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '3'");
        }
        elseif($users_id[0]->rec_id == "2")
        {
            $rec_1 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '1'");
            $rec_2 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '2'");
        }
        else
        {
            $rec_1 = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' AND `rec_id` = '1'");
        }
       ?>
    <div class="row">
        <div class="col-md-3"> <b>Academic Year
            <?php echo $rec_1[0]->academic_year; ?></b>
            <input type="hidden" id="academic_1" name="academic_1" value="<?php echo $rec_1[0]->academic_year; ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name* <br>
                <input type="text"  class="form-control" name="school_name_1"  id="school_name_1" placeholder="School Name"  maxlength="100" value="<?php echo $rec_1[0]->school_name; ?>" required>
                <span id="school_name_1_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class*   <br>
                <input type="text" name="class_1" class="form-control" id="class_1" placeholder="Class"  maxlength="50" value="<?php echo $rec_1[0]->old_class; ?>" required>
                <span id="class_1_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board* <br>
                <select class="form-control" name="board_1" id="board_1" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE" <?php if($rec_1[0]->board == "ICSE"){ echo "SELECTED";} ?>>ICSE</option>
                    <option value="CBSE" <?php if($rec_1[0]->board == "CBSE"){ echo "SELECTED";} ?>>CBSE</option>
                    <option value="STATE" <?php if($rec_1[0]->board == "STATE"){ echo "SELECTED";} ?>>STATE</option>
                    </select>
                <span id="board_1_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_1" id="lang2_name_1">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada" <?php if($rec_1[0]->lang2_name == "Kannada"){ echo "SELECTED";} ?>>Kannada</option>
                        <option value="Hindi" <?php if($rec_1[0]->lang2_name == "Hindi"){ echo "SELECTED";} ?>>Hindi</option>
                        <option value="Sanskrit" <?php if($rec_1[0]->lang2_name == "Sanskrit"){ echo "SELECTED";} ?>>Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_1_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Mid term Examination:</b> </div>
            </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade* <br>  
                    <input type="text"  class="form-control" name="eng_marks_1" id="eng_marks_1" placeholder="English Percentage/Grade"  maxlength="50" value="<?php echo $rec_1[0]->eng_marks; ?>">
                    <span id="eng_marks_1_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade* <br>
                    <input type="text"  class="form-control" name="math_marks_1" id="math_marks_1" placeholder="Maths Percentage/Grade"  maxlength="50" value="<?php echo $rec_1[0]->math_marks; ?>"> 
                    <span id="math_marks_1_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade*  <br>
                    <input type="text"  class="form-control" name="science_marks_1" id="science_marks_1" placeholder="Science Percentage/Grade"  maxlength="50" value="<?php echo $rec_1[0]->science_marks; ?>">
                    <span id="science_marks_1_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_1" id="lang2_marks_1" placeholder="Language II Percentage/Grade"  maxlength="50" value="<?php echo $rec_1[0]->lang2_marks; ?>">
                    <!-- <span id="lang2_marks_1_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet*  <br>
                    <input type="file" class="form-control" name="marksheet_1" id="marksheet_1" placeholder="Upload Marksheet">
                    <span id="marksheet_1_err" style="color:red;"></span>
                    </div>
                    </div>
                    </div>
                    
                    <div class="school_1" <?php if($users_id[0]->rec_id > 1){ echo "";}else {echo "hidden";} ?>>
                    <hr>
                    <div class="row">
        <div class="col-md-3"> <b>Academic Year
        <?php if(!empty($rec_2)){ echo $rec_2[0]->academic_year; }else{ echo $academic_2;} ?></b>
            <input type="hidden" id="academic_2" name="academic_2" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->academic_year; }else{ echo $academic_2;} ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name <br>
                <input type="text"  class="form-control" name="school_name_2"  id="school_name_2" placeholder="School Name"  maxlength="100" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->school_name; } ?>" required>
                <span id="school_name_2_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class   <br>
                <input type="text" name="class_2" class="form-control" id="class_2" placeholder="Class"  maxlength="50" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->old_class; } ?>" required>
                <span id="class_2_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board  <br>
                <select class="form-control" name="board_2" id="board_2" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE" <?php if(!empty($rec_2)){  if($rec_2[0]->board == "ICSE"){ echo "SELECTED";}} ?>>ICSE</option>
                    <option value="CBSE" <?php if(!empty($rec_2)){  if($rec_2[0]->board == "CBSE"){ echo "SELECTED";}} ?>>CBSE</option>
                    <option value="STATE" <?php if(!empty($rec_2)){  if($rec_2[0]->board == "STATE"){ echo "SELECTED";}} ?>>STATE</option>
                    </select>
                <span id="board_2_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_2" id="lang2_name_2">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada" <?php if(!empty($rec_2)){  if($rec_2[0]->lang2_name == "Kannada"){ echo "SELECTED";}} ?>>Kannada</option>
                        <option value="Hindi" <?php if(!empty($rec_2)){  if($rec_2[0]->lang2_name == "Hindi"){ echo "SELECTED";}} ?>>Hindi</option>
                        <option value="Sanskrit" <?php if(!empty($rec_2)){  if($rec_2[0]->lang2_name == "Sanskrit"){ echo "SELECTED";}} ?>>Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_2_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Final term Examination</b></div>
            </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade <br>  
                    <input type="text"  class="form-control" name="eng_marks_2" id="eng_marks_2" placeholder="English Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->eng_marks; } ?>">
                    <span id="eng_marks_2_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade <br>
                    <input type="text"  class="form-control" name="math_marks_2" id="math_marks_2" placeholder="Maths Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->math_marks; } ?>"> 
                    <span id="math_marks_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade  <br>
                    <input type="text"  class="form-control" name="science_marks_2" id="science_marks_2" placeholder="Science Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->science_marks; } ?>">
                    <span id="science_marks_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_2" id="lang2_marks_2" placeholder="Language II Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_2)){ echo $rec_2[0]->lang2_marks; } ?>">
                    <!-- <span id="lang2_marks_2_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet  <br>
                    <input type="file" class="form-control" name="marksheet_2" id="marksheet_2" placeholder="Upload Marksheet">
                    <span id="marksheet_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                        <button id="btn_1" type="button" class="btn btn-outline-primary remove-row-1 form-control" <?php if($users_id[0]->rec_id > 2){ echo "disabled";} ?>>Remove</button>
                    </div>

                    </div>
                    </div>

                    <div class="school_2"  <?php if($users_id[0]->rec_id > 2){ echo "";}else {echo "hidden";} ?>>
                    <hr>
                    <div class="row">
        <div class="col-md-3"> <b>Academic Year
        <?php if(!empty($rec_3)){ echo $rec_3[0]->academic_year; }else{ echo $academic_3;} ?></b>
            <input type="hidden" id="academic_3" name="academic_3" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->academic_year; }else{ echo $academic_3;} ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name <br>
                <input type="text"  class="form-control" name="school_name_3"  id="school_name_3" placeholder="School Name"  maxlength="100" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->school_name; } ?>" required>
                <span id="school_name_3_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class   <br>
                <input type="text" name="class_3" class="form-control" id="class_3" placeholder="Class"  maxlength="50" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->old_class; } ?>" required>
                <span id="class_3_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board  <br>
                <select class="form-control" name="board_3" id="board_3" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE" <?php if(!empty($rec_3)){  if($rec_3[0]->board == "ICSE"){ echo "SELECTED";}} ?>>ICSE</option>
                    <option value="CBSE" <?php if(!empty($rec_3)){  if($rec_3[0]->board == "CBSE"){ echo "SELECTED";}} ?>>CBSE</option>
                    <option value="STATE" <?php if(!empty($rec_3)){  if($rec_3[0]->board == "STATE"){ echo "SELECTED";}} ?>>STATE</option>
                    </select>
                <span id="board_3_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_3" id="lang2_name_3">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada" <?php if(!empty($rec_3)){  if($rec_3[0]->lang2_name == "Kannada"){ echo "SELECTED";}} ?>>Kannada</option>
                        <option value="Hindi" <?php if(!empty($rec_3)){  if($rec_3[0]->lang2_name == "Hindi"){ echo "SELECTED";}} ?>>Hindi</option>
                        <option value="Sanskrit" <?php if(!empty($rec_3)){  if($rec_3[0]->lang2_name == "Sanskrit"){ echo "SELECTED";}} ?>>Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_3_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Final term Examination</b></div>
            </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade <br>  
                    <input type="text"  class="form-control" name="eng_marks_3" id="eng_marks_3" placeholder="English Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->eng_marks; } ?>">
                    <span id="eng_marks_3_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade <br>
                    <input type="text"  class="form-control" name="math_marks_3" id="math_marks_3" placeholder="Maths Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->math_marks; } ?>"> 
                    <span id="math_marks_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade  <br>
                    <input type="text"  class="form-control" name="science_marks_3" id="science_marks_3" placeholder="Science Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->science_marks; } ?>">
                    <span id="science_marks_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_3" id="lang2_marks_3" placeholder="Language II Percentage/Grade"  maxlength="50" value="<?php if(!empty($rec_3)){ echo $rec_3[0]->lang2_marks; } ?>">
                    <!-- <span id="lang2_marks_3_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet  <br>
                    <input type="file" class="form-control" name="marksheet_3" id="marksheet_3" placeholder="Upload Marksheet">
                    <span id="marksheet_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                        <button id="btn_2" type="button" class="btn btn-outline-primary remove-row-2 form-control">Remove</button>
                    </div>

                    </div>
                    </div>
                <?php      
                }
                else
                {
                ?>
             <?php
              $academic = $student[0]->academic_year;
              $acad_yr = explode('-',$academic);
              $acad_yr_1_1 = $acad_yr[0] - 1;
              $acad_yr_1_2 = $acad_yr[1] - 1;

              $acad_yr_2_1 = $acad_yr[0] - 2;
              $acad_yr_2_2 = $acad_yr[1] - 2;

              $acad_yr_3_1 = $acad_yr[0] - 3;
              $acad_yr_3_2 = $acad_yr[1] - 3;

              $academic_1 = $acad_yr_1_1."-".$acad_yr_1_2;
              $academic_2 = $acad_yr_2_1."-".$acad_yr_2_2;
              $academic_3 = $acad_yr_3_1."-".$acad_yr_3_2;
              ?>
                <center> <header><b><u><h3>Details of Schooling</h3></u></b></header></center>
                <div class="col-md-2 ml-auto">
        <button id="btn" type="button" class="btn btn-outline-primary add-row form-control">Add</button>
        <input type="hidden" id="old_school_value" name="old_school_value" value="0">
    </div>
                <br>
       
    <div class="row">
        <div class="col-md-3"> <b>Academic Year
            <?php echo $academic_2; ?></b>
            <input type="hidden" id="academic_1" name="academic_1" value="<?php echo $academic_2; ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name* <br>
                <input type="text"  class="form-control" name="school_name_1"  maxlength="100" id="school_name_1" placeholder="School Name" required>
                <span id="school_name_1_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class*   <br>
                <input type="text" name="class_1" class="form-control" id="class_1"  maxlength="50" placeholder="Class" required>
                <span id="class_1_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board*  <br>
                <select class="form-control" name="board_1" id="board_1" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE">ICSE</option>
                    <option value="CBSE">CBSE</option>
                    <option value="STATE">STATE</option>
                    </select>
                <span id="board_1_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_1" id="lang2_name_1">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_1_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Mid term Examination:</b> </div>
            </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade* <br>  
                    <input type="text"  class="form-control" name="eng_marks_1" id="eng_marks_1"  maxlength="50" placeholder="English Percentage/Grade" >
                    <span id="eng_marks_1_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade* <br>
                    <input type="text"  class="form-control" name="math_marks_1" id="math_marks_1"  maxlength="50" placeholder="Maths Percentage/Grade"> 
                    <span id="math_marks_1_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade*  <br>
                    <input type="text"  class="form-control" name="science_marks_1"  maxlength="50" id="science_marks_1" placeholder="Science Percentage/Grade">
                    <span id="science_marks_1_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_1" id="lang2_marks_1"  maxlength="50" placeholder="Language II Percentage/Grade">
                    <!-- <span id="lang2_marks_1_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet*  <br>
                    <input type="file" class="form-control" name="marksheet_1" id="marksheet_1" placeholder="Upload Marksheet">
                    <span id="marksheet_1_err" style="color:red;"></span>
                    </div>
                    </div>
                    </div>
                    
                    <div class="school_1" hidden>
                    <hr>
                    <div class="row">
        <div class="col-md-3"> <b>Academic Year
            <?php echo $academic_1; ?></b>
            <input type="hidden" id="academic_2" name="academic_2" value="<?php echo $academic_1; ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name <br>
                <input type="text"  class="form-control" name="school_name_2"  id="school_name_2"  maxlength="100" placeholder="School Name" required>
                <span id="school_name_2_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class   <br>
                <input type="text" name="class_2" class="form-control" id="class_2"  maxlength="50" placeholder="Class" required>
                <span id="class_2_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board  <br>
                <select class="form-control" name="board_2" id="board_2" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE">ICSE</option>
                    <option value="CBSE">CBSE</option>
                    <option value="STATE">STATE</option>
                    </select>
                <span id="board_2_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_2" id="lang2_name_2">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_2_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Final term Examination</b></div>
            </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade <br>  
                    <input type="text"  class="form-control" name="eng_marks_2" id="eng_marks_2"  maxlength="50" placeholder="English Percentage/Grade" >
                    <span id="eng_marks_2_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade <br>
                    <input type="text"  class="form-control" name="math_marks_2" id="math_marks_2"  maxlength="50" placeholder="Maths Percentage/Grade"> 
                    <span id="math_marks_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade  <br>
                    <input type="text"  class="form-control" name="science_marks_2"  maxlength="50" id="science_marks_2" placeholder="Science Percentage/Grade">
                    <span id="science_marks_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_2" id="lang2_marks_2"  maxlength="50" placeholder="Language II Percentage/Grade">
                    <!-- <span id="lang2_marks_2_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet  <br>
                    <input type="file" class="form-control" name="marksheet_2" id="marksheet_2" placeholder="Upload Marksheet">
                    <span id="marksheet_2_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                        <button id="btn_1" type="button" class="btn btn-outline-primary remove-row-1 form-control">Remove</button>
                    </div>

                    </div>
                    </div>

                    <div class="school_2" hidden>
                    <hr>
                    <div class="row">
        <div class="col-md-3"> <b>Academic Year
            <?php echo $academic_3; ?></b>
            <input type="hidden" id="academic_3" name="academic_3" value="<?php echo $academic_3; ?>">
            </div>
            </div>
            <br>
    <div class="row">
    <div class="col-md-3">
            <div class="input-field"> School Name <br>
                <input type="text"  class="form-control" name="school_name_3"  id="school_name_3"  maxlength="100" placeholder="School Name" required>
                <span id="school_name_3_err" style="color:red;"></span>
            </div>
            </div>
            <div class="col-md-3">
            <div class="input-field"> Class   <br>
                <input type="text" name="class_3" class="form-control" id="class_3"  maxlength="50" placeholder="Class" required>
                <span id="class_3_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
            <div class="input-field">Board  <br>
                <select class="form-control" name="board_3" id="board_3" >
                    <option value="" SELECTED DISABLED>--SELECT--</option>
                    <option value="ICSE">ICSE</option>
                    <option value="CBSE">CBSE</option>
                    <option value="STATE">STATE</option>
                    </select>
                <span id="board_3_err" style="color:red;"></span>
            </div>
            </div>

            <div class="col-md-3">
                <div class="input-field">Language II Name<br>  
                    <select  class="form-control" name="lang2_name_3" id="lang2_name_3">
                        <option value="" SELECTED DISABLED>--SELECT--</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Sanskrit">Sanskrit</option>
                    </select>
                    <!-- <span id="lang2_name_3_err" style="color:red;"></span> -->
                </div>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col-md-6">
                <div><b>Please Enter the marks secured in Final term Examination</b></div>
            </div>
            </div>
            <br/>

            <div class="row">
                <div class="col-md-3">
                    <div class="input-field">English Percentage/Grade <br>  
                    <input type="text"  class="form-control" name="eng_marks_3" id="eng_marks_3"  maxlength="50" placeholder="English Percentage/Grade" >
                    <span id="eng_marks_3_err" style="color:red;"></span>
                    </div>
                </div>

                    <div class="col-md-3">

                    <div class="input-field">Maths Percentage/Grade <br>
                    <input type="text"  class="form-control" name="math_marks_3" id="math_marks_3"  maxlength="50" placeholder="Maths Percentage/Grade"> 
                    <span id="math_marks_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
            
                    <div class="input-field">Science Percentage/Grade  <br>
                    <input type="text"  class="form-control" name="science_marks_3"  maxlength="50" id="science_marks_3" placeholder="Science Percentage/Grade">
                    <span id="science_marks_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="input-field">Lang II Percentage/Grade<br>
                    <input type="text" class="form-control" name="lang2_marks_3" id="lang2_marks_3"  maxlength="50" placeholder="Language II Percentage/Grade">
                    <!-- <span id="lang2_marks_3_err" style="color:red;"></span> -->
                    </div>
                    </div>
                    </div>

                    <br>

                    <div class="row">
                    <div class="col-md-3">
                    <div class="input-field">Upload Marksheet  <br>
                    <input type="file" class="form-control" name="marksheet_3" id="marksheet_3" placeholder="Upload Marksheet">
                    <span id="marksheet_3_err" style="color:red;"></span>
                    </div>
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                    </div>

                    <div class="col-md-3">
                        <button id="btn_2" type="button" class="btn btn-outline-primary remove-row-2 form-control">Remove</button>
                    </div>

                    </div>
                    </div>
<?php
}
                    }
                    ?>
              </center>
                <input type="hidden" id="page_type" name="page_type" value="<?php echo $_GET['class']; ?>">
                <input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">
                <input type="hidden" id="appli_class" name="appli_class" value="<?php echo $student[0]->class; ?>">
            <br>
            <br>
           
            <div class="col">  
              <div class="form-check">  
               <center> <button class=" btn btn-back btn-primary">Go back</button>
               <button class="btn btn-submit btn-primary">Save & continue</button></center>
             </div>
            </div>

            <input type='hidden' value=<?php echo $acadamic_year->academic_year?> id='acadamic'/>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.querySelector('.add-doc').addEventListener('click', function () {
        document.querySelector('#fileInput').click();
    });

    document.querySelector('#fileInput').addEventListener('change', function () {
        const fileInput = this;
        const selectedFile = fileInput.files[0];

        if (selectedFile) {
            alert('Selected file: ' + selectedFile.name);
        }
    });
</script>
         
<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); 
        var formData = new FormData();
        var imageFile = document.getElementById('Student_Aadhar_card').files[0];
        var imageFile = document.getElementById('Fathers_Aadhar_card').files[1];
        var imageFile = document.getElementById('Birth_Certificate_Of_Student').files[2];
        var imageFile = document.getElementById('Mothers_Aadhar_card').files[3];
        var imageFile = document.getElementById('immunization_card').files[5];
        var imageFile = document.getElementById('std_image').files[6];

    formData.append('image', imageFile);

    axios.post('/upload-image', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    });
});
</script>

<script>
    function preview() {
//    blah.src=URL.createObjectURL(event.target.files[0]);
//    pdfPreview.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('Student_Aadhar_card');
            var imagePreview = document.getElementById('blah');
            var pdfPreview = document.getElementById('pdfPreview');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }

        }
   
    function preview1() {
//    blah1.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('Fathers_Aadhar_card');
            var imagePreview = document.getElementById('blah1');
            var pdfPreview = document.getElementById('pdfPreview1');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }

}

    function preview2() {
//    blah2.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('Birth_Certificate_Of_Student');
            var imagePreview = document.getElementById('blah2');
            var pdfPreview = document.getElementById('pdfPreview2');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }

}

    function preview3() {
//    blah3.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('Mothers_Aadhar_card');
            var imagePreview = document.getElementById('blah3');
            var pdfPreview = document.getElementById('pdfPreview3');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }

}
function preview4() {
//    blah4.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('immunization_card');
            var imagePreview = document.getElementById('blah4');
            var pdfPreview = document.getElementById('pdfPreview4');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }

}

function preview6() {
//    blah6.src=URL.createObjectURL(event.target.files[0]);
var fileInput = document.getElementById('std_image');
            var imagePreview = document.getElementById('blah6');
            var pdfPreview = document.getElementById('pdfPreview6');

            if (fileInput.files && fileInput.files[0]) {
                var file = fileInput.files[0];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    imagePreview.src = URL.createObjectURL(file);
                } else if (fileExtension === 'pdf') {
                    pdfPreview.src = URL.createObjectURL(file);
                } else {
                    alert('Unsupported file type');
                    imagePreview.style.display = 'none';
                    pdfPreview.style.display = 'none';
                }
            } else {
                imagePreview.style.display = 'none';
                pdfPreview.style.display = 'none';
            }
}

      function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result),
                        $('#pdfPreview')
                        .attr('src', e.target.result)     
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1')
                        .attr('src', e.target.result);
                        $('#pdfPreview1')
                        .attr('src', e.target.result) 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                        $('#pdfPreview2')
                        .attr('src', e.target.result) 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah3')
                        .attr('src', e.target.result);
                        $('#pdfPreview3')
                        .attr('src', e.target.result) 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah4')
                        .attr('src', e.target.result);
                        $('#pdfPreview4')
                        .attr('src', e.target.result) 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah6')
                        .attr('src', e.target.result);
                        $('#pdfPreview6')
                        .attr('src', e.target.result) 
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.getElementById('myForm').addEventListener('submit', function(e) {
    e.preventDefault(); 
        var formData = new FormData();
        var imageFile = document.getElementById('Student_Aadhar_card').files[0];
        var imageFile = document.getElementById('Fathers_Aadhar_card').files[1];
        var imageFile = document.getElementById('Birth_Certificate_Of_Student').files[2];
        var imageFile = document.getElementById('Mothers_Aadhar_card').files[3];
        var imageFile = document.getElementById('immunization_card').files[5];
        var imageFile = document.getElementById('std_image').files[6];

    formData.append('image', imageFile);

    axios.post('/upload-image', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    });
});
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $('.btn-back').click(function(){
            let class_name = document.getElementById("page_type").value;
            let appli_id = document.getElementById("appli_id").value;
            window.location.href = "{{ url('parents_details') }}/a?class="+class_name+"&appli_id="+appli_id;
        });

        $('.add-row').click(function(){
            let old_school_value = document.getElementById("old_school_value").value;
            if(old_school_value == "0"){
                $('div.school_1').removeAttr('hidden');
                document.getElementById("old_school_value").value = "1";
            }
            else if(old_school_value == "1"){
                $('div.school_2').removeAttr('hidden');
                document.getElementById("old_school_value").value = "2";
                document.getElementById("btn").disabled = true;
                document.getElementById("btn_1").disabled = true;
            }
        });

        $('.remove-row-1').click(function(){
            $('div.school_1').attr('hidden', 'hidden');
            document.getElementById("old_school_value").value = "0";
        });

        $('.remove-row-2').click(function(){
            $('div.school_2').attr('hidden', 'hidden');
            document.getElementById("old_school_value").value = "1";
            document.getElementById("btn").disabled = false;
            document.getElementById("btn_1").disabled = false;
        });
        
        $('.btn-submit').click(function(){
            let Student_Aadhar_card = document.getElementById("Student_Aadhar_card").value;
            let std_image = document.getElementById("std_image").value;
            let Fathers_Aadhar_card = document.getElementById("Fathers_Aadhar_card").value;
            let Birth_Certificate_Of_Student = document.getElementById("Birth_Certificate_Of_Student").value;
            let Mothers_Aadhar_card = document.getElementById("Mothers_Aadhar_card").value;
            let appli_id = document.getElementById("appli_id").value;
            let appli_class = document.getElementById("appli_class").value;  

            if(appli_class == 'Grade 2' || appli_class =='Grade 3' || appli_class =='Grade 4' || appli_class =='Grade 5' || appli_class == 'Grade 6' || appli_class =='Grade 7' || appli_class =='Grade 8' || appli_class =='Grade 9' || appli_class == 'Grade 11')
            {
            let school_name_1 = document.getElementById("school_name_1").value;
            let class_1 = document.getElementById("class_1").value;
            let board_1 = document.getElementById("board_1").value;
            let lang2_name_1 = document.getElementById("lang2_name_1").value;
            let eng_marks_1 = document.getElementById("eng_marks_1").value;
            let math_marks_1 = document.getElementById("math_marks_1").value;
            let science_marks_1 = document.getElementById("science_marks_1").value;
            let lang2_marks_1 = document.getElementById("lang2_marks_1").value;
            let marksheet_1 = document.getElementById("marksheet_1").value;

                if(!std_image || !Student_Aadhar_card || !Fathers_Aadhar_card || !Birth_Certificate_Of_Student || !Mothers_Aadhar_card ||  !school_name_1 || !class_1 || !board_1 || !eng_marks_1 || !math_marks_1 || !science_marks_1 || !marksheet_1)
                {
                    if(!std_image || !Student_Aadhar_card || !Fathers_Aadhar_card || !Birth_Certificate_Of_Student || !Mothers_Aadhar_card || !marksheet_1)
                    {
                         alert("Kindly Upload the Documents");
                    }
                    if(!Student_Aadhar_card)
                    {
                        document.getElementById("Student_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Student_Aadhar_card_err").innerHTML = " ";
                    }
                    if(!std_image)
                    {
                        document.getElementById("std_image_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("std_image_err").innerHTML = " ";
                    }

                    if(!Fathers_Aadhar_card)
                    {
                        document.getElementById("Fathers_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Fathers_Aadhar_card_err").innerHTML = " ";
                    }

                    if(!Birth_Certificate_Of_Student)
                    {
                        document.getElementById("Birth_Certificate_Of_Student_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Birth_Certificate_Of_Student_err").innerHTML = " ";
                    }

                    if(!Mothers_Aadhar_card)
                    {
                        document.getElementById("Mothers_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Mothers_Aadhar_card_err").innerHTML = " ";
                    }

                    if(!school_name_1)
                    {
                        document.getElementById("school_name_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("school_name_1_err").innerHTML = " ";
                    }

                    if(!class_1)
                    {
                        document.getElementById("class_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("class_1_err").innerHTML = " ";
                    }

                    if(!board_1)
                    {
                        document.getElementById("board_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("board_1_err").innerHTML = " ";
                    }

                    if(!eng_marks_1)
                    {
                        document.getElementById("eng_marks_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("eng_marks_1_err").innerHTML = " ";
                    }

                    if(!math_marks_1)
                    {
                        document.getElementById("math_marks_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("math_marks_1_err").innerHTML = " ";
                    }

                    if(!science_marks_1)
                    {
                        document.getElementById("science_marks_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("science_marks_1_err").innerHTML = " ";
                    }

                    if(!marksheet_1)
                    {
                        document.getElementById("marksheet_1_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("marksheet_1_err").innerHTML = " ";
                    }
                   
                }            

                else
                {
                    document.getElementById("myForm").submit();
                }

            }
            else if(appli_class =='Montessori I' || appli_class == 'PRE-K' || appli_class =='Montessori II' || appli_class == 'Montessori III' || appli_class =='Kindergarten I' || appli_class =='Kindergarten II' || appli_class =='Grade 1')
            {
            let immunization_card = document.getElementById("immunization_card").value;
                if( !std_image || !Student_Aadhar_card || !Fathers_Aadhar_card || !Birth_Certificate_Of_Student || !Mothers_Aadhar_card || !immunization_card)
                {
                    if(!std_image || !Student_Aadhar_card || !Fathers_Aadhar_card || !Birth_Certificate_Of_Student || !Mothers_Aadhar_card || !immunization_card )
                    {
                         alert("Kindly Upload the Documents");
                    }
                    if(!Student_Aadhar_card)
                    {
                        document.getElementById("Student_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Student_Aadhar_card_err").innerHTML = " ";
                    }
                    if(!std_image)
                    {
                        document.getElementById("std_image_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("std_image_err").innerHTML = " ";
                    }

                    if(!Fathers_Aadhar_card)
                    {
                        document.getElementById("Fathers_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Fathers_Aadhar_card_err").innerHTML = " ";
                    }

                    if(!Birth_Certificate_Of_Student)
                    {
                        document.getElementById("Birth_Certificate_Of_Student_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Birth_Certificate_Of_Student_err").innerHTML = " ";
                    }

                    if(!Mothers_Aadhar_card)
                    {
                        document.getElementById("Mothers_Aadhar_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("Mothers_Aadhar_card_err").innerHTML = " ";
                    }
                    if(!immunization_card)
                    {
                        document.getElementById("immunization_card_err").innerHTML = "This is Required Field";
                    }
                    else
                    {
                        document.getElementById("immunization_card_err").innerHTML = " ";
                    }
                   
                }        
                else
                {
                    document.getElementById("myForm").submit();
                }
            }
        });  
    </script>

</body>
@include('footer')

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
}
</style>
