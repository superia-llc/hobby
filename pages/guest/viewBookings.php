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
	
	
	<div class="row">
		<div class="col lg-1">
		</div>
		<div class="col lg-10">
  


	  	<div class="card center" style="width: 70rem;">
  		<div class="card-body center">

    		<h5 class="card-title text-danger">Your Current Bookings</h5>
    		
    		<div class="row">
                <div class="col lg-2">
                    Unit Booked
                </div>
                <div class="col lg-2">
                    Date Booked
                </div>
                <div class="col lg-2">
                    Date Approved
                </div>
                <div class="col lg-2">
                    Status
                </div>
                <div class="col lg-2">
                    
                </div>
                <div class="col lg-2">
                    
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col lg-2">
                    1
                </div>
                <div class="col lg-2">
                    February 20, 2018
                </div>
                <div class="col lg-2">
                    February 21, 2018
                </div>
                <div class="col lg-2">
                    Approved
                </div>
                <div class="col lg-2">
                    <a class="btn btn-success form-control" href="bookAUnit.php">RESCHEDULE</a>
                </div>
                <div class="col lg-2">
                    <a class="btn btn-danger form-control" href="cancel.php">CANCEL RESERVATION</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col lg-2">
                    5
                </div>
                <div class="col lg-2">
                    February 20, 2018
                </div>
                <div class="col lg-2">
                    N/A
                </div>
                <div class="col lg-2">
                    Pending
                </div>
                <div class="col lg-2">
                    <a class="btn btn-success form-control" href="bookAUnit.php">RESCHEDULE</a>
                </div>
                <div class="col lg-2">
                    <a class="btn btn-danger form-control" href="cancel.php">CANCEL RESERVATION</a>
                </div>
            </div>
            <br>
            <br>
            <p>Note: after rescheduling the status of the approved booking will be changed to pending</p>
   		</div>
      </div>
   </div>
		<div class="col lg-1">
		</div>
	</div>
</html>




