<!DOCTYPE html>
<html>
<?php 
$school_details = DB::connection('secondary')->table('schooldetails')->get();
$school_logo = $school_details[0]->schoollogo;
$base_url = $school_details[0]->base_url;
$school_logo_url = $base_url . $school_logo;
?>
<head>
    <!-- <title>OTP for Login</title> -->
</head>
<body style="justify-content: center;">
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;line-height:2">
        <div style="margin:50px auto;width:70%;padding:20px 0">
        <div class="container-fluid" style="display: flex; align-items: center;">
        <img src="leapknr-demo-school.knrint.com/uploads_backup/KNR_LOGO_TM.jpg" alt="KNR" style="width: 80px; height: 80px;">
        </div>
        <p style="font-size:1.1em"><b>Dear Parent</b><br> </p>
        <p style="font-size:1.1em">
        Greetings from <?php echo $school_details[0]->schoolname ?>!<br/>
        Please find attached the Registration Form and Registration Fee receipt.<br/>
        The admissions team will review your application and schedule the interaction with the Principal within 21 days. The School has the right to reject the application in case of any discrepancy found.</b><br/>
        <ol type="1">
            <li>Hard copy of the Online Registration form with supporting document should be submitted. The copies of supporting documents mentioned below should be attested by both the parents before submission.</li>
            <ol type="a">
                <li>Birth certificate of the student</li>
                <li>Marks card / Study Certificate of previous years (if applicable)</li>
                <li>Student’s Aadhar Card</li>
                <li>Parents’ Aadhar Card</li>
                <li>If your child is a Foreign National then please submit a copy of your ward's passport attested by both parents.</li>
            </ol>
            <li>Student should be accompanied by both parents (Compulsory).</li>
        </ol>
        In case of any issues please mail to knrintind@gmail.com<br/></p>
        <p style="font-size:1.1em">Regards,<br>
        Admin<br>
        <?php echo $school_details[0]->schoolname ?></p>        
        </div>
        <hr>
        <div>
        This is an auto generated message, please do not reply to this email address
        </div>
        </div>
</body>
</html>
