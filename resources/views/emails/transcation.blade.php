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
        Please find attached the Registration Form with Admit Card and Registration Fee receipt.<br/>
        The entrance test dates will be posted on the Website and will also be emailed to you. <br/>
        <b>Points to be noted on the day of Entrance.</b><br/>
        <ol type="1">
            <li>Hard copy of the Online Registration form with supporting documents should be submitted. The copies of supporting documents mentioned below should be attested by both the parents before submission.</li>
            <ol type="a">
                <li>Birth certificate of the student</li>
                <li>Class 2 & above applicants should provide previous 2 years academic progress report and current Year Mid-term report card. Class 1 applicants should submit Study Certificate from the previous school.</li>
                <li>Student’s Aadhar Card</li>
                <li>Parents’ Aadhar Card</li>
                <li>If your child is a Foreign National then please submit a copy of your ward's passport attested by both parents.</li>
            </ol>
            <li>Students should carry the print out of the admit card.</li>
            <li>Students should be accompanied by only one parent.</li>
            <li>Students to carry a pencil pouch with 1 pen, 2 sharpened pencils, eraser and ruler. </li>
            <li>No writing pads to be carried inside the exam hall.</li>
            <li>Students should carry their own water bottles.</li>
            <li>Students who have cleared the entrance test will receive a mail regarding the interaction session with the Principal. Interaction session should be attended by both the parents along with their ward(s).</li>
        </ol>
       <br/>
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
