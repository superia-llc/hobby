<?php
  $page_title = "Guest Update Profile";
?>
<!doctype html> 
<html>
<head>
	<title>Guest Update</title>
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
<div style="margin-left: 8.1%;">
<!--<img class = "topImg" src="images/regHeader2.png" alt="Registration Header" width="85%" height="50">-->
</div>      
	<div class="container">
	<form method="post" action = "viewProfile.php" id="userform">
	<table id="regist" cellspacing="0">
	
	<div class = "row">
		<div class = "column">
		<div class="form-group">
		<label><b>Name</b></label><br>
		<input class="form-control" type="text" name="firstName" placeholder="First Name" required><br>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="middleName" placeholder="Middle Name" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
		</div>
		<div class="form-group">
		<label><b>Birthdate</b></label><br>
		<select id="month">
			<option value="January">January</option>
		</select>
		<select id="date">
			<option>01</option>
		</select>
		<select id="year">
			<option>2000</option>
		</select>
		</div>
		<div class="form-group">
		<label><b>Gender</b></label><br>
		<select class="gender">
			<option>Female</option>
			<option>Male</option>
		</select>
		</div>
		<div class="form-group">
		<label><b>Address</b></label><br>
		<input class="form-control" type="text" name="addressLine" placeholder="Address Line 1" required>
		<input class="form-control" type="text" name="city" placeholder="City" required>
		<input class="form-control" type="text" name="country" placeholder="Country" required>
		<input class="form-control" type="text" name="zipCode" placeholder="Zip Code" required>
		</div>
		<div class="form-group">
		<label><b>Contact Number</b></label><br>
		<input class="form-control" type="text" name="contactNumber" placeholder="(+639)" required>
		</div>
		</div>
		
		<div class = "column">
		</br>
		</br>
		</br>
		</br>
		<div class="form-group">
		<label><b>Email Address</b></label><br>
		<input class="form-control" type="text" name="emailAddress" placeholder="example@provider.com" required>
		</div>
		<div class="form-group">
		<label><b>Username</b></label><br>
		<input class="form-control" type="text" name="username" required>
		</div>
		<div class="form-group">
		<label><b>Password</b></label><br>
		<input class="form-control" type="text" name="password" placeholder="Enter password" required>
		</div>
		<div class="form-group">
		<input class="form-control" type="text" name="retypePassword" placeholder="Retype password" required>
		</div>
		<div class="form-group">
		  <button type="submit" href="viewProfile.php" class="btn btn-danger">SUBMIT</button>
		</div>
		</div>
		<div>
		<div class="form-group">
		<label><b>Upload Image:</b></label><br>
		<input type="hidden" name="size" value="1000000">
		<div>
		  <input type="file" name="image">
		</div>
		</div>
		</div>
	</div>
	</form>
	</table>
    </div>
</body>
</html>
