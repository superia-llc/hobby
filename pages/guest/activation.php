<?php 
	session_start();
	$page_title = "Firmd Vacation House";
	include_once 'header4.php';
	include_once '../../config/database.php';
	include_once '../../classes/studentClass.php';
	include_once 'header2.php';

	$database = new database();
	$db = $database->getConnection();

	$student = new Student($db);
	
	if($_GET['access']!=$_SESSION['encryptedEmail']){
	header("Location: index.php");
	}
	
	$linkHash = $_GET['access'];
	
?>


<html>
</br>
</br>
</br>
</br>
	<div class="row">


		<div class="col lg-1">
		</div>



		<div class="col lg-10">


		<form method="POST" action="activation.php?access=<?php echo $linkHash; ?>">
			<div class="card center" style="width: 40rem;">

 				<div class="card-body center">
    			
    			
    			<div class="row fixed-center">
    				<div class="col lg-2">
    				</div>
    			
   					<h5 class="text-danger">Enter the 6-digit code sent to your email</h5>
    				<div class="col lg-2">
					
    				</div>
    			
    			</div>
    			<div class="row">
    				<div class="col lg-1">
					
    				</div>
    				<div class="col lg-10">
    				<input class="border-top-0 border-right-0 border-bottom-0 border-left-0" name="codeInput" type="text" style='font-size: 1.9em;width:6em;letter-spacing: 13px;margin-left: 0.5em;' maxlength="6" placeholder ="______"/>
    				</div>
    				<div class="col lg-1">
    				</div>
    			</div>
				<?php
					if(isset($_POST['confirm'])){
						if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["newPass"]) === 0){
							echo '<br/><div class="alert alert-danger" role="alert">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</div>';
						}
						elseif($_POST['newPass']==$_POST['confirmPass']){
							$database = new database();
							$db = $database->getConnection();

							$student = new Student($db);
							
							$student->newPass = $_POST['newPass'];
							$student->codeInput = $_POST['codeInput'];
							
							if($student->validateCode()){
								if($student->changePassword()){
									echo '<div class="alert alert-warning" role="alert">Password successfuly changed!</div>';
									//header("Location: index.php");
								}
								else
									echo '<div class="alert alert-warning" role="alert">Failed!</div>';
							}
							else
								echo '<br/><div class="alert alert-danger" role="alert">Incorrect code</div>';
						}
						else
							echo "<br/><div class='alert alert-danger' role='alert'>Passwords don't match</div>";
					}
				?>
   			 	<div class="row fixed-center">
				
    				<div class="col lg-12">
					
    					<label class="text-danger">New Password </label>
    					<input class="form-control" name="newPass" type="password" placeholder =""/>
    				</div>	
    			</div>
    			
    			<div class="row fixed-center">
    				<div class="col lg-12">
    					<label class="text-danger">Confirm Password </label>
    					<input class="form-control" name="confirmPass" type="password" placeholder =""/>
    				</div>	
    			</div>
    				</br>
    				<button class="btn btn-success fixed-center form-control" type="submit" name="confirm">CONFIRM</button>
    		</div>	
  	
		</div>
</form>



	</div>



	<div class="col lg-1">
	</div>




</div>
</html>
