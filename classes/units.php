<?php
	class Unit{
		public $unitID;
		public $unitName;
		public $description;
		public $capacity;
		public $price;
		public $searchText;

		private $conn;
		private $tableName = "unit";
		public $tableTitle = "Units";
	
	function __construct($db){
		$this->conn=$db;
	}
	
	function getUnits(){
		$query = "SELECT * FROM " . $this->tableName;
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	function getSelectedUnit(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE unitID = ? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->unitID);
		$stmt ->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->unitName = $row['UnitName'];
		$this->description = $row['Description'];
		$this->capacity = $row['Capacity'];
		$this->price = $row['Price'];
		
		return $stmt;
	}

	function search(){
		$query = "SELECT * FROM " . $this->tableName . " WHERE UnitName LIKE '".$this->searchText."%' OR Description LIKE '".$this->searchText."%' OR Capacity LIKE '".$this->searchText."%' OR Price LIKE '".$this->searchText."%' OR Status LIKE '".$this->searchText."%' ";
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}
	}
?>