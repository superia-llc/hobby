<?php
	include_once "../../config/database.php";
	include_once "../../classes/users.php";

	session_start();
	if(isset($_SESSION['Username']) && $_SESSION['UserType']=="Administrator"){
		header("Location: ../admin/index.php?dashboard");
	}
	if(isset($_SESSION['Username']) && $_SESSION['UserType']=="Guest"){
		header("Location: ../guest/index.php");
	}

	if(isset($_POST['login'])){
		$database = new Database();
		$db = $database->getConnection();

		$user = new User($db);

		$user->username = $_POST['sessionOwner'];
		$user->password = $_POST['password'];

		if($user->login()){
			echo $user->userType;
			if($_SESSION['UserType'] == "Administrator"){
				header("Location: ../admin/index.php?dashboard");
			}	
			else if($_SESSION['UserType'] == "Guest"){
				header("Location: ../guest/index.php");
			}
		}
		else{
			echo "<div class='alert alert-danger' role='alert'>Incorrect username or password</div>";
		}
		
	}
?>

<div id = 'container'>
    <form action="login.php" method="post">
            <div class="form-group col-md-4">
                <label for="form-username">Username</label>
                <input type="text" name="sessionOwner" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group col-md-4" >
                <label for="form-password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <input type="submit" name="login" class="btn" value="Login" />
    </form>
</div>