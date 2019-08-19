<?php 

	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once '../../config/database.php';
	include_once '../../classes/bookUnitClass.php';
	include_once '../../classes/userClass.php';
	include_once '../../classes/notificationClass.php';


	$database = new Database();
	$db = $database->getConnection();

	$today = date("m.d.y");
	$reservation = new Reservation($db);
	$notification = new Notifications($db);
	$userInfo = new UserClass($db);
?>

<?php



if(isset($_POST['book'])){
		$_SESSION['CheckInDate'] = $_POST['CheckInDate'];
		$_SESSION['CheckOutDate'] = $_POST['CheckOutDate'];
		$_SESSION['NoOfPeople'] = $_POST['NoOfPeople'];
		$_SESSION['UnitNo'] = 5;
		$_SESSION['TotalAmountDue'] = $_POST['totalTextBox'];
		$notification->NotificationDescription = $_POST['NotificationDescription'];
		$notification->NotificationType = $_POST['NotificationType'];
		$notification->NotificationDate = $_POST['CheckInDate'];
		$notification->createNotifications();
		if($reservation->seeCheckInAvailability()){
		echo "<script type='text/javascript'>alert('Sorry! This unit is unavailable for the dates you have selected. Please try setting a different booking schedule.')</script>";
		}
		else{
			if($reservation->createReservationPromo()){
				
				echo "<script type='text/javascript'>alert('Booking successful!')</script>";
				header("Location: guestHomepage.php");
			}
			else
				echo "<script type='text/javascript'>alert('The system has encountered an error. Please try again later.')</script>";
	}
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
	minDate: '2018-05-10',
	maxDate: '2018-05-12',
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
	minDate: '2018-05-11',
	maxDate: '2018-05-12',
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
		var product = ((option*250) - ((option*250)*0.5)) + 500;

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

    <h2 class="card-title text center"><center>UNIT 5 PROMO BOOKING</center></h2>
	<center><i>*This promo is only available from May 10, 2018 to May 12, 2018</i></center>
    <p class="text-danger">__________________________________________________________________________________________________________________</p>
	<?php
echo "<h3><center> Today is " . date("l") . "</center></h3><br>";
date_default_timezone_set('Asia/Manila'); 
$date_now = date('Y-m-d H:i:s');
echo "<h3><center>".$date_now."</center></h3><br>";

?> 
	<form method="POST" action="bookUnitPromo1.php">
	
	<div class="row">
	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-In</label>
	<input type="text" id="datepicker" name="CheckInDate" required autofocus></div>
	<input type="hidden" name="NotificationDescription" value="Someone has booked a promo unit!">
	<input type="hidden" name="NotificationType" value="Booking Unit">
			
	</div>
	</div>	


	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-Out</label>
	<input type="text" id="datepicker2" name="CheckOutDate"></div>

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
	<select class="form-control" name="NoOfPeople" id="guestNumber" onchange="changeValue();">
		<?php
		for($i=1;$i<13;$i++){
		echo "<option>$i
		</option>";
		}

		?>
	</select>
	
	</div>

	</div>
	
	<div class="row">
	<div class="col lg-6">
	Discounted Total price
	</div>	
	<div class="col lg-6">
	<input type="text" class="form-control"  name="totalTextBox" value="" id="price" readonly>
	
	</div>

	</div>
	<br/>
	<button class="btn btn-danger form-control" type="submit" name="book" onclick="return confirm('Your booking is final and cannot be changed. Do you still wish to proceed?');">BOOK</button>
	
	
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




