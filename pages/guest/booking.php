<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	
?>


<html>
	</br>
	</br>
	</br>
	</br>
	</br>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {

	$( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
	$( "#datepicker" ).datepicker( "setDate", "2014-04-20" );
  } );
  </script>
    
  <script>
  $( function() {
	  
 	$( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd"});
		$( "#datepicker2" ).datepicker( "setDate", "2014-04-21" );
  } );
  </script>
	
	

	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  


  <div class="card center" style="width: 60rem;">
  <div class="card-body center">

    <h5 class="card-title text center">BOOK A UNIT</h5>
    <p class="text-danger">__________________________________________________________________________________________________________________________________________</p>
	<?php
	echo "
	<div class='row'>
	<div class='col lg-6'>
	<a class='btn btn-danger form-control' href='bookAUnit.php'>Back</a>
	</div>
	<div class='col lg-6'><a class='btn btn-danger form-control' href='unit6.php'>View</a>
	</div>
	
	</div>
	</br><h4><center> Are you sure you want to book Unit 6?</center></h4>";



?> 
	<form method="POST" action="bookingAccept.php">
	
	<div class="row">
	<div class="col lg-6">
	<div class="card center" style="width: 27rem;">
	<div class="card-body center">
	<label>Check-In</label>
	<input type="text" id="datepicker" name="CheckInDate"></div>

			
	</div>
	</div>	


	<div class="col lg-6">
	<div class="card center" style="width: 27rem;">
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
	<select class="form-control" name="NoOfPeople">
		<option selected>26
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


	<!-- Button trigger modal -->
	<button class="btn btn-danger form-control" data-toggle="modal" type="submit"  name="book data-target="#exampleModal" >BOOK</button>
	</form>
	</div>
	</div>
	</br>
	</br>
	</div>
	<div class="col lg-1">
	</div>
	</div>
	
	


<!-- Modal -->

</html>





