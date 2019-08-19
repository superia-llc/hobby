<?php
class Unit{

	public $tableName = "unit";

	//public $unitNo;
	//public $capacity;
	//public $price;

	
	private $conn;
	
	
	
	function __construct($db){
		$this->conn = $db;

	}

	function readAll(){
		$query = "SELECT * FROM unit";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	
	
}
?>