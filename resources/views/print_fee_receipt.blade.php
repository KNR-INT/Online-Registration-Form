<body class="hold-transition sidebar-mini layout-fixed">
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
                            $class = $student[0]->id;
                            $class = $student[0]->class;
                            // echo $class;
                            ?>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light"  style="background-color:white">
            <div class="container">               
                <html>
                    <head>
  
                            <style>
                                
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
                </html>
                <body onload="window.print();"> 
                    <div style="width: 780px;margin-left: -40px;" id="divToPrint">
                       
                        <div style="height: 50%;padding-right: 10%;width: 80%;padding-left:10%;" >
                            <div style="width: 100%;margin-left: 0px;font-family: Poppins, sans-serif;color: black;margin-top:2%;">
                                <table width="100%">
                                    <tbody>
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
                                        $path = 'https://leap-i5.npsypr.edu.in/uploads/logo.png';
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    }
                                    else {
                                        $path = 'https://leap.npsypr.edu.in/uploads/logo.png';
                                        $type = pathinfo($path, PATHINFO_EXTENSION);
                                        $data = file_get_contents($path);
                                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                    }
                                    ?>
                                        <td valign="top">
                                        <img alt="" src="<?php echo $base64?>" width="65px;" style="float:left; left:5px; top:5px">
                                        </td> 

                                        <td valign="top">
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
                                   
                                    <center><font style="font-weight: bold;font-size: 15px;">
                                    <?php
                                     $student = DB::select("SELECT * FROM `students` WHERE `id` = '$id'"); 
                                    $class = $student[0]->class;
                                    if ($student[0]->class == 'Montessori I' || $student[0]->class == 'Montessori II' || $student[0]->class == 'Montessori III'): ?>
                                        I - 5 ACADEMY YESHWANTHPUR
                                    <?php else: ?>
                                    NATIONAL PUBLIC SCHOOL - YESHWANTHPUR
                                    <?php endif; ?>
                                    </font>
                                    <br>
                                    <font style="font-weight: bold; font-size: 13px;">#9/1, Pipeline Road, Raghavendra Layout (Behind RNS Motors), Yeshwanthpur, Bangalore, 560 022<br>Email-ID : info@npsypr.edu.in </font></center>
                                    <h4 style="font-size: 15px;font-weight: bold;" align="center">APPLICATION FEE RECEIPT</h4>
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
                                <table width="100%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td style="width: 55%;padding-top: 3px;">
                                                <table style="width: 100%;font-size: 12px;" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:100px;">Rec. No </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b>
                                                            <?php echo $student[0]->fee_receipt_no;?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;">Student Name </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->name; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;">Father Name </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->father_name; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:90px;">Mother Name </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->mother_name; ?></b></td>
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
                              $user = DB::table('students')
                               ->where('id', $id)
                               ->first();
                               
                               $order_id =   $user->order_id;
                               
                            $fee_receipt = DB::select("SELECT * FROM payment WHERE order_id = '$order_id' ORDER BY id DESC LIMIT 1");

                            ?>
                                            </td>
                                            <td style="width: 45%;padding-top: 3px;">
                                                <table style="font-size: 12px; float:right;" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:100px;">Date </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b><?php
                                                            if (!empty($fee_receipt[0])) {
                                                                echo date_format(date_create($fee_receipt[0]->txn_date), 'd-m-Y');
                                                            } else {
                                                                echo "";
                                                            }
                                                            ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px;">Class </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left">
                                                                <b><?php echo $student[0]->class; ?>
                                                            </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px;"> Application No </td>
                                                            <td style="width:10px;"> : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->application_no;?></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table style="border: 1px solid black;" width="100%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <th style="border-left: none;width: 12%;text-align: center;font-weight:bold;font-size: 14px;padding-top:2px;">Sl no.</th>
                                            <th style="width: 55%;text-align: center;font-weight:bold;border-left: 1px solid black;font-size: 14px;padding-top:2px;">Particulars</th>
                                            <th style="width: 28%;text-align: right;padding-right: 3px;font-weight:bold;border-left: 1px solid black;font-size: 14px;padding-top:2px;">Amount Paid(Rs.)</th>
                                        </tr>
                                                        
                                        <tr>
                                            <td style="text-align: center;border-left: none;border-top: 1px solid black;font-size: 13px;padding-top:2px;">1</td>
                                            <td style="text-align: left;padding-left: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;">Application Fee</td>
                                            <td style="text-align: right;padding-right: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;">
                                            <?php echo $fee_receipt[0]->txn_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align:right;padding-right: 3px;border-right: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;" colspan ="2"> Total (INR)</td>
                                            <td  style="text-align: right;padding-right: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;"> <?php echo $fee_receipt[0]->txn_amount; ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div style="font-size:13px;margin-top:10px;">
                                    In words INR :
                                    <?php
                                    $number = $fee_receipt[0]->txn_amount;
                                    $no = floor($number);
                                    $point = round($number - $no, 2) * 100;
                                    $hundred = null;
                                    $digits_1 = strlen($no);
                                    $i = 0;
                                    $str = array();
                                    $words = array('0' => '', '1' => 'One', '2' => 'Two',
                                        '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
                                        '7' => 'seven', '8' => 'eight', '9' => 'nine',
                                        '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
                                        '13' => 'Thirteen', '14' => 'Fourteen',
                                        '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
                                        '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
                                        '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
                                        '60' => 'Sixty', '70' => 'Seventy',
                                        '80' => 'Eighty', '90' => 'Ninety');
                                    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
                                    while ($i < $digits_1) {
                                        $divider = ($i == 2) ? 10 : 100;
                                        $number = floor($no % $divider);
                                        $no = floor($no / $divider);
                                        $i += ($divider == 10) ? 1 : 2;
                                        if ($number) {
                                            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                            $str [] = ($number < 21) ? $words[$number] .
                                                " " . $digits[$counter] . $plural . " " . $hundred
                                                :
                                                $words[floor($number / 10) * 10]
                                                . " " . $words[$number % 10] . " "
                                                . $digits[$counter] . $plural . " " . $hundred;
                                        } else $str[] = null;
                                    }
                                    $str = array_reverse($str);
                                    $result = implode('', $str);
                                    $points = ($point) ?
                                        "." . $words[$point / 10] . " " . 
                                            $words[$point = $point % 10] : '';
                                    echo $result . "Rupees " ;
                                    ?> 
                                </div>
                            </div>
                            <div style="font-size:13px;margin-top:10px;"><b>Application Fees for the academic year <?php echo $student[0]->academic_year; ?></b></div>
                                    <br>
                                <table style="border: 1px solid black;" width="100%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <th style="text-align: center;border-left: none;font-weight:normal;font-size: 14px;padding-top:2px;" colspan="2">Payment Mode</th>
                                        </tr>
                                        <tr><?php $p_typr =$fee_receipt[0]->payment_type;
                                        if ($p_typr == NULL)
                                        {
                                        ?>
                                            <td width="100px;" style="text-align: center;border-left: none;border-top: 1px solid black;font-size: 13px;padding-top:2px;">Online</td>
                                            <td style="text-align: left;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding:3px;">
                                            Transaction ID: <b><?php 
                                            if(!empty($fee_receipt[0]->txn_id))
                                            {
                                                echo $fee_receipt[0]->txn_id;
                                            }
                                            else
                                            {
                                                echo "N.A";
                                            }
                                            ?></b></td>
                                        <?php }
                                        else {
                                                ?>
                                             <td width="100px;" style="text-align: center;border-left: none;border-top: 1px solid black;font-size: 13px;padding-top:2px;">DD</td>
                                            <td style="text-align: left;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding:3px;">
                                            DD Number: <b><?php 
                                            if(!empty($fee_receipt[0]->DD))
                                            {
                                                echo $fee_receipt[0]->DD;
                                            }
                                            else
                                            {
                                                echo "N.A";
                                            }
                                            ?></b></td>
                                               <td style="text-align: left;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding:3px;">
                                            Bank Name: <b><?php 
                                            if(!empty($fee_receipt[0]->bank_name))
                                            {
                                                echo $fee_receipt[0]->bank_name;
                                            }
                                            else
                                            {
                                                echo "N.A";
                                            }
                                            ?></b></td>
                                                <?php
                                            }?>
                                        </tr>   
                                    </tbody>
                                </table>
                                    <br>

                                <table style="font-size: 11px; font-weight: bold;text-align:center;" width="100%;" align="center">
                                    <tbody>
                                        <tr>
                                            <td>
                                                This is an electronically generated receipt, hence no signature required.
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php 
                                            $currentYear = date("Y");
                                            // echo $currentYear;
                                            ?>
                                            <td style="font-size: 9px;">
                                                © 2013 - <?php  echo $currentYear; ?>  - NPS Yeshwanthpur.  All Rights Reserved.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></script>
            </div>
        </nav>
    </div>  
 </body>