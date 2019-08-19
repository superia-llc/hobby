<?php
	include_once "../util/requireLogin.php";
	
	include_once "header-nav.php";
	include_once "../config/database.php";
	include_once "../classes/catering.php";

  $database = new Database();
  $db = $database->getConnection();

  $catering = new Catering($db);
  $stmt = $catering->getCatering();
?>

<div id = "container" class="container">
	<table id='employees' class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>ID Number</th>
		        <th scope='col'>Employee Name</th>
		        <th scope='col'>Address</th>
		        <th scope='col'>Contact Number</th>
		        <th scope='col'>Employee Type</th>
		        <th scope='col'>Actions</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);

				echo "
				<tr>	
					<td scope='col'>{$EmployeeIDNum}</td>
	                <td scope='col'>{$FirstName} {$LastName} {$Suffix}</td>
	                <td scope='col'>{$Address}</td>
	                <td scope='col'>{$ContactNumber}</td>
	                <td scope='col'>{$EmployeeType}</td>

					<td scope='col'>
	                  <button type='button' class='tbl-button view' name='view' view-id='{$employeeID}' data-toggle='tooltip' data-placement='top' title='View'><i class='flaticon-eye align-center'></i></button>

	                  <button type='button' class='tbl-button edit' name='update' edit-id='{$employeeID}' data-toggle='tooltip' data-placement='top' title='Edit'><i class='flaticon-pencil-edit-button align-center'></i></button>

	                  <button typ='button' class='tbl-button archive' name='archive' archive-id='{$employeeID}' data-toggle='tooltip' data-placement='top' title='Archive'><i class='flaticon-waste-bin align-center'></i></button>
	                </td>
				</tr>";
				}
			?>
		</tbody>
	</table>
</div>