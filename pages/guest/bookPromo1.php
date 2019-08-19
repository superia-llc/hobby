<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once 'config/database.php';
	include_once 'classes/bookUnitClass.php';
	include_once 'classes/notificationClass.php';


	$database = new Database();
	$db = $database->getConnection();

	$today = date("m.d.y");
	$reservation = new Reservation($db);
	$notification = new Notifications($db);
	
?>

<?php

if(isset($_POST['book'])){
	
		
	
		
		
		$reservation->CheckInDate = $_POST['CheckInDate'];
		$reservation->CheckOutDate = $_POST['CheckOutDate'];
		$reservation->NoOfPeople = $_POST['NoOfPeople'];

		$notification->NotificationDescription = $_POST['NotificationDescription'];
		$notification->NotificationType = $_POST['NotificationType'];
		
		if($reservation->createReservation()){
			echo '<META HTTP-EQUIV=REFRESH sCONTENT="1; viewAvailableUnits.php">';
		}
		else
			echo "Failed";
	}
	else if(isset($_POST['cancel'])){
		header("Location: index.php");
	}
?>

<html>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
	
    $( "#datepicker" ).datepicker();
	$( "#datepicker" ).datepicker( "setDate", "04/19/2018" );

  } );
  </script>
  
  <script>
  $( function() {
	  
    $( "#datepicker2" ).datepicker()
		$( "#datepicker2" ).datepicker( "setDate", "04/20/2018" );;
  } );
  </script>
</br>
	
	</br>
	


	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  


  <div class="card center" style="width: 50rem;">
  <div class="card-body center">

    <h5 class="card-title text center">BOOK A UNIT</h5>
    <p class="text-danger">__________________________________________________________________________________________________________________</p>
	<?php
echo "Today is " . date("l") . "<br>";
$date_now = date('Y-m-d H:i:s');
echo $date_now;

?> 
	<form method="POST" action="bookAUnit.php">
	
	<div class="row">
	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-In</label>
	<div id="datepicker" name="CheckInDate"></div>

			
	</div>
	</div>	
	</div>	

	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-Out</label>
	<div id="datepicker2" name="CheckOutDate"></div>

	</div>
	</div>
	</div>

	</div>
	<div class="row">
	<div class="col lg-6">
	</br>
	</br>
	<p>No of. People</p>
	<br>	
	</div>	
	<div class="col lg-6">
	<p></p>
	</br>
	<select class="form-control" name="Quantity">
		<option selected>10
		</option>
		<?php
		for($i=1;$i<151;$i++){
		echo "<option>$i
		</option>";
		}

		?>
	</select>
	
	</div>

	</div>
	<div class="row">
	<?php
?>
</div>
	
	<button class="btn btn-danger form-control" type="submit" name="book">BOOK</button>
	</form>
	</div>
	</div>
	</br>
	</br>
	</div>
	<div class="col lg-1">
	</div>
	</div>
		

</html>




