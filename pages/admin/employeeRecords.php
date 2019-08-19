<?php
	include_once "../util/requireLogin.php";

	include_once "../../config/database.php";
	include_once "../../classes/employees.php";

	$database = new Database();
	$db = $database->getConnection();

	$employee = new Employee($db);
	$stmt = $employee->getEmployees();
?>

<div id = "container" class="container">
	<table id='employees' class='table table-hover'>
		<div class='in-page-navig'>
	        <ul>
	        	<li><a href='index.php?employees' class='current tableTitle'>Employees</a></li>
	        	<li><a href='archivedEmployees.php' class='not-current tableTitle'>Archived Employees</a></li>
	        	<hr class='nav-hr' />
	        </ul>
	    </div>

	    <button type='button' class='btn btn-danger btn-sm add' data-toggle='modal' data-target='#addEmployeeModal'><i class="flaticon-plus"></i>&nbsp;Add Employee</button>
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
	                <td scope='col'>". $row['Address'] . "</td>
	                <td scope='col'>". $row['ContactNumber'] ."</td>
	                <td scope='col'>". $row['EmployeeType'] ."</td>

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

<!--Modal-->
<!--Add-->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEmployeeLabel">Add New Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
	
	<form method="POST" id="addEmployeeForm">
      <div id="addEmployeeContent" class="modal-body">
		<div class="form-row">
              <div class="form-group col-md-12">
                <label>First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Juan" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Middle Name</label>
                <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Santos">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-10">
                <label>Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Dela Cruz" required>
              </div>
              <div class="form-group col-md-2">
                <label>Suffix</label>
                <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Jr.">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Birthdate</label>
                <div class="form-row">
                  <div class="form-row col-md-5">
                    <select id="birthMonth" class="form-control ml-1" name="birthMonth">
                      <option selected>Month</option>
                      <?php
                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        for($n=0; $n<count($months); $n++){
                          echo '<option value="'.($n+1).'">'.$months[$n].'</option>';
                        };
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <input type="Number" min = "1" max="31" class="form-control" id="birthDay" name="birthDay" placeholder="Day">
                  </div>
                  <div class="form-group col-md-4">
                    <select id="birthYear" class="form-control" name="birthYear">
                      <option selected>Year</option>
                        <?php
                          $Startyear=date('Y');
                          $endYear=$Startyear-70;
                          $yearArray = range($Startyear,$endYear);
                          foreach ($yearArray as $year) {
                            $selected = ($year == $Startyear) ? 'selected' : '';
                            echo '<option value="'.$year.'">'.$year.'</option>';
                          };
                        ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Gender</label>
                <select id = "gender" class="form-control" name="gender">
                  <option selected></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label>Civil Status</label>
                <select id = "civilStatus" class="form-control" name="civilStatus">
                  <option selected></option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widowed">Widowed</option>
                  <option value="Legally Separated">Legally Separated</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <label>Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Contact Number</label>
                <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="09123456789" required>
              </div>

              <div class="form-group col-md-6">
                <label>Employee Type</label>
                <select id = "employeeType" class="form-control" name="employeeType" required>
                  <option selected></option>
                  <option value="Agent">Agent</option>
                  <option value="Housekeeping">Housekeeping</option>
                  <option value="Frontdesk Staff">Frontdesk Staff</option>
                </select>
              </div>
            </div>
      </div>

      <div class="modal-footer">
		  <input type="submit" class="btn btn-sm btn-success ml-2 form-button submit-button" name="save" value="Submit"/>
		  <input type="button" class="btn btn-sm ml-2 form-button" name="cancel" id="cancel" data-dismiss="modal" value="Cancel"/>
      </div>
	</form>
    </div>
  </div>
</div>

<!--View-->
<!--View-->
<div class="modal fade" id="viewEmployee" tabindex="-1" role="dialog" aria-labelledby="viewEmployeeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="viewEmployeeLabel">View Employee Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div id="viewEmployeeContent" class="modal-body">
      </div>

      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>