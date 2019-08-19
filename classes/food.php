<?php
	class Food{
		public $foodItemID;
		public $foodItemName;
		public $foodItemUnit;
		public $foodItemPrice;
		public $foodItemCategory;
		public $foodItemDescription;
		public $searchText;

		private $conn;
		private $tableName = "foodItems";
		public $tableTitle = "Food Items";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getFoodItems(){
			$query = "SELECT * FROM " . $this->tableName;
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getSelectedFoodItem(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE FoodItemID = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->foodItemID);
			$stmt ->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->foodItemName = $row['FoodItemName'];
			$this->foodItemUnit = $row['FoodItemUnit'];
			$this->foodItemPrice = $row['FoodItemPrice'];
			$this->foodItemCategory = $row['FoodItemCategory'];
			$this->foodItemDescription = $row['FoodItemDescription'];
			return $stmt;
		}

		function getArchivedFoodItems(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE IsArchived = 1";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function addFoodItem(){
			$query = "INSERT INTO ". $this->tableName ." SET FoodItemName = ?, FoodItemUnit = ?, FoodItemPrice = ?, FoodItemCategory = ?, FoodItemDescription = ?";

			$stmt = $this->conn->prepare($query);

			$stmt->bindparam(1, $this->foodItemName);
			$stmt->bindparam(2, $this->foodItemUnit);
			$stmt->bindparam(3, $this->foodItemPrice);
			$stmt->bindparam(4, $this->foodItemCategory);
			$stmt->bindparam(5, $this->foodItemDescription);

			if($stmt->execute())
				return true;
			else
				return false;
			
			return $stmt;
		}


		function updateFoodItem(){
			$query = "UPDATE " . $this->tableName . " SET FoodItemName = ?, FoodItemUnit = ?, FoodItemPrice = ?, FoodItemCategory = ?, FoodItemDescription = ? WHERE foodItemID = ?";
			
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindparam(1, $this->foodItemName);
			$stmt->bindparam(2, $this->foodItemUnit);
			$stmt->bindparam(3, $this->foodItemPrice);
			$stmt->bindparam(4, $this->foodItemCategory);
			$stmt->bindparam(5, $this->foodItemDescription);
			$stmt->bindParam(6, $this->foodItemID);
			
			if($stmt->execute()){
				return true;
			}
			else{
				return false;
			}
		}


		function search(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE FoodItemID LIKE '".$this->searchText."%' OR FoodItemName LIKE '".$this->searchText."%' OR FoodItemUnit LIKE '".$this->searchText."%' OR FoodItemPrice LIKE '".$this->searchText."%' OR FoodItemCategory LIKE '".$this->searchText."%' OR FoodItemDescription LIKE '".$this->searchText."%'";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

	}
?>