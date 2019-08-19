<?php 
	include_once 'header.php';
	include_once '../../config/database.php';
	include_once '../../classes/userClass.php';
?>
<!doctype html> 
<html>
<head>
	<title>Update Password</title>
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
	width:45%;
}
.row:after{
	content: "";
	display:table;
	clear:both;
}
.container{
	position: absolute;
    height: 200px;
    width: 400px;
    margin: -100px 0 0 -200px;
    top: 30%;
    left: 55%;
}
}
.divIdNum{
	float: left;
	display: block;
}
.addressInput{
	font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out
}
.idNumTypeDiv{
	display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap;-webkit-box-align:center;-ms-flex-align:center;align-items:center;margin-bottom:0
	clear:left;
	margin-bottom:1rem
}
.divIdType{
	float: left;
}
.divIdNum input.idNumClass{
	display: block; width:80%; clear: both; font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out
	
}
.staffTypeSelect{
	display: block; width:40%; clear: both; font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out
}
.monthSelect, .dateSelect, .yearSelect{
	font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out
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
	display: block; width:50%; clear: both; font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out
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
    width: 50%;
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
	<div class="container">
	<form method="post" action = "updatePassword.php" id="userform">
	<table id="regist" cellspacing="0">
		<div class="form-group">
		<label><b>Password</b></label><br>
		<?php
			$database = new Database();
			$db = $database->getConnection();
			$userInfo = new UserClass($db);

			if(isset($_POST['change'])){
				$userInfo->oldPass = $_POST['oldPass'];
				$userInfo->newPass = $_POST['newPass'];
				if($userInfo->checkPass()) {
					if($_POST['retypeNewPass']==$_POST['newPass']){
					if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["newPass"]) === 0){
						echo '<br/><div class="alert alert-danger" role="alert">Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit</div>';
					}
					else{
					if($userInfo->changePass()){
						echo '<div class="alert alert-warning" role="alert">Password successfuly changed!</div>';
					}
					else
						echo '<div class="alert alert-warning" role="alert">Failed!</div>';
					}
				}
				else
						echo '<div class="alert alert-danger" role="alert">Passwords dont match</div>';
				}
				else
					echo '<div class="alert alert-danger" role="alert">You have entered an incorrect old password</div>';	
			}
			?>
		<input class="form-control" type="password" name="oldPass" placeholder="Enter old password" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="newPass" placeholder="Enter new password" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="password" name="retypeNewPass" placeholder="Retype password" required>
		</div>
		<div class="form-group">
		  <button type="submit" class="btn btn-danger" onClick=promptMe() name="change">SUBMIT</button>
		</div>
	</div>
	</form>
	</table>
    </div>
</body>
</html>
