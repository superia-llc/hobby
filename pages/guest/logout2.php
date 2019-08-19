<?php
	include_once "assets/config/database.php";
	include_once "assets/classes/doctor.php";

	session_start();
	session_destroy();
	header("Location: login.php");
	exit;
?>