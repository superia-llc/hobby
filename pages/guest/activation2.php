<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header4.php';
	include_once '../../config/database.php';
	include_once '../../classes/studentClass.php';

	$database = new database();
	$db = $database->getConnection();

	$student = new Student($db);

	
	
	
?>


<html>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  


  <div class="card center" style="width: 30rem;">
  <div class="card-body center">

   <h5 class="card-title text-danger">Acccount Activation</h5>
    <div class="row fixed-center">
    <div class="col lg-12">
    <h4 class="text-danger">Hi User, just one more step! We just need to verify your email address or phone number to complete your registration.</h4>
    </div>	
    </div>
    </br>
    <div class="row">
    <div class="col lg-1">
    </div>
    <div class="col lg-4">
    <button class="btn btn-success fixed-center form-control" type="submit" data-toggle="modal" data-target="#myModal">Verify Email</button>
	</div>
	<div class="col lg-2">
	</div>
	<div class="col lg-4">
   	
   	</div>
   	<div class="col lg-1">
   	</div>
   	</div>
  	



	</div>
	</div>
	</div>
<div class="col lg-1">
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">

    <div class="col lg-2">
	</div>
	<form method="POST" action="activation2.php">
	<div>
		<label class="text-danger" style='display:inline-block;margin-left: 1.5em;'>Enter a 6-digit code</label>
		</br>
    	<input class="border-top-0 border-right-0 border-bottom-0 border-left-0" name="codeInput" type="text" style='font-size: 1.9em;width:6em;letter-spacing: 10px;margin-left: 0.5em;' maxlength="6" placeholder =" ______"/>
    	</br>
		<br/>
		<button class="btn btn-success fixed-center form-control" type="submit" name="activate">Activate</button>
	</div>
	</form>
	<?php 
		if(isset($_POST['activate'])){	
			$student->codeInput = $_POST['codeInput'];
			if($student->validateCode()){
			$student->setVerified();
			//echo '<div class="alert alert-warning" role="alert">Passed!</div>';
			header("Location: index.php");
		}
		else
			echo "<script type='text/javascript'>alert('Please enter a valid code')</script>";
	}
	?>
	<div class="col lg-4">
   	</div>

   	</div>
  	
      </div>
    </div>

  </div>
</div>
</html>
