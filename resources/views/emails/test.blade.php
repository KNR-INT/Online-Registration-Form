<!DOCTYPE html>
<html>
<?php 
$school_details = DB::connection('secondary')->table('schooldetails')->get();
$school_logo = $school_details[0]->schoollogo;
$base_url = $school_details[0]->base_url;
$school_logo_url = $base_url . $school_logo;
?>
<body style="justify-content: center;">
    <div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;line-height:2">
        <div style="margin:50px auto;width:70%;padding:20px 0">
        <div class="container-fluid" style="display: flex; align-items: center;">
        <img src="leapknr-demo-school.knrint.com/uploads_backup/KNR_LOGO_TM.jpg" alt="KNR" style="width: 110px; height: 80px;">
        </div>
        <p style="font-size:1.1em"><b>Dear Parent</b><br> </p>
        <p style="font-size:1.1em">
        Greetings from <?php echo $school_details[0]->schoolname ?>!<br>
        Use the following OTP to complete your Sign Up procedures. OTP is valid for 1 minute. 
        <br>
        OTP : {{ $otp_number }} <br>
        Incase of any issues please email to knrintind@gmail.com
        </p>
        <p style="font-size:1.1em">Regards,<br>
        Administration (Admissions Department)<br>
        <?php echo $school_details[0]->schoolname ?></p>        
        </div>
        <hr>
        <div>
        This is an auto generated message, please do not reply to this email address
        </div>
        </div>
    
</body>
<style>
           /* .container-fluid {
            margin: 50px auto;
            width: 70%;
            padding: 20px 0;
          } */

          /* .center_image {
                display: block;
                margin-left: 30px;
                margin-right: auto; } */
</style>
</html>
