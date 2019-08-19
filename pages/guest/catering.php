<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once '../../config/database.php';
   include_once '../../classes/foodItemsClass.php';

   $database = new Database();
   $db = $database->getConnection();

   $FoodItems = new FoodItems($db);
   $stmt = $FoodItems->readAll();
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
  


	  	<div class="card center" style="width: 40rem;">
  		<div class="card-body center">

    		<h5 class="card-title text-danger">Catering</h5>
   			<p>The FIRMD Vacation House Catering Service is needed to be approved by the management before the catering service is considered valid 
   			<br><br></p>
   			<p>
   			<br><br>
   			Here are the List of items you can request for the Catering from the Comapany
   		</p>
   		<br><br>
   		<p></p>
   		         <?php
echo "<div class='mx-auto'>
      <table class='table'>
         <thead class='thead-danger'>
            <tr>
               <th>Food Item Name</th>
               <th scope='col'>Food Item Category</th>
               <th scope='col'>Food Item Price</th>
            </tr>
         </thead>
         <tbody>";

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      echo
         "
            <tr>
               <td>" . $row['FoodItemName'] ."</td>
               <td>" . $row['FoodItemCategory']."</td>
               <td>" . $row['FoodItemPrice']."</td>
            </tr>";
   }
   echo "</tbody>
      </table>
   </div>";
?>
   		

   		<br><br>
   		<p>Note: Reminding you that this is only a view only mode, only if your bookings has been accepted can you start accessing this service.</p><br><br>

   				<a href="services.php" class="btn btn-success fixed-center form-control" value="submit">Back to the Services </a>
		<center><a href="cateringService.php" > Already booked a unit? Avail Catering now! </a></center>
  	

		</div>
		</div>
		</div>
		<div class="col lg-1">
		</div>
	</div>
</html>




