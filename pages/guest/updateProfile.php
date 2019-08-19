<?php

	include_once 'header.php';
	include_once '../../config/database.php';
	include_once '../../classes/userClass.php';
	
	//$userInfoId = isset($_GET['doctorId']) ? $_GET['doctorId'] : die ('ERROR: missing ID.');
	$database = new Database();
	$db = $database->getConnection();

	$userInfo = new UserClass($db);
	$userInfo->readOneUser();
	$url = 'index.php';
	
	$arr_address = array();
	
	$stmt = $userInfo->extractAddress(); 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$mark= explode(', ', $row['Address']);//what will do here
		foreach($mark as $out) {
			$arr_address[] = $out;
			}
		} 
	
	
	if(isset($_POST['Update'])){
		$userInfo->FirstName = $_POST['FirstName'];
		$userInfo->MiddleName = $_POST['MiddleName'];
		$userInfo->LastName = $_POST['LastName'];
		$userInfo->Birthdate = $_POST['bdate_year']."-".$_POST['bdate_month']."-".$_POST['bdate_day'];
		$userInfo->Gender = $_POST['Gender'];
		$userInfo->EmailAddress = $_POST['EmailAddress'];
		$userInfo->ContactNumber = $_POST['ContactNumber'];
		$userInfo->Username = $_POST['Username'];
		$userInfo->Address = $_POST['address'].", ".$_POST['city'].", ".$_POST['country'].", ".$_POST['zipCode'];
		
		if($userInfo->updateUser()){
			echo "<script type='text/javascript'>alert('Changes Successful');</script>";
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; guestHomepage.php">';
		}
		else{
			echo '<div class="alert alert-warning" role="alert">Failed!</div>';
		}
	}
?>

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
<style type="text/css">
body{
	color: #bb2b2c;
}
.column{
	float:left;
	width:35%;
}
.row:after{
	content: "";
	display:table;
	clear:both;
}
  
button {
    background-color: #4f69bb;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.modal-header {
    padding:9px 15px;
    background-color: #0480be;
     border-top-left-radius: 6px;
    border-top-right-radius: 6px;
    -webkit-border-top-left-radius: 6px;
    -webkit-border-top-right-radius: 6px;
    -moz-border-radius-topleft: 6px;
    -moz-border-radius-topright: 6px;
 }
 .modal-footer {
    padding:9px 15px;
    background-color: #0480be;
 }
.buttonRow{
 float: right;
 margin-left: -50%;
 }
 td
{
    padding:0 15px 0 15px;
}
/* Full-width input fields */
input[type=text], input[type=password]{
    width: 50%;
    padding: 5px 5px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
select{
    padding: 5px 5px;
    margin: 1px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.gender{
	width: 50%;
}

/* Set a style for all buttons */
button {
    background-color: #4f69bb;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: .8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: 60%;
    padding: 10px 18px;
    background-color: #c71d00;
	border-radius: 9px;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
             
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 15px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #d60707;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;

}

</style>
<div style="text-align: center;">
<h3>Update Profile</h3>
</div>      
	<div class="container">
	<form method="post" action = "updateProfile.php">
	<table id="regist" cellspacing="0">
	
	<div class = "row">
		<div class = "column">
		<div class="form-group">
		<label><b>Name</b></label><br>
		<input class="form-control" type="text" name="FirstName" placeholder="First Name" value="<?php echo $userInfo->FirstName; ?> " required><br>
		<input class="form-control" type="text" name="MiddleName" placeholder="Middle Name" value="<?php echo $userInfo->MiddleName;?>">
		<input class="form-control" type="text" name="LastName" placeholder="Last Name" value="<?php echo $userInfo->LastName;?>" required>
		</div>
		<div class="form-group">
		<label><b>Birthdate</b></label><br>
		<select name="bdate_month" id="month" required>
			<?php
									$statement = $userInfo->extractMonth();
									while($row = $statement->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
									for($n=0; $n<count($months); $n++){
										if($n!=($row['userMonth']-1))
											echo '<option value="'.($n+1).'">'.$months[$n].'</option>';
										else
											echo '<option value="'.($n+1).'" selected>'.$months[$n].'</option>';
									};
									}
								?>
		</select>
		<select name="bdate_day" id="date" required>
			<?php
				
				$statement = $userInfo->extractDate();
									while($row = $statement->fetch(PDO::FETCH_ASSOC)){
									extract($row);
									for($n=1; $n<=31; $n++){
										if($n!=($row['userDate']))
											echo '<option value="'.$n.'">'.$n.'</option>';
										else
											echo '<option value="'.$n.'" selected>'.$n.'</option>';
									};
									}
			?>
		</select>
		<select name="bdate_year" id="year" required>
		<option selected>Year</option>
			<?php
									$Startyear=date('Y');
									$endYear=$Startyear-70;
									$yearArray = range($Startyear,$endYear);
									$statement = $userInfo->extractYear();
									while($row = $statement->fetch(PDO::FETCH_ASSOC)){
									extract($row);
								
									foreach ($yearArray as $year) {
										if($year!=$row['userYear'])
											echo '<option value="'.$year.'">'.$year.'</option>';
										else
											echo '<option value="'.$year.'" selected>'.$year.'</option>';
									};
									}
								?>
		</select>
		</div>
		<div class="form-group">
		<label><b>Gender</b></label><br>
		<select name="Gender" class="gender" required>
		<option>Choose Gender</option>
			<?php
						if($userInfo->Gender=='Male'){
							echo "<option selected>Male</option>
							<option>Female</option>";
						}
						else{
							echo "<option selected>Female</option>
							<option>Male</option>";
						}
					?>
		</select>
		</div>
		<div class="form-group">
		<label><b>Address</b></label><br>
		<input class="form-control" type="text" name="address" placeholder="Address Line 1" value="<?php echo $arr_address[0]; ?>" required>
		<input class="form-control" type="text" name="city" placeholder="City" value="<?php echo $arr_address[1]; ?>" required>
		<input class="form-control" type="text" name="country" placeholder="Country" value="<?php echo $arr_address[2]; ?>" required>
		<input class="form-control" type="text" name="zipCode" placeholder="Zip Code" value="<?php echo $arr_address[3]; ?>" required>
		</div>
		
		</div>
		
		<div class = "column">
		<div class="form-group">
		<label><b>Contact Number</b></label><br>
		<input class="form-control" type="text" name="ContactNumber" min="12" placeholder="(+639)" value="<?php echo $userInfo->ContactNumber;?>" required>
		</div>
		<div class="form-group">
		<label><b>Email Address</b></label><br>
		<input class="form-control" type="text" name="EmailAddress" placeholder="example@provider.com" value="<?php echo $userInfo->EmailAddress;?>" required>
		</div>
		<div class="form-group">
		<label><b>Username</b></label><br>
		<input class="form-control" type="text" name="Username" value="<?php echo $userInfo->Username; ?>" required>
		</div>
		
		<div>
		<div class="form-group">
		<label><b>Upload Image:</b></label>
		<input type="image" name="size" value="1000000">
		<div>
		  <input type="file" name="userPhoto">
		</div>
		</div>
		</div>
<div class="form-group">
		<input type="hidden" name="UserType" value="guest" required>
		</div>
		<div class="form-group">
		  <button class="btn btn-danger" type="submit" name="Update">Update</button>
		</div>
</div>
		
		
	</div>
	</form>
	</table>
    </div>
</body>
</html>