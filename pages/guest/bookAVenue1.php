<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
 	include_once '../../config/database.php';
  	include_once '../../classes/bookVenueClass.php';
	include_once '../../classes/notificationClass.php';
	
	$database = new Database();
   	$db = $database->getConnection();

   	$venue = new Venue($db);
	
	$notification = new Notifications($db);
	//$_SESSION['username'];	
?>

<?php

if(isset($_POST['book'])){		
		$venue->CheckInDate = $_POST['CheckInDate'];
		$venue->CheckOutDate = $_POST['CheckOutDate'];
		$venue->NoOfPeople = $_POST['NoOfPeople'];
		$venue->GuestName = $_SESSION['username'];

		

		
		$notification->NotificationDescription = $_POST['NotificationDescription'];
		$notification->NotificationType = $_POST['NotificationType'];
		$notification->NotificationDate = $_POST['CheckInDate'];
		
		if($venue->createVenue()){
			if($notification->createNotifications()){
			echo '<META HTTP-EQUIV=REFRESH CONTENT="1; bookingAccept.php">';
		}
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
	
	$( "#datepicker" ).datepicker({
	dateFormat: "yy-mm-dd",
	minDate: '1',
	onSelect: function (date) {
            var date2 = $('#datepicker').datepicker('getDate');
            date2.setDate(date2.getDate() + 1);
            $('#datepicker2').datepicker('setDate', date2);
            //sets minDate to dt1 date + 1
            $('#datepicker2').datepicker('option', 'minDate', date2);
        }
	});

  } );
  </script>
  
  <script>
  $( function() {
	  
 	$( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd",
	minDate: '2',
	//startDate: '2018-05-01',
	onClose: function () {
            var dt1 = $('#datepicker').datepicker('getDate');
            var dt2 = $('#datepicker').datepicker('getDate');
            //check to prevent a user from entering a date below date of dt1
            
        }
	});
  } );
  </script>
  
  <script type="text/javascript">
	function changeValue(){
		var option=document.getElementById('guestNumber').value;
		var product = option*6750*.40;

		document.getElementById('price').value=product;

	}
</script>
</br>
	
	</br>
	



	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  
 <div class="card center" style="width: 50rem;">
  <div class="card-body center">

    <h2 class="card-title text center">BOOK A VENUE</h2>
    <p class="text-danger">__________________________________________________________________________________________________________________</p>
	<?php
echo "<h3><center> Today is " . date("l") . "</center></h3><br>";
date_default_timezone_set('Asia/Manila'); 
$date_now = date('Y-m-d H:i:s');
echo "<h3><center>".$date_now."</center></h3><br>";

?> 
	<form method="POST" action="bookAVenue1.php">
			<select class="form-control" name="">
				<option selected>Conference Hall (150 pax)</option>
				<option>Outdoor Parking (200 pax)</option>
			</select>
	<input type="hidden" name="NotificationDescription" value="Someone has booked a venue!">
	<input type="hidden" name="NotificationType" value="Booking Venue">
	<div class="row">
	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Event Start</label>
	<input type="text" id="datepicker" name="CheckInDate" required autofocus></div>
	</div>	
	</div>	
	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
		<label>Event End</label>
		<input type="text" id="datepicker2" name="CheckOutDate" required></div>
	</div>
	</div>
	<div class="row">
	
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
	<input type="number" min="1" max="200" name="NoOfPeople" id="NoOfPeople" class="form-control" value="10" >

		
	
	</div>
	</div>
	
	
	<button class="btn btn-danger form-control" type="submit" name="book">BOOK</button>
	
	</div>
	</br>
	</br>
	</div>
	</div>
	<div class="col lg-1">
	</div>
	</div>
		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to book this venue?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a class="btn btn-primary" href='booking.php'>Yes</a>
      </div>
    </div>
  </div>
</div>

</html>




