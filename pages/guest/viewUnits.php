<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
   include_once '../../config/database.php';
   include_once '../../classes/unitClass.php';
	
   $database = new Database();
   $db = $database->getConnection();

   $Unit = new Unit($db);
   $stmt = $Unit->readAll();
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
         <h4 class="card-title text-danger">April 12, 2018</h4>
         <div class="row">
          <div class="col lg-6">
            <h5 class="card-title text-danger">View Units</h5>
          </div>
          <div class="col lg-6">
            <a class="btn btn-danger form-control" href="bookAUnit.php">BOOK</a>
          </div>
         </div>
    		
   			<p>FIRMD Vacation House
   			<br><br></p>
   			<p>
   			<br><br>
   			
   		
   		<div class='mx-auto'>
      <table class='table'>
         <thead class='thead-danger'>
            <tr>
               <th>Unit No.</th>
               <th scope='col'>Capacity</th>
               <th scope='col'>Actions</th>  
            </tr>
         </thead>
         <tbody>
          <tr>
               <td>Unit 1</td>
               <td>12</td>
               <td><a class='btn btn-danger form-control' href="unit2.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 2</td>
               <td>15</td>
               <td><a class='btn btn-danger form-control' href="unit2.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 3</td>
               <td>14</td>
               <td><a class='btn btn-danger form-control' href="unit4.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 4</td>
               <td>12</td>
               <td><a class='btn btn-danger form-control' href="unit4.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 5</td>
               <td>12</td>
               <td><a class='btn btn-danger form-control' href="unit5.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 6</td>
               <td>26</td>
               <td><a class='btn btn-danger form-control' href="unit6.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 7</td>
               <td>4</td>
               <td><a class='btn btn-danger form-control' href="unit6.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 8</td>
               <td>8</td>
               <td><a class='btn btn-danger form-control' href="unit8.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 9</td>
               <td>15</td>
               <td><a class='btn btn-danger form-control' href="unit9.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 10</td>
               <td>10</td>
               <td><a class='btn btn-danger form-control' href="unit10.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 11</td>
               <td>6</td>
               <td><a class='btn btn-danger form-control' href="unit11.php">View</a>
               </td>
          </tr>
          <tr>
               <td>Unit 12</td>
               <td>12</td>
               <td><a class='btn btn-danger form-control' href="unit12.php">View</a>
               </td>
          </tr>
   
   </tbody>
      </table>
   </div>

         </div>


		</div>
		</div>
		</div>
		<div class="col lg-1">
		</div>
	</div>

   <!-- Button trigger modal -->

<!-- Modal -->
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
        Are you sure you want to book this unit?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <a class="btn btn-primary" href='booking.php' >Yes</a>
      </div>
    </div>
  </div>
</div>
</html>




