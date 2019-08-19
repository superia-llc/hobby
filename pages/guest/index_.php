<?php 
	session_start();
	$page_title = "Firmd Vacation House";
	include_once 'header2.php';
	include_once '../../config/database.php';
	include_once '../../classes/userClass.php';

	

		$database = new Database();
		$db = $database->getConnection();

		$userInfo = new UserClass($db);

?>


<html>
<head>
	<script type="text/javascript">

</script></head>
	</br>
	</br>
	</br>
	</br>
	</br>



	<div class="row">
		<div class="col lg-1">
			
  <div class="card center" style="width: 30rem;">
  <div class="card-body center">
	
    <h5 class="card-title text-danger">Login</h5>
    <div class="row fixed-center">
    <div class="col lg-12">
			<?php
			if(isset($_POST['login'])){	
			$userInfo->Username = $_POST['Username'];
			$userInfo->PasswordHash = $_POST['PasswordHash'];
			if($userInfo->confirmUsernameAndPass()){
				$_SESSION['Username'] = $_POST['Username'];
				$userInfo->Username = $_SESSION['Username'];
				$userInfo->extractNameWithUsername();
				$userInfo->extractReservationInfo();
				if($userInfo->extractUserTypeAdmin())
				echo '<META HTTP-EQUIV=REFRESH CONTENT="0; admin.php">';
				else if($userInfo->extractUserTypeGuest())
				echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php">';
			}
			else
				echo '<div class="alert alert-danger" role="alert">Incorrect username or password</div>';
			}
			?>
    			<form action="index_.php" method="post">
			            <div class="form-group">
			                <label for="form-username">Username</label>
			                <input type="text" name="Username"  class="form-control" id="Username" autofocus>
			            </div>
			            <div class="form-group">
			                <label for="form-password">Password</label>
			                <input type="password" name="PasswordHash"  class="form-control" id="PasswordHash" required>
			            </div>
			            <button type="submit" name="login" class="btn btn-danger form-control">Login</button>
			    </form>
	</div>
	</div>
    <div class="row fixed-center">
    <div class="col lg-12">
    <a class="text-danger" href="guestRegistration.php">New User? Register here!</a>
    </div>	
    </div>
    <div class="row fixed-center">
    <div class="col lg-12">
    <a class="text-danger" href="accountActivation.php">Forgot Password</a>
    </div>
  	</div>
  	</div>
	</div>
  
		</div>
		<div class="col lg-4">
			 <div class="card center" style="width: 40rem;">
  <div class="card-body center">

    <h5 class="card-title text-danger"></h5>
    <img class = "mainimg" src="../../assets/images/1.jpg" alt="Firmd Apartelle" width="85%" height="200">
    <img class = "subimg" src="../../assets/images/unit9.png" alt="Promo" width="85%" height = "200">
	</div>	
	</div>
		</div>
		<div class="col lg-2">
		</div>
		<div class="col lg-4">
		<div class="card center" style="width: 20rem;">
 
		</div>
		<div class="col lg-1">
		</div>
</div>
</html>




