../../assets/<?php 
	$page_title = "Firmd Vacation House";
	include_once 'header.php';
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
		

	<div class="row">
		<div class="col lg-10">
  


  <div class="center" style="width: 49.5rem; ">
  <div class="card-body center">

 
    <a href="#" data-toggle="modal" data-target="#topPic"><img class = "mainimg" src="../../assets/images/Units/unit9.jpg" alt="Firmd Apartelle" width="100%" height="500"></a>

	</div>
	</div>
	</div>
	<div class="col lg-2">
  


  <div class="center" style="width: 30rem;font-family:Times New Roman;font-style:italic;">
  <div class="card-body center">
	<div class="row"></div>
	<div class="row"></div>
	Unit 9 is capable of accomodating 12 people and has the following amenities:
	<div class="row"></div>
	
	<ul>
	<li>Free CR</li>
	<li>Free breakfast</li>
	<li>Free hilot</li>
	<li>Free pamasahe</li>
	<li>Free tour</li>
	</ul>
	<div class="row"></div>
	You can avail of this promo beginning April 1 until April 31 with a 20% discount!
	<div class="row"></div>
	<br/>
	<center><b>Book your promo now!</b></center>
	<br/>
	<a href="bookUnitPromo3.php"><button class="btn btn-success fixed-center form-control" type="submit"><b>Avail</b></button></a>	
	</div>
	</div>
	</div>
	</div>

		

	<div class="row">
		
		<div class="col lg-2">
		<a href="#" data-toggle="modal" data-target="#1st">
  		<div class="center" style="width: 15rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
 		<div class="card-body center">
    		<div class="row"><img class = "mainimg" src="../../assets/images/Units/unit9.9.jpg" alt="Firmd Apartelle" width="100%" height="200">
    		</div>
		</div>
		</div>
		</a>
   		</div>
		

		<div class="col lg-2">
		<a href="#" data-toggle="modal" data-target="#2nd">
  		<div class="center" style="width: 15rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
 		<div class="card-body">
    	<div class="row">
    			<img class = "mainimg" src="../../assets/images/Units/unit9.7.jpg" alt="Firmd Apartelle" width="100%" height="200">
    		</div>
    </div>
		</div>
		</a>
		</div>
		
		<div class="col lg-2">
		<a href="#" data-toggle="modal" data-target="#3rd">
  		<div class="center" style="width: 15rem; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
 		<div class="card-body center">
    	<div class="row">
    			<img class = "mainimg" src="../../assets/images/Units/unit9.6.jpg" alt="Firmd Apartelle" width="100%" height="200">
    		</div>
    </div>
		</div>
		</a>
		</div>
		<div class="col lg-1">
		</div>
		<div class="col lg-2">
		</div>

		
		
	</div>
	<br/>

<!-- Creates the bootstrap modal where the image will appear -->
<div id="topPic" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <img src="../../assets/images/Units/unit9.jpg" alt="Unit 5 bed" id="imagepreview" style="width: 100%; height: 500px;" >
    </div>
	<div id="caption" style="margin: auto;display: block;width: 80%;max-width: 700px;text-align: center;color: white;padding: 10px 0;">Here comes Unit 9!</div>
  </div>
</div>	

<!-- Creates the bootstrap modal where the image will appear -->
<div id="1st" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <img src="../../assets/images/Units/unit9.9.jpg" alt="Unit 5 bed" id="imagepreview" style="width: 100%; height: 500px;" >
    </div>
	<div id="caption" style="margin: auto;display: block;width: 80%;max-width: 700px;text-align: center;color: white;padding: 10px 0;">Experience a relaxing stay with special-made beds.</div>
  </div>
</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div id="2nd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <img src="../../assets/images/Units/unit9.7.jpg" alt="Unit 5 bed" id="imagepreview" style="width: 100%; height: 500px;" >
    </div>
	<div id="caption" style="margin: auto;display: block;width: 80%;max-width: 700px;text-align: center;color: white;padding: 10px 0;">The wide spaces of Unit 9 seek to give you an air of comfort.</div>
  </div>
</div>

<!-- Creates the bootstrap modal where the image will appear -->
<div id="3rd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <img src="../../assets/images/Units/unit9.6.jpg" alt="Unit 5 bed" id="imagepreview" style="width: 100%; height: 500px;" >
    </div>
	<div id="caption" style="margin: auto;display: block;width: 80%;max-width: 700px;text-align: center;color: white;padding: 10px 0;">Unit 9 is not complete without its special made bathroom.</div>
  </div>
</div>
</html>




