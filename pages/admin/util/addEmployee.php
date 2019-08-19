<?php
	include_once "../../../config/database.php";
	include_once "../../../classes/employees.php";

	$database = new Database();
	$db = $database->getConnection();

	$employee = new Employee($db);
  
	if($_POST){
		$employee->firstName = $_POST['firstName'];
	    $employee->middleName = $_POST['middleName'];
	    $employee->lastName = $_POST['lastName'];
	    $employee->suffix = $_POST['suffix'];
	    $employee->birthdate = $_POST['birthYear']. "-" . $_POST['birthMonth']. "-" . $_POST['birthDay'];
	    $employee->gender = $_POST['gender'];
	    $employee->civilStatus = $_POST['civilStatus'];
	    $employee->address = $_POST['address'];
	    $employee->contactNumber = $_POST['contactNumber'];
	    $employee->employeeType = $_POST['employeeType'];
		
		$employee->addEmployee();
	}
?>