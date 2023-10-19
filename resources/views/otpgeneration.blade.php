
<form id="myForm" action="{{ url('paytm-payment') }}" enctype="multipart/form-data">
<input type="hidden" id="appli_id" name="appli_id" value="<?php echo $_GET['appli_id']; ?>">
<input type="submit" value="Submit">
</form>

<script>
  setTimeout(function() {
    document.getElementById("myForm").submit();
  }, 200); // 2000 milliseconds = 2 seconds
</script>