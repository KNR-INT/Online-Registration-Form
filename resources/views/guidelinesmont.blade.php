<!DOCTYPE html>
@include('header')
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=0.5">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <body style="background-color: #ffffff; font-family: Arial, sans-serif; font-size: 15px;">
<!-- <div> -->
<div class="justify-content-center" style="margin-top:50px; margin-left: 50px;">
		<div class="container-fluid">
				&nbsp;
				&nbsp;
				&nbsp;
				&nbsp;
				&nbsp;
				&nbsp;
				&nbsp;
      <center><h2><b>GUIDELINES AND CONTACT DETAILS</h2></center>
        <br>
         <h3><b>ADMISSIONS</b></h3>
        <br>
        <p>Welcome to National Public School, Yeshwanthpur. </p>

        <p>We are an educational institution that prepares students for a rapidly changing world by nurturing the required skill sets, instilling a global perspective and inculcating core values of respect, honesty, loyalty, perseverance and compassion. </p>
        
        <p>Admission to National Public School, Yeshwanthpur, is open to all children from Montessori (I-5 Academy), Pre-K, Kindergarten and Classes 1 to 9 & 11.</p>
    
        <h5><b>Kindly note the age criteria as on 1st June 2024:</b></h5>
        <ul>
            <li>For Montessori I and Pre-K registration, the student should have completed 3 years.</li>
            <li>For Montessori II and Kindergarten I registration, the student should have completed 4 years</li>
            <li>For Montessori III and Kindergarten II registration, the student should have completed 5 years.</li>
            <li>For Class 1 registration, the student should have completed 6 years.</li>
        </ul>
        <h6><b>Please ensure that Student and Parent Names entered in the registration form should be as per the Birth Certificate (For Class 1 and below) or as mentioned in the student’s current school records (For Classes 2 and above). Incomplete forms will be rejected.</b></h6>
        
        <h6><b>Download the completed Registration form and submit the printout along with the parent attested copies of the following documents on the day of interaction (for pre-primary) and on the day of entrance test (For Class 1 to 9 & 11) :</b></h6>
  
        <ul>
            <li>Student’s Birth Certificate.</li>
            <li>Immunisation Card  (applicable to Class 1 and below)</li>
            <li>Class 2 & above applicants should provide previous 2 years academic progress report and current Year Mid-term report card. Class 1 applicants should submit Study Certificate from the previous school.</li>
            <li>Student’s Aadhar Card.</li>
            <li>Parents’ Aadhar Card.</li>
            <li>If your child is a Foreign National then please submit a copy of your ward's passport attested by both parents.</li>
            <li>Recent Passport size photo of the student.</li>
            <!--<li></li>-->
        </ul>

        <p>Registration fee - Rs <?php echo $registrationFee ?>(non-refundable to be paid online)</p>
        <p>We appreciate the interest evinced by the parents seeking admission at National Public School, Yeshwanthpur. We would like to inform that we have very limited seats available for admission to all the classes from Classes 1 to 9 and 11. The seats will be available in the open category according to the priority list given below:</p>

        <ul>
            <li>The first priority is for siblings.</li>
            <li>The second priority is for children of our teachers and other staff members.</li>
            <li>Priority for admission is also listed for Alumni of National Public School.</li>
            <li>Subsequent seats will be open to others.</li>
            <li><b>Admission to classes 1-9 are based on vacancies available.</b></li>
            <li><b>Admission for Registration to classes 10 & 12 are based on Interstate transfer.</b></li>
        </ul>

        <p>To have an effective teaching & learning process, we maintain a limited class strength.  Considering the limited number of seats available, it is expected that those who seek admission will realise and understand the constraints the institution faces.  </p>

        <p>Admission to classes 1 to 9 & 11 are finalized based on the performance in the written entrance test. Entrance test dates will be announced on the website in the first week of November and emailed to the applicant’s registered email id.</p>
         <p><b>
            <br/>
         Address for Communication :</b>
            <br/>
            <br/>
            <b>NATIONAL PUBLIC SCHOOL</b>
            <br/>
            #9/1, Pipeline Road, Raghavendra Layout 
            <br/>
            (Behind RNS Motors)
            <br/>
            Yeshwanthpur
            <br/>
            Bangalore – 560 022
            <br/>
            Phone: +91-080-23571220 / 29501184<br/>
            +91-6364071122  <br/>
            Email:admissions@npsypr.edu.in<p>

            <div class="icheck-primary d-inline">
            <input type='checkbox'  id="checkbox" name = "checkbox"> 
<label for="checkbox">
I Agree
</label>
</div>
<br>

<div>
	<input type="hidden" id="class" value="<?php echo $_GET['class']; ?>">
	<input type="hidden" id="appli_id" value="">

<?php 
	$class = $_GET['class'];
?>
<button class=" btn btn-primary" onclick="window.location.href = '{{ url ('dashboard')}}'" value=" $email = User::where('id',$id)->email();">Go to Home</button>
    <!-- <a href="{{ url ('dashboard')}}" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Home</span></a> -->
       <button  DISABLED class="btn btn-submit btn-primary" id="btn1" >Continue </button>
         </div>
		</div>
	</div>
    <script>
  $('#checkbox').click(function() {
        if ($(this).is(':checked')) {
		let class_name = document.getElementById("class").value;

        		$('#btn1').removeAttr('disabled');
        		$('#checkbox').attr('disabled', 'disabled');

			   $.ajax({
                                   url: "{{ url('create-id') }}",
                                   type: "GET",
                                   data: {
                                        class_name: class_name,
                                   },
                                   dataType: 'json',
                                   success: function(response) {
								        // alert(response);
                                        document.getElementById("appli_id").value = response;
                                   }
                              });
            
        } else {
            $('#btn1').attr('disabled', 'disabled');
        }
    });

	$('.btn-submit').click(function() {
        let class_name = document.getElementById("class").value;
        let appli_id = document.getElementById("appli_id").value;
        if(!appli_id){
            window.location.reload();
        }
	//  alert(appli_id);
		window.location.href = "{{ url('onlinereg') }}/a?class="+class_name+"&appli_id="+appli_id;
    });
</script>

</body>

</html>
@include('footer')

<?php

?>


        <!-- <?php
                // $session = session()->all();
            
                // print_r($session);?> -->