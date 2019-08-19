<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
   include_once '../../config/database.php';
   include_once '../../classes/unitClass.php';
   include_once '../../classes/bookUnitClass.php';
   include_once '../../classes/notificationClass.php';
	
   $database = new Database();
   $db = $database->getConnection();

    $reservation = new Reservation($db);
    $notification = new Notifications($db);

   $Unit = new Unit($db);
   $stmt = $Unit->readAll();
   
    if(isset($_POST['booked'])){
    
    $reservation->CheckInDate = $_SESSION['CheckInDate'];
    $reservation->CheckOutDate = $_SESSION['CheckOutDate'];
    $reservation->NoOfPeople = $_SESSION['NoOfPeople'];
	$reservation->TotalAmountDue = $_SESSION['TotalAmountDue'];
    $reservation->UnitNo = $_SESSION['UnitNo'];
	
    if($reservation->createReservation()){
      echo '<META HTTP-EQUIV=REFRESH CONTENT="0; index.php">';
	  $message = "Successfully Booked!";
	  echo "<script type='text/javascript'>alert('$message');</script>";
	}else
      echo "Failed to book";
	}
	else if(isset($_POST['cancel'])){
    header("Location: index.php");
  }
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
  
	  	<div class="card center" style="width: 73rem;">
  		<div class="card-body center">
         <h4 class="card-title text-danger">April 19, 2018</h4>
         <div class="row">
          <div class="col lg-6">
            <h5 class="card-title text-danger">Units for Booking</h5>
          </div>
          <div class="col lg-6">
           <!-- <a class="btn btn-danger form-control" href="viewUnits.php">View units</a>-->
          </div>
         </div>
    		
   			<p>FIRMD Vacation House
   			<br><br></p>
   			<p>
   			<br><br>
   			
   		
   		<?php
		$_SESSION['UnitNo'] = "2";
		$_SESSION['TotalAmountDue'] = "3000";
echo "
<form method='POST' action='index.php'>
<div class='mx-auto'>
      <table class='table'>
         <thead class='thead-danger'>
            <tr>
               <th>Unit No.</th>
               <th scope='col'>Capacity</th>
               <th scope='col'>Description</th>
               <th scope='col'>Price</th>
               <th scope='col'>Actions</th>  
            </tr>
         </thead>
         <tbody>";

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      echo
         "
            <tr>
               <td>" . $row['UnitID'] ."</td>
               <td>" . $row['Capacity']."</td>
               <td>" . $row['Description']."</td>
               <td>" . $row['Price'] ."</td>
               
               <td>
			   <div class='row'>
			   <div class='col lg-6'>
			   
			   <button type ='button' class='btn btn-danger form-control'  onclick='return confirm('You are booking unit".$row['UnitID'].". Do you still wish to proceed?');' role='button'>Book</button>
               </div>
			   <div class='col lg-6'>
			   <a class='btn btn-danger form-control' href='unit".$row['UnitID'].".php'>View</a>

			   </div>
			   </div>
			   </td>
            </tr>";
   }
   echo "</tbody>
      </table>
   </div>
   </form>";
?>
         </div>


		</div>
		</div>
		</div>
		<div class="col lg-1">
		</div>
	</div>

   <!-- Button trigger modal -->

<!-- Modal -->
  
  <?php 
   
  ?>
<div class="modal fade" id="bookUnitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form id="bookUnitForm" method="POST">
      <div class="modal-body">
	  <?php
		$_SESSION['UnitNo'] = "2";
		$_SESSION['TotalAmountDue'] = "3000"; 
		?>
        Are you sure you want to book this unit?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" name="cancel" data-dismiss="modal">No</button>
        <a class="btn btn-primary" type="submit" name="booked" href="index.php">Yes</a>
      </div>
    </div>
  </div>
</form>
<script>
$('#bookUnitForm').on('submit', function(event){
event.preventDefault();

$.ajax({
	url:'bookUnit.php', 
	method:"POST",
	data:$('#bookUnitForm').serialize(),
	
	success:function(data){
		$('#bookUnitModal').modal('hide');
	}
	});
});
</script>
</div>
</html>




