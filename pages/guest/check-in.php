<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header4.php';
	//include_once 'config/database.php';
	//include_once 'classes/studentClass.php';

	//$database = new database();
	//$db = $database->getConnection();

	//$student = new Student($db);
	//$stmt = $student->readAll();
	/*echo "
	<table class = 'table table-hover'>
		
		<thead>
			<tr>
				<th>Student ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Birthdate</th>
			</tr>
		</thead>
		<tbody>
		"
		/*;while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		echo"<tr>
			<td>".$row['StudID']."</td>
			<td>".$row['Fname']."</td>
			<td>".$row['Lname']."</td>
			<td>".$row['Bdate']."</td>
		</tr>";


	}""
		</tbody>
	</table>
	";
	
*/
?>


<html>
</br>
</br>
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
    			
    			<h5 class="card-title text-danger">Check-in</h5>
    			
    			<div class="row fixed-center">
    				<div class="col lg-2">
    				</div>
    			
    				<div class="col lg-8">
   					<h5 class="text-danger">February 22,2018</h5>
    				</div>
    			
    				<div class="col lg-2">
    				</div>
    			
    			</div>
    
    			<div class="row">
    				<div class="col lg-1">
    				</div>
    				<div class="col lg-10">
    				<h1></h1>
    				</div>
    				<div class="col lg-1">
    				</div>
    			</div>

    			<div class="row fixed-center">
    				<div class="col lg-12">
    					<label class="text-danger">Unit No.</label>
    					<select class="form-control">
    						<option selected>Unit 5</option>
    						<?php
    						for($i=1;$i<13;$i++){
    							echo"<option>Unit $i</option>"
    						;}
    						?>

    					</select>
    				</div>	
    			</div>
   			 	<div class="row fixed-center">
    				<div class="col lg-12">
    					<label class="text-danger">Name of Guest</label>
    					<input class="form-control" type="text" placeholder =""/>
    				</div>	
    			</div>
    			
    			<div class="row fixed-center">
    				<div class="col lg-12">
    					<label class="text-danger">No. of People </label>
    					<input class="form-control" type="text" placeholder =""/>
    				</div>	
    			</div>
    				</br>
    				<a href="check-inConfirmation.php" class="btn btn-success fixed-center form-control">Check-in</a>
    		</div>	
  	
		</div>




	</div>



	<div class="col lg-1">
	</div>




</div>
</html>




