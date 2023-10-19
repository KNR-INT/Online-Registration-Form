<html>
                    <head>
                        <title>National Public School</title>
<body class="hold-transition sidebar-mini layout-fixed" onload="window.print();">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"  style="background-color:white">
            <div class="container">               
              	
                            <style>
                                img {
                                display: flex;
                                margin-left: 15%;
                                margin-right: 15%;
                                width: 35%;
                                        }
                                h3 {
                                font-family: Calibri; 
                                color:Black; 
                                font-size:20pt; 
                                text-align:center; 
                                
                                width:500px;
                                
                                }


                                .skin-blue .sidebar > .sidebar-menu > li > a:hover, .skin-blue .sidebar > .sidebar-menu > li.active > a {
                                    color: #000;
                                    background: #f9f9f9;
                                }
                                body > .header .navbar .sidebar-toggle{
                                    background-color: #648f45;
                                }
                                
                                .skin-blue .logo:hover {
                                background: rgba(17, 160, 169, 0.09);
                                }
                                
                                .skin-blue .navbar .navbar-right > .nav, .skin-blue .left-side {
                                    background-color: #648f45;
                                }
                                .skin-blue .logo {
                                    background-color: rgba(17, 160, 169, 0.09);
                                    color: #f9f9f9;
                                }
                                .skin-blue .navbar {	
                                    background-color: rgba(17, 160, 169, 0.09);
                                }
                                
                                
                                    .textAlignLeft{
                                        text-align: left !important;
                                    }
                                    
                                    .textAlignRight{
                                        text-align: right !important;
                                    }
                                    
                                    .textAlign{
                                        text-align: center !important;
                                    }

                                    .select2.select2-container.select2-container--default.select2-container--below.select2-container--open.select2-container--focus, 
                                    .select2.select2-container.select2-container--default{
                                    width:100% !important;
                                    }
                                    
                                    .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single{
                                    padding: 12px 3px;
                                    }
                                    
                                    .select2-container--default .select2-selection--single{
                                    border-radius: inherit;
                                    }
                                    
                                    .select2-container .select2-selection--single{
                                        height: 42px;
                                    }
                                    
                                    .select2-container--default .select2-selection--single .select2-selection__rendered{
                                        line-height: 21px;
                                    }
                            </style>   
                    </head>
                <body onload="window.print();"> 
                <center>
                    <div style="width: 780px;margin-left: -40px;" id="divToPrint">
                    <div style="height: 50%;padding-right: 10%;width: 80%;padding-left:10%;" >
                            <div style="width: 100%;margin-left: 0px;font-family: Poppins, sans-serif;color: black;margin-top:2%;">
                                <table width="100%">
                                    <tbody>
                                        <tr>  
                                        <div class="container">
       <div class="bg-image">     
          <div class="card-header">
            <div class="d-flex border-bottom p-1 mb-3">
            <div class="container-fluid row">
            <div class = "col-md-18">
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                        <td valign="top">
                                        </td> 
                                            <td valign="top">
                                            <center><font style="font-weight: bold;font-size: 15px;">NATIONAL PUBLIC SCHOOL - YESHWANTHPUR</font><br>
                                            <font style="font-weight: bold; font-size: 13px;">#9/1, Pipeline Road, Raghavendra Layout (Behind RNS Motors), Yeshwanthpur, Bangalore-560 022<br>Email-ID : info@npsypr.edu.in</font></center>
                                            <h4 style="font-size: 15px;font-weight: bold;" align="center">APPLICATION FORM</h4>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
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
                            ?>
       </br>
           <span>
               <strong>Class:</strong>
               <span><?php echo $student[0]->class; ?></span>
           </span>
           <span style="float:right">
               <span><strong>YEAR : </strong></span>
               <span><?php echo $student[0]->dob ?></span>
           </span>
            </div>
        </div>
        </div>
      </div>
   
      <table style="border: 1px solid black; margin-left:30px;" width="100%" cellspacing="0" cellpadding="0" align="center">
       <thead>
           <tr>
               <th colspan="4" style="text-align: center">Personal Details</th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <th>Name of the Student:</th>
               <td><?php echo $student[0]->name; ?></td>
               <th>Gender:</th>
               <td><?php echo $student[0]->gender; ?></td>
           </tr>
           
           <tr>
               <th>Date of Birth:</th>
               <td><?php echo $student[0]->dob; ?></td>
               <th>Mother Tongue</th>
               <td><?php echo $student[0]->mother_tongue; ?></td>
           </tr>
           
           <tr>
               <th>Place Of Birth:</th>
               <td><?php echo $student[0]->birth_place; ?></td>
               <th>Religion</th>
               <td><?php echo $student[0]->religion; ?></td>
           </tr>
           
           <tr>
               <th colspan="2">Siblings studying in NPS Yeshwanthpur</th>
               <td colspan="2"><?php echo  $student[0]->sibling_change ?>;</td>  
           </tr>
           
           <tr>
               <th colspan="3">Is your Child Physically Challanged ? </th>
               <td><?php echo  $student[0]->phy_clg?></td>  
           </tr>
           
           <tr>
               <th colspan="3">Does your child have any special need/learning challenges ? </th>
               <td><?php $student[0]->slp_need ?></td>  
           </tr>
           
           <tr>
               <th>Aadhar Card No.</th>
               <td><?php $student[0]->aadhar ?></td>
               <th>Mode of Transport</th>
               <td><?php $student[0]->transport ?></td>
           </tr>
           
           <tr>
               <th colspan="2" style="text-align: center;">Father Details</th>
               <th colspan="2" style="text-align: center;">Mother Details</th>
           </tr>
           
           <tr>
               <th>Father's Name</th>
               <td><?php $student[0]->father_name ?></td>
               <th>Mother's Name</th>
               <td><?php $student[0]->mother_name ?></td>
           </tr>
           
           <tr>    
               <th>Residential Address</th>
               <td><?php $student[0]->father_residential_address.", ".$student[0]->father_area.", ".$student[0]->father_district.", ".$student[0]->father_state.", ".$student[0]->father_country.", Pincode - ".$student[0]->father_pincode ?></td>
               <th>Residential Address</th>
               <td><?php $student[0]->mother_residential_address.", ".$student[0]->mother_area.", ".$student[0]->mother_district.", ".$student[0]->mother_state.", ".$student[0]->mother_country.", Pincode - ".$student[0]->mother_pincode ?></td>

           </tr>
           
           <tr>
               <th>Email Id</th>
               <td><?php $student[0]->father_email_verified_at ?></td>
               <th>Email Id</th>
               <td><?php $student[0]->mother_email_verified_at ?></td>
           </tr>
           
           <tr>
               <th>Phone Number (Res)</th>
               <td><?php $student[0]->father_residential_no ?></td>
               <th>Phone Number (Res)</th>
               <td><?php $student[0]->mother_residential_no ?></td>
           </tr>

           <tr>
               <th>Gross Annual Income (INR)</th>
               <td><?php $student[0]->father_annual_income ?></td>
               <th>Gross Annual Income (INR)</th>
               <td><?php $student[0]->mother_annual_income ?></td>
           </tr>

           <tr>
               <th colspan="4" style="text-align:center">Company Details</th>
           </tr>

           <tr>
               <th>Designation (Father)</th>
               <td><?php $student[0]->father_designation ?></td>
               <th>Designation (Mother)</th>
               <td><?php $student[0]->mother_designation ?></td>
           </tr>
           
           <tr>
               <th>Company Name (Father)</th>
               <td><?php $student[0]->father_company ?></td>
               <th>Company Name (Mother)</th>
               <td><?php $student[0]->father_company ?></td>
           </tr>
           
           <tr>
               <th>Company Address (Father)</th>
               <td><?php $student[0]->father_company_address ?></td>
               <th>Company Address (Mother)</th>
               <td><?php $student[0]->mother_company_address ?></td>
           </tr> 
           
           <tr>
               <th colspan="4" style="text-align: center">Document Submitted</th>
           </tr>
           
           <tr>
               <td colspan="4">Birth Certificate, Aadhar/Passport, Father Aadhar</td>
           </tr>


       </tbody>
     </table> 
   

                <!-- ------------------------- PAGE BREAK -------------------------- -->
        <div class="page-break"></div>

            
        <div>                    
            <div style="margin-top: 60px">
                <span style="float: left;">Signature of Father</span>
                <span style="float: right;">Signature of Mother</span>                
            </div>
        </div>
        <style>
        #title{
            font-weight:bold;
            text-align:auto;
            margin-left:-150px;
        }
        #app{
            font-weight:bold;
            text-align:auto;
            margin-left:-150px;
        }
        </style>
        <!-- ------------------------- PAGE BREAK -------------------------- -->
        <div class="page-break"></div>
                <strong>
                <span id = "title">
                NATIONAL PUBLIC SCHOOL - YESHWANTHPUR<br></span>
                <span id = "app">
                    APPLICATION FEE RECEIPT / ADMISSION CARD </strong>
                    </span>
        </center>
        <span>Application Number: NPSYPR/<?php echo $student[0]->class;?>/0<?php echo $student[0]->id; ?>></span>
        </div>

        <div style="margin-top: 30px">
        <img src="" class="student-photo">

        <div class="row">
            <div class="col-md-12" style="margin-top: 90px;">
                <div style="margin-left: 10px; margin-top: 20px;">
                    <span>
                        <strong>Class:</strong>
                        <span><?php echo $student[0]->class; ?></span>
                    </span>
                    <span style="float:right">
                        <span><strong>YEAR : </strong></span>
                        <span></span>
                    </span>
                </div>
            </div>
        </div>

        </div>
        <table style="border: 1px solid black; margin-left:30px;" width="100%" cellspacing="0" cellpadding="0" align="center">
            <tbody>
                <tr>
                    <th>Rec No</th>
                    <td><?php echo $student[0]->application_no; ?></td>
                </tr>
                <tr>
                    <th>Student Name</th>
                    <td><?php $student[0]->name ?></td>
                </tr>
                <tr>
                    <th>Father Name</th>
                    <td><?php $student[0]->father_name ?></td>
                </tr>
                <tr>
                    <th>Mother Name</th>
                    <td><?php $student[0]->mother_name ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td></td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td><?php $student[0]->class ?></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>r</td>
                </tr>
            </tbody>
        </table>


        <?php
                    if(!empty($appli_id))
                    {
                        $id = $appli_id;
                    }
                    else
                    {
                        $id = $_GET['appli_id'];
                    }

                                    $fee_receipt = DB::select("SELECT * FROM payment WHERE order_id = '$id' ORDER BY id DESC LIMIT 1");

                                    ?>
                            <table style="border: 1px solid black; margin-left:30px;" width="100%" cellspacing="0" cellpadding="0" align="center">
            <thead>
                <tr>
                    <th colspan="3" style="text-align: center">Application Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Sl No.</th>
                    <th>Particulars</th>
                    <th>Amount Paid (Rs)</th>
                </tr>
                
                <tr>
                    <td>1</td>
                    <td>Appication Fee</td>
                    <td><?php echo $fee_receipt[0]->txn_amount; ?></td>
                </tr>
            </tbody>
        </table>

        <table style="border: 1px solid black; margin-left:30px;" width="100%" cellspacing="0" cellpadding="0" align="center">
            <thead>
                <th colspan="2">Payment Mode</th>
            </thead>
            <tbody>
                <tr>
                    <th>Online</th>
                    <td>
                        <span>Transaction ID : </span>
                        <strong><?php echo $fee_receipt[0]->txn_id;?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        This is an electronically generated receipt, hence no signature required.

        <div class="page-break"></div> 

            <img src="" class="school-logo" style="float-left">
        <center>
            <strong>
                NATIONAL PUBLIC SCHOOL - YESHWANTHPUR<br/>
                ACKNOWLEDGEMENT / ADMIT CARD FOR ENTRANCE TEST 2022-23<br/>
                (To be furnished along with the Application Form)
            </strong>
        </center>
        <h4>Application Number: NPSYPR/<?php echo $student[0]->class;?>/0<?php echo $student[0]->id; ?>></h4>

        <div style="border: 1px solid black; padding: 10px;">
        <img src="" height="100" style="float: right; margin: 10px 10px 0 0"/>
        <div>
            <p><strong>Name of the Student: </strong><?php $student[0]->name ?></p>
            <p><strong>Seeking admission for : </strong><?php $student[0]->class ?></p>
            <p><strong>Father's Name : </strong><?php $student[0]->father_name ?></p>
            <p><strong>Mother's Name : </strong><?php $student[0]->mother_name ?></p>
        </div> 
        
            <div>
            <p><strong>Note : </strong></p>
            <ul>
                <li>
                    <Strong>Subjects for Entrance Test</strong>
                    <p><strong>Class 1 : </strong>English and Mathematics</p>
                    <p><strong>Class 2-5 : </strong>English, Mathematics and Hindi / Kannada</p>
                    <p><strong>Class 6 : </strong>English, Mathematics and Hindi</p>
                    <p><strong>Class 7-8 : </strong>English, Mathematics, Science and Hindi</p>
                    <p><strong>Class 9 : </strong>English, Mathematics, Science and Hindi / Sanskrit</p>
                    <p>
                        <strong>Class 11 : </strong>
                        <u>For Science Stream</u> - English, Physics, Chemistry and Mathematics <br/>
                        <u>For Commerce Stream</u> - Mathematics and English <br/>           
                    </p>
                </li>

                <li>Please Check our website periodically for further details on the entrance examination dates, timings etc.</li>
                <li>This Admit card is valid for <strong>NPS Yeshwanthpur</strong> only.</li>
                <li>Results of the Entrance Test will be uploaded on our website within a week of the Entrance Test.</li>
            </ul>
            <p style="margin: 0;"><strong><u>STUDENTS TO BRING THIS ACKNOWLEDGEMENT SLIP FOR THE ENTRANCE TEST.</u></strong></p>
            <p style="float: right; margin-bottom: 55px;"><strong>Office seal and signature</strong></p>
            <p><strong>Place :</strong></p>
            <p><strong>Date :</strong></p>
        </div>
        </div>
                    </nav>
        </body>
        </head>
        </html>
                