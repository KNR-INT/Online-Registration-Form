<html>
 <head>
 <style>
        .page-break {
            page-break-before: always;
        }
    </style>
 <body style="font-family: Times New Roman, serif;">

                        <?php    
                        if(!empty($appli_id))
                            {
                                $id = $appli_id;
                            }
                            else
                            {
                                $id = $_GET['appli_id'];
                            }
                            $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                            $class = $student[0]->class;
                           
                            ?>
                            
<div class="header-container">
<div class="container-fluid">

<table width="100%">
        <tr>
                                <?php
                                   if(!empty($appli_id))
                                   {
                                       $id = $appli_id;
                                   }
                                   else
                                   {
                                       $id = $_GET['appli_id'];
                                   }
                                    $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'");
                                    $class = $student[0]->class;
                                    if($student[0]->class =='Montessori I' || $student[0]->class =='Montessori II' || $student[0]->class == 'Montessori III')
                                    {
                                        $path = 'http://ec2-204-236-192-144.compute-1.amazonaws.com/leap-sms-ifive/uploads_backup/logo.png';
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    }
                                    else {
                                        $path = 'http://ec2-204-236-192-144.compute-1.amazonaws.com/leap-sms/uploads_backup/logo.png';
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    }
                                ?>
                                        <td valign="top" style="border: none;">
                                        <img alt="" src="<?php echo $base64?>" width="65px;" style="float:left; left:5px; top:5px">
                                        </td>

                <td colspan="3" style="border: none;">
                                    <?php
                                     $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'"); 
                                     $old_school = DB::select("SELECT * FROM `old_school` WHERE `appli_id` = '$id' ORDER BY `rec_id` ASC"); 
                                    //  print_r($old_school);
                                    $class = $student[0]->class;
                                    if ($student[0]->class == 'Montessori I' || $student[0]->class == 'Montessori II' || $student[0]->class == 'Montessori III'): ?>
                                    <center> <b>  I - 5 ACADEMY YESHWANTHPUR</b></center>
                                    <?php else: ?>
                                    <center><b>NATIONAL PUBLIC SCHOOL - YESHWANTHPUR</b></center>
                                    <?php endif; ?>
                                    <br>
                                    <h5 style="margin-top:-10px">APPLICATION FOR REGISTRATION</h5>
                </td>
            <td colspan="3" style="border: none; text-align: right;">
                <h5><?php echo $student[0]->application_no;?></h5>
            </td>
        </tr> 
        <br>
        <tr>
            
        <?php
    $path = 'public/'.$student[0]->std_image;
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
            
<td colspan="12" style="border: none; text-align: right;">
    <div style="float: right;">
        <img src="<?php echo $base64; ?>" alt="Student Photo" style="width: 100px; height: 100px; border: 1px solid black; margin-top: -50px; margin-right: 0px;">
    </div>
</td>
          
        </tr>
    </table>
</div>
</div>

<br/>
<br/>
<br/>
<br/>
<!-- <br/> -->


<div class="class-year-container" >
<h4 style="display: flex; margin-bottom: -2px">
    <div style="text-align: left; display: block; margin-top: -40px">Class: <?php echo $student[0]->class?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Year: <?php echo $student[0]->academic_year; ?></div>
</h4>
</div>    
        
