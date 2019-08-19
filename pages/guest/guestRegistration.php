<?php
	session_start();
  $page_title = "Guest Registration";
  include_once "../../config/database.php";
  include_once "../../classes/userClass.php";
  include_once 'header2.php';

  	$database = new Database();
	$db = $database->getConnection();
	
	$user = new UserClass($db);
	
	
?>


<script>
    function myFunction() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        if (pass1 != pass2) {
            alert("Passwords Do not match");
            document.getElementById("pass1").style.borderColor = "#E34234";
            document.getElementById("pass2").style.borderColor = "#E34234";
        }
        else {
            alert("Passwords Match!!!");
        }
    }
</script>
<!doctype html> 
<html>
<head>
	<title>Guest Registration System</title>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="assets/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="assets/jquery/3.2.1/jquery-3.2.1.slim.min.js"></script>
	<script src="assets/popper.js/1.12.9/umd/popper.min.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
</br>
</br>
	<div class="row">
	<div class="col lg-1">
	</div>
	<div class="col lg-10">
	<div class="card center" style="width: 82rem;">
<div style="margin-left: 8.1%;">
<img class = "topImg" src="../../assets/images/regHeader2.png" alt="Registration Header" width="100%" height="50">
</div>      
</br>
</br>

	<form method="post" action = "guestRegistration.php">
	<table id="regist" cellspacing="0">
	<div class="row">
		
		<div class="col lg-12">
		<label><b><center>Name</center></b></label>
		<div class="row">
			<div class = "col lg-6">
				<input class="form-control" type="text" name="FirstName" placeholder="First Name*" required autofocus><br>
			</div>
			<div class="col lg-3">
				<input class="form-control" type="text" name="MiddleName" placeholder="Middle Name">
			</div>
			<div class="col lg-3">
				<input class="form-control" type="text" name="LastName" placeholder="Last Name*" required>
			</div>
		</div>	
		</div>


	</div>
	<div class="row">
	<div class="col lg-4">
		
		<div class="form-group">
		<label><b>Contact Number</b></label><br>
		<input class="form-control" type="text" name="ContactNumber" min="12" placeholder="(+639)" required>
		</div>
	</div>
	<div class="col lg-8">
	<label><b>Birthdate</b></label>
		<div class="form-group row">
			<div class="col lg-4">
			<select name="bdate_month" class="form-control" id="month">
			<?php
				$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
							
									for($n=0; $n<count($months); $n++){
									echo '<option value="'.($n+1).'">'.$months[$n].'</option>';
									};
			?>
		</select>
			</div>
			<div class="col lg-4">
			<select name="bdate_day" class="form-control" id="date">
			<?php
				
				for($n=1; $n<=31; $n++){
										echo '<option value="'.$n.'">'.$n.'</option>';
									};
			?>
		</select>
			</div>
			<div class="col lg-4">
			<select name="bdate_year" class="form-control" id="year">
			<?php
				$Startyear=date('Y');
									$endYear=$Startyear-70;
									$yearArray = range($Startyear,$endYear);
								
									foreach ($yearArray as $year) {
										$selected = ($year == $Startyear) ? 'selected' : '';
										echo '<option value="'.$year.'">'.$year.'</option>';
									};
			?>
		</select>
	</div>
	</div>
	</div>
	</div>
	<div class="row">
		<div class="col lg-6">
		
			</div>
		</div>
		<div class="form-group">
		
		</div>
		<div class="form-group">
		<label><b>Address</b></label><br>
		<div class="row">
		<div class="col lg-3">
		<input class="form-control" type="text" name="address" placeholder="Address Line 1" >
		</div>
		<div class="col lg-3">
		<input class="form-control" type="text" name="city" placeholder="City" >
		</div>
		<div class="col lg-3">
		<input class="form-control" type="text" name="country" placeholder="Country" >
		</div>
		<div class="col lg-3">
		<input class="form-control" type="text" name="zipCode" placeholder="Zip Code" >
		</div>
		</div>
		</div>
		</div>
		<div class = "row">
		<div class="col lg-4">
		<label><b>Gender</b></label><br>
		<select name="Gender" class="form-control">
		<option>Male</option>
		<option>Female</option>
		</select>
		</div>
		<div class="col lg-8">
		<label><b>Email Address</b></label><br>
		<input class="form-control" type="text" name="EmailAddress" placeholder="example@provider.com" required>
		</div>
		</div>
		<div class="row">
		<div class="col lg-6">
		<label><b>Username</b></label><br>
		<input class="form-control" type="text" name="Username" required>
		</div>
		<div class="col lg-6">
		
		</div>
		</div>
		<div class="row">
		<div class="col lg-6">
		<label><b>Password</b></label><br>
		<input class="form-control" type="password" name="pass1" placeholder="Enter password" minlength="8" required>
		</div>
		<div class="col lg-6">
		
		</div>
		</div>
		</br>
		<div class="row">
		<div class="col lg-6">
		<input class="form-control" type="password" name="pass2" placeholder="Retype password" minlength="8" required>
		</div>
		
		<div class="col lg-6">
		<button class="btn btn-danger form-control" type="submit" name="register">Register</button>
		</div>
		</div>
		</div>
			<input type="hidden" value="guest" name="UserType">
<!--<div class="form-group">
		<label><b>Upload Image:</b></label><br>
		<input type="image" name="size" value="1000000">
		<input type="file" name="userPhoto">
		</div>-->
	</form>
	</table>
    </div>
	<div class="col lg-1">
	</div>
	</div>

</body>
</html>


<?php

if(isset($_POST['register'])){
	
		//$image = $_FILES['userPhoto']['name'];
		// image file directory
		//$target = basename($image);
		//$ext = pathinfo($target, PATHINFO_EXTENSION);
		//$fullFileName = $target;
		
		$user->FirstName = $_POST['FirstName'];
		$user->MiddleName = $_POST['MiddleName'];
		$user->LastName = $_POST['LastName'];
		$user->Gender = $_POST['Gender'];
		$user->ContactNumber = $_POST['ContactNumber'];
		$user->UserName = $_POST['Username'];
		$user->EmailAddress = $_POST['EmailAddress'];
		$user->pass2 = $_POST['pass1'];
		$user->Birthdate = $_POST['bdate_year']."-".$_POST['bdate_month']."-".$_POST['bdate_day'];
		$user->Address = $_POST['address'].", ".$_POST['city'].", ".$_POST['country'].", ".$_POST['zipCode'];
		//$user->UserPhoto = $fullFileName;
		$user->UserType = "guest";
		
		$_SESSION['lastname'] = $_POST['LastName'];
		$_SESSION['firstname'] = $_POST['FirstName'];
		$_SESSION['middlename'] = $_POST['MiddleName'];
		$_SESSION['birthdate'] = $_POST['bdate_year']."-".$_POST['bdate_month']."-".$_POST['bdate_day'];
		$_SESSION['gender'] = $_POST['Gender'];
		$_SESSION['contactnumber'] = $_POST['ContactNumber'];
		$_SESSION['address'] = $_POST['address'].", ".$_POST['city'].", ".$_POST['country'].", ".$_POST['zipCode'];
		$_SESSION['email'] = $_POST['EmailAddress'];
		$_SESSION['number'] = "10";
		$_SESSION['unit'] = "2";
		if($user->createUser()){
			$message = "Successfully Registered! You may now login";
			echo "<script type='text/javascript'>alert('$message');</script>";
			echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index_.php">';
		}
		else
			echo "Failed";
	}
	else if(isset($_POST['cancel'])){
		header("Location: index_.php");
	}
?>