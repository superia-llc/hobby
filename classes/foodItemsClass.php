<?php
class FoodItems{

	public $tableName = "fooditems";

	//public $unitNo;
	//public $capacity;
	//public $price;

	
	private $conn;
	
	
	
	function __construct($db){
		$this->conn = $db;

	}

	function readAll(){
		$query = "SELECT * FROM fooditems";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	
	
}
?>