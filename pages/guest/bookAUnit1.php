<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once '../../config/database.php';
	include_once '../../classes/bookUnitClass.php';
	include_once '../../classes/notificationClass.php';


	$database = new Database();
	$db = $database->getConnection();

	$today = date("m.d.y");
	$reservation = new Reservation($db);
	$notification = new Notifications($db);
	//echo $_SESSION['username'];	
?>

<?php
	$temp;
	$temp2;
	$final;
	


if(isset($_POST['book'])){
		
		
		$notification->NotificationDescription = $_POST['NotificationDescription'];
		$notification->NotificationType = $_POST['NotificationType'];
		$notification->NotificationDate = $_POST['CheckInDate'];
		
		$_SESSION['CheckInDate'] = $_POST['CheckInDate'];
		$_SESSION['CheckOutDate'] = $_POST['CheckOutDate'];
		$_SESSION['NoOfPeople'] = $_POST['NoOfPeople'];
		
		
			if($notification->createNotifications()){
				
			echo '<META HTTP-EQUIV=REFRESH CONTENT="0; viewAvailableUnits.php">';

	}
	else if(isset($_POST['cancel'])){
		header("Location: index.php");
	}
}
?>


<html>
 
  
  <?php 
  
  ?>
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

    <h2 class="card-title text center">BOOK A UNIT</h2>
    <p class="text-danger">__________________________________________________________________________________________________________________</p>
	<?php
echo "<h3><center> Today is " . date("l") . "</center></h3><br>";
date_default_timezone_set('Asia/Manila'); 
$date_now = date('Y-m-d H:i:s');
echo "<h3><center>".$date_now."</center></h3><br>";

?> 
	<form method="POST" action="bookAUnit1.php">
	
	<div class="row">
	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-In</label>
	<input type="text" id="datepicker" name="CheckInDate" required autofocus></div>
	<input type="hidden" name="NotificationDescription" value="Someone has booked a unit!">
	<input type="hidden" name="NotificationType" value="Booking Unit">
			
	</div>
	</div>	


	<div class="col lg-6">
	<div class="card center" style="width: 21rem;">
	<div class="card-body center">
	<label>Check-Out</label>
	<input type="text" id="datepicker2" name="CheckOutDate" required></div>

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
	<input type="number" max="24" min="1" name="NoOfPeople" id="NoOfPeople" class="form-control" value="10" >
	
	</div>

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




