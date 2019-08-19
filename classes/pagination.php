<?php
	class Page{
		private $conn;
		public $tableName;
		public $page1;
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function getObjects(){
		$query = "SELECT * FROM " . $this->tableName " LIMIT $page1, 4";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();

		return $stmt;
	}

	}
?>