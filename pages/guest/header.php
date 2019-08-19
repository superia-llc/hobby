<?php
	include_once "../util/requireLogin.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Firmd Vacation House</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets/bootstrap/4.0.0/css/bootstrap.min.css">

	<script src="../../assets/jquery/3.2.1/jquery-3.2.1.slim.min.js"></script>
	<script src="../../assets/popper.js/1.12.9/popper.min.js"></script>
	<script src="../../assets/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- For datepicker -->
	<link rel="stylesheet" href="../../assets/jquery/jquery-ui.css">
	<script src="../../assets/jquery/jquery-1.12.4.js"></script>
	<script src="../../assets/jquery/jquery-ui.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="guestHomepage.php">FIRMD Vacation House</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="guestHomepage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="bookAUnit1.php">Book a unit</a>
          <a class="dropdown-item" href="bookAVenue1.php">Book a venue</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="catering.php">Catering</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
<ul class="navbar-nav ">
  <form class="form-inline my-2 my-lg-0">
      
    </form>
    <li class="nav-item dropdown">
      
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

         Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="notifications.php">Notifications</a>
          <a class="dropdown-item" href="viewProfile.php">View Profile</a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
    
    <?php
$_SESSION['unit'] = "2";
	?>
    

  </div>
</nav>
	
	</body>
  </html>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>