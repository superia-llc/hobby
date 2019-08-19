<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
	include_once '../../config/database.php';
    include_once '../../classes/notificationClass.php';

   $database = new Database();
   $db = $database->getConnection();

   $Notifications = new Notifications($db);
   $stmt = $Notifications->readAll();
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

    		<h5 class="card-title text-danger">Your Notifications</h5><br>
          <?php
		echo "<div class='mx-auto'>
      <table class='table'>
         <thead class='thead-danger'>
            <tr>
               <th scope='col'>Date</th>
               <th scope='col'></th>
               <th scope='col'></th>
            </tr>
         </thead>
         <tbody>";

   while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      extract($row);
      echo
         "
            <tr>
               <td>" . $row['NotificationDate'] ."</td>
               <td>" . $row['NotificationType']."</td>
               <td>" . $row['NotificationDescription']."</td>
            </tr>";
   }
   echo "</tbody>
      </table>
   </div>";
?>
   			
   		</div>
      </div>
   </div>
		<div class="col lg-1">
		</div>
	</div>
</html>




