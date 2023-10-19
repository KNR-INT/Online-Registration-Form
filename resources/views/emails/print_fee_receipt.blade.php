<!DOCTYPE html>
<html>
<head>
    <!-- Include necessary CSS if any -->
</head>
<body onload="window.print();">
    <div style="width: 780px; margin-left:40px;">
        <div>
        <div style="margin-top: 20px">
<img src="{{ url('/') }}/resources/views/photos/logo.jpg">
</div>
        <table width="100%" style="border-collapse: collapse;" align="center">
                <tbody>
                    <tr>
                        <td style="background-color: white; padding: 20px;">
                            <center>
                                <font style="font-weight: bold; font-size: 20px;">NATIONAL PUBLIC SCHOOL - YESHWANTHPUR</font><br>
                                <font style="font-weight: bold; font-size: 13px;">#9/1, Pipeline Road, Raghavendra Layout (Behind RNS Motors), Yeshwanthpur, Bangalore-560 022<br>Email-ID : info@npsypr.edu.in</font>
                            </center>
                            <h4 style="font-size: 15px; font-weight: bold; text-align: center;">APPLICATION FEE RECEIPT</h4>
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
             <table width="100%" style="border-collapse: collapse;" align="center">
                <tbody>
                    <tr>
                        <td style="width: 50%; padding: 10px;">
                            <table style="width: 100%; font-size: 12px; border-collapse: collapse;">
                                <tbody>
                                    <!-- Table rows and cells with data -->
                                    <tr>
                                        <td style="width:100px;">Rec. No</td>
                                        <td style="width:10px;">:</td>
                                        <td style="text-align: left;"><b><?php echo $student[0]->fee_receipt_no; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Student Name</td>
                                        <td>:</td>
                                        <td style="text-align: left;"><b><?php echo $student[0]->name; ?></b></td>
                                    </tr>
                                     <tr>
                                                            <td>Father Name </td>
                                                            <td>: </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->father_name; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td >Mother Name </td>
                                                            <td > : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->mother_name; ?></b></td>
                                                        </tr>
                                </tbody>
                            </table>
                        </td>
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
                                        
                        <td style="width: 50%; padding: 10px;">
                        <table >
                                <tbody>
                                    <!-- Table rows and cells with data -->
                                    <tr>
                                        <td style="width:100px;">Date</td>
                                        <td style="width:10px;">:</td>
                                        <td style="text-align: left;"><b><?php
if (!empty($fee_receipt[0])) {
    echo date_format(date_create($fee_receipt[0]->txn_date), 'd-m-Y');
} else {
    echo "";
}
?></b></td>
                                    </tr>
                                    <tr>
                                        <td>Class</td>
                                        <td>:</td>
                                        <td style="text-align: left;"><b><?php echo $student[0]->class; ?></b></td>
                                    </tr>
                                     <tr>
                                                            <td > Application No </td>
                                                            <td > : </td>
                                                            <td style="text-align: left;" align="left"><b><?php echo $student[0]->application_no; ?></b></td>
                                                        </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Add more content and tables here -->
            <table style="border: 1px solid black;" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                    <tr>
                                            <th style="border-left: none;width: 12%;text-align: center;font-weight:bold;font-size: 14px;padding-top:2px;">Sl no.</th>
                                            <th style="width: 55%;text-align: center;font-weight:bold;border-left: 1px solid black;font-size: 14px;padding-top:2px;">Particulars</th>
                                            <th style="width: 28%;text-align: right;padding-right: 3px;font-weight:bold;border-left: 1px solid black;font-size: 14px;padding-top:2px;">Amount Paid(Rs.)</th>
                                        </tr>
                                        <tr>
                                             <td style="text-align: center;border-left: none;border-top: 1px solid black;font-size: 13px;padding-top:2px;">1</td>
                                             
                                             <td style="text-align: left;padding-left: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;">Appication Fee</td>

                                             <td style="text-align: right;padding-right: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;"><?php echo $fee_receipt[0]->txn_amount; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right;padding-left: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;" colspan ="2">Total "(INR)"</td>
                                            
                                            <td  style="text-align: right;padding-right: 3px;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding-top:2px;"> <?php echo $fee_receipt[0]->txn_amount; ?></td>
                                        </tr>

                </tbody>
            </table>
            <div style="font-size: 13px; margin-left: 8px; text-align: left; padding-left: 9px;">
                In words (INR): <?php
                                    $number =  $fee_receipt[0]->txn_amount;
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
            <div style="font-size: 13px;  margin-left: 9px; text-align: left; padding-left: 9px;"><b>Fees for the academic year 2023 - 2024</b></div>
            <br>
            <table style="border: 1px solid black;" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                     <tr>
                                            <th style="text-align: center;border-left: none;font-weight:normal;font-size: 14px;padding-top:2px;" colspan="2">Payment Mode</th>
                                        </tr>
                                        <tr>
                                            <td width="100px;" style="text-align: center;border-left: none;border-top: 1px solid black;font-size: 13px;padding-top:2px;">Online</td>

                                            <td style="text-align: left;border-left: 1px solid black;border-top: 1px solid black;font-size: 13px;padding:3px;">
                                            
                                            TXN ID: <b><?php echo $fee_receipt[0]->txn_id;?> </b>
                                            </td>     
                                        </tr>   
                </tbody>
            </table>
            <br>
 <table style="border: 1px solid black;" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                    <tr>
                        <td>This is an electronically generated receipt, hence no signature required.</td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px;">© 2013 - 2023 by NPS Yeshwanthpur.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
