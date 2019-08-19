<?php

include_once 'header.php';
include_once '../../config/database.php';
include_once '../../classes/userClass.php';
//$UserID = isset($_GET['UserID']) ? $_GET['UserID'] : die ('ERROR: missing ID.');

$database = new Database();
$db = $database->getConnection();

$userInfo = new UserClass($db);
$userInfo->readOneUser();
$url = 'viewProfile.php';
$arr_address = array();
	
	$stmt = $userInfo->extractAddress(); 
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$mark= explode(', ', $row['Address']);//what will do here
		foreach($mark as $out) {
			$arr_address[] = $out;
			}
		}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="assets/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="assets/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="assets/jquery/3.2.1/jquery-3.2.1.slim.min.js"></script>
	<script src="assets/popper.js/1.12.9/umd/popper.min.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
var btn = document.getElementById('updatePassword');
btn.addEventListener('click', function() {
  document.location.href = '/updatePassword.php';
});
</script>
<title>View Profile</title>
<style type="text/css">
body{
    width: auto;
    height: 200px;
	background-color: #ff5a4a;
	color: white;
	}
#rightColumn{
   	width: 50%;
   	border-style: hidden;
	position: relative;
    left: 30em;
	top: 1em;
	font-size: 14pt;
	font-family: Myanmar Text;
	display: inline-block;
	float: left;
}
   form div{
   	margin-top: 5px;
   }
img{
   	float: left;
   	margin-left: 9em;
	margin-top: 5em;
   	width: 192px;
   	height: 192px;
	border: 2px solid black;
   }
tr { 
	display: block; float: left; margin-right: 10%;
  }
th, td { 
	display: block;  
	}
#profileHeader{
	margin-left: 20px;
	margin-top: 20px;
}
.profileText{
	text-align:left;
}
.usernameHeading{
	margin-left: 20px;
}
#img_div{
   	width: 5%;
   	padding: 5px;
   	margin: 20px auto;
	margin-bottom: 8em;
   	border-style: hidden;
	display: inline-block;
	float: left;
}
.ph-button {
	
    border-style: solid;
    border-width: 0px 0px 3px;
    box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
    color: #FFFFFF;	   
    border-radius: 6px;
    cursor: pointer;
    display: inline-block;
    font-style: normal;
    overflow: hidden;
    text-align: center;
    text-decoration: none;
    text-overflow: ellipsis;
    transition: all 200ms ease-in-out 0s;
    white-space: nowrap;	
    font-family: "Gotham Rounded A","Gotham Rounded B",Helvetica,Arial,sans-serif;
    font-weight: 700;	
    padding: 4px 24px 3px;
    font-size: 18px;
}
.ph-btn-red {

    background-color: #ED5A5A !important;
    border-color: #EA4343 !important;

}
.ph-btn-red:hover, .ph-btn-red:focus, .ph-btn-red:active {
    background: none repeat scroll 0 0 #EB4848 !important;
    border-color: #E83131 !important;    
}
.buttons{
	float:right;
	margin-top: 1em;
	position: relative;
}
#updateProfileButton{margin-left: 2em;}
.buttons a {
    color: #FFFFFF;
    text-decoration: none;
}
.addressRow{
	height: 7em;
}
.buttonRight{
	margin-left: 50em;
}
</style>
</head>
<body>
<div class="buttons">
	<button class='ph-button ph-btn-red' id="updatePassword" onClick="window.location = './updatePassword.php'">Change Password</button>
	<button class='ph-button ph-btn-red' id="updateProfileButton"  onClick="window.location = './updateProfile.php'">Edit Profile</button>
</div>
<div class="usernameHeading">
	<h1><b><?php echo $userInfo->Username;?></b></h1>
</div>
<div class="usernameHeading"><h5><?php echo $userInfo->UserType;?></h5></div>
<?php echo "<div id='img_div'>";
      	echo "<img src='images/".$userInfo->UserPhoto."' >";
      echo "</div>";
	  ?>
<div id="rightColumn">
	<table width="500" cellpadding=8 cellspacing=8>
	<tr>
	<th>Full Name:</th>
	<th>Birthdate:</th>
	<th>Gender:</th>
	<th class="addressRow">Address:</th>
	<th>Contact Number:</th>
	<th>Email Address:</th>
	</tr>
	
	<tr>
	<td><?php echo $userInfo->FirstName; echo" "; echo $userInfo->MiddleName; echo" "; echo $userInfo->LastName;  ?></td>
	<td><?php echo $userInfo->Birthdate;?></td>
	<td><?php echo $userInfo->Gender;?></td>
	<td class="addressRow"><?php echo $arr_address[0]; ?><br/><?php echo $arr_address[1];?><br/><?php echo $arr_address[2];?><br/><?php echo $arr_address[3];?></td>
	<td><?php echo $userInfo->ContactNumber;?></td>
	<td><?php echo $userInfo->EmailAddress;?></td>
	</tr>
	</table>
</div>

</body>
</html>