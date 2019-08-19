<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header2.php';
	include_once '../../config/database.php';
	include_once '../../classes/studentClass.php';
	
	//$testPass = "iloveusa";
	//$unhashedPass = rand(999, 999999);
	//$hashedPass = md5($testPass);
	//echo $hashedPass;
?>


<html>
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
			<div class="card center" style="width: 18rem;">
			<div class="card-body center">
	<form method="POST" action="accountActivation.php">
    <h5 class="card-title text-danger">Forgot Password </h5>
	<?php
			if($_POST){
			$database = new database();
			$db = $database->getConnection();

			$student = new Student($db);
			
			$student->userEmail = $_POST['userInput'];
			
			if($student->confirm()){
				if($student->checkEmailExisting()==false){
				$randomCode = rand(100000, 999999);
				$student->sixDigitCode = $randomCode;
				$student->setId();
				$student->saveCode();
				$student->sendEmail();
				header("Location: informUser.php");
				}
				else
					header("Location: informExistingEmail.php");
			}
			else
				echo '<div class="alert alert-danger" role="alert">Incorrect email or password</div>';
			}
			?>
    <div class="row fixed-center">
    <div class="col lg-12">
    <label class="text-danger">Email/Phone </label>
    <input class="form-control" type="text" name="userInput" placeholder =""/>
    </div>	
    </div>
    <p class="card-text"></p>
    <button class="btn btn-success fixed-center form-control" type="submit">Submit</button>	
	</form>
</div>
		</div>
	</div>
	<div class="col lg-1">
	</div>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>
<?php
include_once 'footer.php';
?>
</html>
