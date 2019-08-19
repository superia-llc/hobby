<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header4.php';
	include_once '../../config/database.php';
	include_once '../../classes/studentClass.php';
	include_once 'header2.php';

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
	<div class="row">


		<div class="col lg-1">
		</div>



		<div class="col lg-10">


		<form method="POST" action="activation.php">
			<div class="card center" style="width: 40rem;">

 				<div class="card-body center">
    			
    			<h5 class="card-title text-danger"><center><b>Sorry!</b></center></h5>
    			
    			<div>
    				<div class="col lg-2">
    				</div>
    			
    				
   					<h5 class="text-danger">The email address that you've entered has already been used for this function. Please wait 5 minutes before resetting your password again.</h5>
    			
    			</div>
    			
    		</div>	
  	
		</div>
</form>



	</div>



	<div class="col lg-1">
	</div>




</div>
</html>