<table class="content-table">
           <tr>
               <th colspan="6" style="text-align:center">Student Details</th>
           </tr>

       <tbody>
           <tr>
               <th style="text-align:left" colspan="1">Name of Student</th>
               <td style="text-align:left" colspan="3"><?php echo $student[0]->name; ?></td>
               <th style="text-align:left" colspan="1">Gender</th>
               <td style="text-align:left" colspan="1"><?php echo $student[0]->gender; ?></td>
           </tr>
           
           <tr>
               <th style="text-align:left" colspan="1">Date of Birth</th>
               <td style="text-align:left" colspan="3"><?php echo date('d-m-Y', strtotime($student[0]->dob)); ?></td>
               <th style="text-align:left" colspan="1">Mother Tongue</th>
               <td style="text-align:left" colspan="1"><?php echo $student[0]->mother_tongue; ?></td>
           </tr>
           
           <tr>
               <th style="text-align:left" colspan="1">Place Of Birth</th>
               <td style="text-align:left" colspan="1"><?php echo $student[0]->birth_place; ?></td>
               <th style="text-align:left" colspan="1">Nationality</th>
               <td style="text-align:left" colspan="1"><?php echo $student[0]->nationality; ?></td>
               <th style="text-align:left" colspan="1">Religion</th>
               <td style="text-align:left" colspan="1"><?php echo $student[0]->religion; ?></td>
           </tr>
           
           <tr>
               <th colspan="2" style="text-align:left">Siblings studying in NPS Yeshwanthpur</th>
               <td colspan="4" style="text-align:left">
               <?php
               if($student[0]->sibling_change == 'Yes')
               {
                echo $student[0]->sib1_name. ', ' .$student[0]->sib1_cls_sec .'<br>';
                if (!empty($student[0]->sib2_name) && !empty($student[0]->sib2_cls_sec)){
                echo $student[0]->sib2_name. ', ' .$student[0]->sib2_cls_sec;
                }
               }
               else {
                echo  $student[0]->sibling_change;
               }
               ?>
            </td>  
           </tr>
           
           <tr>
               <th colspan="3" style="text-align:left">Is your child physically challenged ? </th>
               <td colspan="3" style="text-align:left"><?php echo  $student[0]->phy_clg?></td>  
           </tr>
           
           <tr>
               <th colspan="3" style="text-align:left">Does your child have any special need/learning challenges ? </th>
               <td colspan="3" style="text-align:left"><?php echo $student[0]->slp_need ?></td>  
           </tr>
           
           <tr>
               <th colspan="1" style="text-align:left">Aadhar Card No.</th>
               <td colspan="2" style="text-align:left">
               <?php 
                if (!empty($student[0]->aadhar)) {
                    echo $student[0]->aadhar;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="2" style="text-align:left">Mode of Transport</th>
               <td colspan="1" style="text-align:left"><?php echo $student[0]->transport ?></td>
           </tr>
         
           <?php if ($student[0]->link_class == "1to9" || $student[0]->link_class == "11"): ?>
                <tr>
                <?php if ($student[0]->class =='Grade 1' || $student[0]->class =='Grade 2' || $student[0]->class =='Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8'): ?>
                    <th colspan="1" style="text-align:left">Language II</th>
                    <td colspan="2" style="text-align:left"><?php echo $student[0]->sec_language ?></td>
                <?php elseif ($student[0]->class =='Grade 9'): ?>
                    <th colspan="1" style="text-align:left">Language II</th>
                    <td colspan="5" style="text-align:left"><?php echo $student[0]->sec_language ?></td>
                <?php elseif ($student[0]->link_class == "11"): ?>
                    <?php
                        $courseData = DB::connection('secondary')->table('create_course')
                        ->select('course_name', DB::raw('GROUP_CONCAT(subject_name ORDER BY sequence ASC) as subject_names'))
                        ->where('course_name', '=', $student[0]->electives) 
                        ->groupBy('course_name')
                        ->get();
                    ?>
                    <th colspan="1" style="text-align:left">Stream Selected</th>
                    <td colspan="5" style="text-align:left"><?php echo $student[0]->electives;?><?php echo ' ('.$courseData[0]->subject_names.')' ?></td>
                <?php endif; ?>
                
                <?php if ($student[0]->class =='Grade 1' || $student[0]->class =='Grade 2' || $student[0]->class =='Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8' ): ?> 
                    <th colspan="1" style="text-align:left">Language III</th>
                    <td colspan="2" style="text-align:left"><?php echo $student[0]->third_language ?></td>
                <?php else: ?>
                    <!-- <th colspan="3"></th> -->
                    <!-- <td></td> -->
                <?php endif; ?>
                </tr>
            <?php endif; ?>
             
           <tr>
               <th colspan="3" style="text-align: center;">Father's Details</th>
               <th colspan="3" style="text-align: center;">Mother's Details</th>
           </tr>
           
           <tr>
               <th colspan="1" style="text-align: left;">Father's Name</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_name ?></td>
               <th colspan="1" style="text-align: left;">Mother's Name</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_name ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Mother Tongue</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_mother_tongue ?></td>
               <th colspan="1" style="text-align: left;">Mother Tongue</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_mother_tongue ?></td>
           </tr>
           
           <tr>    
               <th colspan="1" style="text-align: left;">Residential Address</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_residential_address.", ".$student[0]->father_area.", ".$student[0]->father_district.", ".$student[0]->father_state.", ".$student[0]->father_country.", Pincode - ".$student[0]->father_pincode ?></td>
               <th colspan="1" style="text-align: left;">Residential Address</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_residential_address.", ".$student[0]->mother_area.", ".$student[0]->mother_district.", ".$student[0]->mother_state.", ".$student[0]->mother_country.", Pincode - ".$student[0]->mother_pincode ?></td>

           </tr>
           
           <tr>
               <th colspan="1" style="text-align: left;">Email Id</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_email_verified_at ?></td>
               <th colspan="1" style="text-align: left;">Email Id</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_email_verified_at ?></td>
           </tr>
           
           <tr>
               <th colspan="1" style="text-align: left;">Mobile Number</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_mob ?></td>
               <th colspan="1" style="text-align: left;">Mobile Number</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_mob ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Father's Qualification</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_graduation ?></td>
               <th colspan="1" style="text-align: left;">Mother's Qualification</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_graduation ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Telephone (O)</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_office_number)) {
                    echo $student[0]->father_office_number;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Telephone (O)</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_office_number)) {
                    echo $student[0]->mother_office_number;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Telephone (R)</th>
               <td colspan="2" style="text-align: left;"><?php 
                if (!empty($student[0]->father_residential_no)) {
                    echo $student[0]->father_residential_no;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Telephone (R)</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_residential_no)) {
                    echo $student[0]->mother_residential_no;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>

           <tr>
               <th colspan="6" style="text-align:center">Company Details</th>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Nature of Employment</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_organization)) {
                    echo $student[0]->father_organization;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Nature of Employment</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_organization)) {
                    echo $student[0]->mother_organization;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Father's Profession</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_profession)) {
                    echo $student[0]->father_profession;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Mother's Profession</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_profession)) {
                    echo $student[0]->mother_profession;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>

           <tr>
               <th colspan="1" style="text-align: left;">Designation</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_designation)) {
                    echo $student[0]->father_designation;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Designation</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_designation)) {
                    echo $student[0]->mother_designation;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>
           
           <tr>
               <th colspan="1" style="text-align: left;">Company Name</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_company)) {
                    echo $student[0]->father_company;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Company Name</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_company)) {
                    echo $student[0]->mother_company;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr>
    
           <tr>
               <th colspan="1" style="text-align: left;">Company Address</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->father_company_address)) {
                    echo $student[0]->father_company_address;
                } else {
                    echo "NIL"; 
                }
                ?></td>
               <th colspan="1" style="text-align: left;">Company Address</th>
               <td colspan="2" style="text-align: left;">
               <?php 
                if (!empty($student[0]->mother_company_address)) {
                    echo $student[0]->mother_company_address;
                } else {
                    echo "NIL"; 
                }
                ?></td>
           </tr> 

           <tr>
               <th colspan="1" style="text-align: left;">Gross Annual Income (INR)</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->father_annual_income ?></td>
               <th colspan="1" style="text-align: left;">Gross Annual Income (INR)</th>
               <td colspan="2" style="text-align: left;"><?php echo $student[0]->mother_annual_income ?></td>
           </tr>

        <?php if ($student[0]->class =='Grade 2' || $student[0]->class == 'Grade 3' || $student[0]->class =='Grade 4' || $student[0]->class =='Grade 5' || $student[0]->class =='Grade 6' || $student[0]->class =='Grade 7' || $student[0]->class =='Grade 8' || $student[0]->class =='Grade 9' || $student[0]->class =='Grade 11'): ?>
           <tr>
               <th colspan="6" style="text-align:center">Details of Schooling</th>
           </tr>
           <?php foreach($old_school as $row): ?>
                <tr>
                    <td colspan="1" style="text-align: left;"><b>Year:</b> <?php echo $row->academic_year ?></td>
                    <td colspan="2" style="text-align: left;"><b>School:</b>
                    <?php 
                        if (!empty($row->school_name)) {
                            echo $row->school_name;
                        } else {
                            echo "NIL"; 
                        }
                    ?> </td>
                    <td colspan="1" style="text-align: left;"><b>Class:</b> 
                    <?php 
                        if (!empty($row->old_class)) {
                            echo $row->old_class;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                    <td colspan="2" style="text-align: left;"><b>Board:</b>
                    <?php 
                        if (!empty($row->board)) {
                            echo $row->board;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                </tr>
                <tr>
                    <th colspan="1" style="text-align: left;">Subjects</th>
                    <th colspan="1" style="text-align: left;">English</th>
                    <th colspan="1" style="text-align: left;">Maths</th>
                    <th colspan="2" style="text-align: left;">Lang II 
                    <?php 
                        if (!empty($row->lang2_name)) {
                            echo $row->lang2_name;
                        } else {
                            echo "NIL"; 
                        }
                    ?>
                    </th>
                    <th colspan="1" style="text-align: left;">Science</th>
                </tr>
                <tr>
                    <th colspan="1" style="text-align: left;">Percentage / Grade
                    <?php 
                        if ($row->academic_year == "2023-24") {
                            echo "<br>for Mid-term Exam";
                        } 
                        else if($row->academic_year == "2022-23" || $row->academic_year == "2021-22"){
                            echo "<br>for Final Exam"; 
                        }
                    ?></th>
                    <td colspan="1" style="text-align: left;">
                    <?php 
                        if (!empty($row->eng_marks)) {
                            echo $row->eng_marks;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                    <td colspan="1" style="text-align: left;">
                    <?php 
                        if (!empty($row->math_marks)) {
                            echo $row->math_marks;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                    <td colspan="2" style="text-align: left;">
                    <?php 
                        if (!empty($row->lang2_marks)) {
                            echo $row->lang2_marks;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                    <td colspan="1" style="text-align: left;">
                    <?php 
                        if (!empty($row->science_marks)) {
                            echo $row->science_marks;
                        } else {
                            echo "NIL"; 
                        }
                    ?></td>
                </tr>
           <!-- </tr>  -->
           <?php endforeach; ?>
        <?php endif; ?>
           
           <tr>
               <th colspan="6" style="text-align:center">Documents Submitted</th>
           </tr>
           <tr>
                <td colspan="6" style="text-align: left;">
                    <?php 
                    if(!empty($student[0]->student_adr))
                    {
                        echo "Student Aadhar";
                    }
                    if(!empty($student[0]->father_aadhar))
                    {
                        echo " , Father Aadhar";
                    }
                    if(!empty($student[0]->mother_aadhar))
                    {
                        echo " , Mother Aadhar";
                    }
                    if(!empty($student[0]->birth_cer))
                    {
                        echo " , Birth Certificate";
                    }
                    if(!empty($student[0]->immunization_card))
                    {
                        echo " , Immunization Card";
                    }
                    ?>
                    <?php foreach($old_school as $row): 
                        if(!empty($row->privious_details_uploads))
                        {
                            echo " , ".$row->academic_year."_MarksCard";
                        }
                        ?>
                    <?php endforeach; ?>
                </td>
           </tr>


       </tbody>
   </table> 
   
<style>
    .content-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-size: 14px;
    }

    th, td {
        padding: 5px;
        border: 1px solid;
        text-align: center;
    }

    th {
        font-weight: bold;
    }

    th.class-header {
        border-top: none;
        border-right: none;
        border-bottom: none;
        border-left: none;
        text-align: left;
        font-weight: normal;
    }

    .class-year-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .class-header {
        margin: 0; 
    }
    .class-year {
        margin-left: 440px;
    }
    .header-container {
        margin-top: 0;
        padding: 0px;
    }

    .school-logo {
        width: 50px; 
        height: auto; 
        align: left;
    }

    .school-name {
        margin: 0;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }
    .header-table {
        border: none;
    }
</style>


<!-- ------------------------- PAGE BREAK -------------------------- -->


<div class="page-break"></div>
<div style="border: 1px solid black; padding: 10px; font-size: 15px; ">
<?php if ($student[0]->link_class == "mont"): ?>
                                <center>
                                <strong>
                                NOTE TO PARENTS
                                </strong>
                                 </center>
                                  <br/>
                                    <ul>
                                    <li> Copies of documents mentioned below to be attested by both the parents and submitted on the day of Interaction.</li>
                                        <ol style="margin-left: 30px;">
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
                                    <center>
                                    <strong>
                                    DECLARATION BY PARENT/GUARDIAN
                                    </strong>
                                    </center>
                                    <br/>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I have read the rules and regulations of I – 5 Academy and I fully agree to abide by them, if admitted. I am aware that my ward’s appropriate photo/video will be put on school website / social media to showcase his / her achievements / talents as decided by school authorities.  </p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I understand that the School refund policy will be applicable for my ward's withdrawal after admission.</p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I will refrain from posting any derogatory remarks about the school or school fraternity on social media platforms.</p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I hereby declare that the information furnished above is true and correct to the best of my knowledge and I undertake to inform you of any changes therein, immediately. </p>

                            <?php else: ?>
                                <center>
                                <strong>
                                NOTE TO PARENTS
                                </strong>
                                 </center><br/>
                                    <ul>
                                    <li>The Copies of documents mentioned below to be attested by both the parents and submitted on the day of entrance (Classes 1- 12) / Interaction day (for Preprimary classes). </li><br/>
                                        <ol style="margin-left: 30px;">
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

                                    <center>
                                    <strong>
                                    DECLARATION BY PARENT/GUARDIAN
                                    </strong>
                                    </center>
                                    <br/>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I have read the rules and regulations of National Public School, Yeshwanthpur and I fully agree to abide by them, if admitted. I am aware that my ward’s appropriate photo/video will be put on school website / social media to showcase his / her achievements / talents as decided by school authorities.</p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I understand that the School refund policy will be applicable for my ward's withdrawal after admission.</p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I will refrain from posting any derogatory remarks about the school or school fraternity on social media platforms.</p>
                                    <p style="margin-left: 20px; margin-right: 20px; text-align: justify;">I hereby declare that the information furnished above is true and correct to the best of my knowledge and I undertake to inform you of any changes therein, immediately. </p>
                            <?php endif; ?>
                            <br/>

           <span style=" margin-top: 50px; float: left;">Signature of Father</span>
           <span style=" margin-top: 50px; float: right;">Signature of Mother</span>                
       
</div>

<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>
<br></br>


<center>
       <strong>
       FOR OFFICE USE
       </strong>
   </center>
   <div style="border: 1px solid black; padding: 10px; font-size: 15px; display: flex; height: 120px;">
        <div style="clear: both; position: relative;">
            <span style="float: left; padding-right: 10px;">ADMIT :</span>
            <hr style="border: none; border-bottom: 1px solid #000; width: 20%; margin-left: 60px; margin-top: 20px; padding-left: 100px;">
            <span style="float: right; padding-right: 250px; margin-top: -28px;">In Class :</span>
            <hr style="border: none; border-bottom: 1px solid #000; width: 20%; margin-right: 10px; margin-top: -7px; padding-right: 100px;">
        </div>
        <div style="clear: both;">
            <span style="float: left; margin-top: 10px;">Place:</span>
        </div>
        <div style="clear: both;">
            <span style="float: left; margin-top: 10px;">Date :</span>
            <span style="float: right; margin-top: 10px; margin-right: 220px;">PRINCIPAL</span>
        </div>
</div>

<!-- ------------------------- PAGE BREAK -------------------------- -->
<?php if ($student[0]->link_class == "1to9" || $student[0]->link_class == "11"): ?>
   <div class="page-break"></div>

   <center>
       <strong>
           NATIONAL PUBLIC SCHOOL - YESHWANTHPUR<br/>
           ACKNOWLEDGEMENT / ADMIT CARD FOR ENTRANCE TEST <?php echo $student[0]->academic_year; ?><br/>
           (To be furnished along with the Application Form)
       </strong>
   </center>
   <h4>Application Number: <?php echo $student[0]->application_no;?></h4>
    
    <?php if ($student[0]->link_class == "11"): ?>
        <?php
        $courseData = DB::connection('secondary')->table('create_course')
        ->select('course_name', DB::raw('GROUP_CONCAT(subject_name ORDER BY sequence ASC) as subject_names'))
        ->where('course_name', '=', $student[0]->electives) 
        ->groupBy('course_name')
        ->get();
        ?>
    <h4>Stream Selected : <?php echo $student[0]->electives;?><?php echo ' ('.$courseData[0]->subject_names.')' ?>
    <?php endif; ?>

   <div style="border: 1px solid black; padding: 10px;">
   
   <div>
       <p><strong>Name of the Student: </strong> <?php echo $student[0]->name?></p>
       <p><strong>Seeking admission for : </strong> <?php echo $student[0]->class?></p>
       <p><strong>Father's Name : </strong> <?php echo $student[0]->father_name?></p>
       <p><strong>Mother's Name : </strong> <?php echo $student[0]->mother_name?></p>
   </div> 
   
   <div style="float: right;">
        <img src="<?php echo $base64; ?>" alt="Student Photo" style="width: 100px; height: 100px;  margin-top: -150px; margin-right: 50px;border: 1px solid black;">
    </div>

    <div>
       <p><strong>Note : </strong></p>
       <ul>
           <li>
               <Strong>Subjects for Entrance Test</strong>
               <p><strong>Class 1 : </strong>English and Mathematics</p>
               <p><strong>Class 2-6 : </strong>English, Mathematics and Hindi / Kannada</p>
               <!-- <p><strong>Class 6 : </strong>English, Mathematics and Hindi</p> -->
               <p><strong>Class 7-8 : </strong>English, Mathematics, Science and Hindi / Kannada</p>
               <p><strong>Class 9 : </strong>English, Mathematics, Science and Hindi / Sanskrit</p>
               <p>
                   <strong>Class 11 : </strong>
                   <u>For Science Stream</u> - English, Physics, Chemistry and Mathematics <br/>
                   <u>For Commerce Stream</u> - English and Basic Mathematics<br/> 
                   <u>For Humanities Stream</u> - English and Basic Mathematics<br/>           

               </p>
           </li>

           <li>Please Check our website periodically for further details on the entrance test dates, timings etc.</li>
           <li>This Admit card is valid for <strong>NPS Yeshwanthpur</strong> only.</li>
           <li>On successfully passing the Entrance test, you will get an email confirming the interaction schedule with the Principal</li>
       </ul>
       <center><h6><u>STUDENTS TO BRING THIS ACKNOWLEDGEMENT SLIP FOR THE ENTRANCE TEST.</u></h6></center>
       <p style="float: right; margin-top: 65px;"><strong>Office seal and signature</strong></p>
       <p><strong>Place :</strong></p>
       <p><strong>Date :</strong></p>
   </div>
   </div>
<?php endif; ?>
</body>
</head>
</html>
                    