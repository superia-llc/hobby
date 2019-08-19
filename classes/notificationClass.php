<?php
class Notifications{

	public $tableName = "notifications";

	//public $unitNo;
	//public $capacity;
	//public $price;
	
	public $notifications;
	
	private $conn;
	
	
	
	function __construct($db){
		$this->conn = $db;

	}

	function readAll(){
		$query = "SELECT * FROM notifications";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	function createNotifications(){
			$query = "INSERT INTO notifications SET NotificationType = ?, NotificationDescription = ?, NotificationDate = ?";
			
			$statement = $this->conn->prepare($query);
			$statement->bindparam(1, $this->NotificationType);
			$statement->bindparam(2, $this->NotificationDescription);
			$statement->bindparam(3, $this->NotificationDate);

			
			if($statement->execute())
				return true;
			else
				return false;
			
			return $statement;
		}
	
	function createNotificationsBooking(){
			$query = "INSERT INTO notifications SET NotificationType = 'Unit Booked!', NotificationDescription = 'You have successfully booked Unit 5!'";
			
			$statement = $this->conn->prepare($query);
			
			if($statement->execute())
				return true;
			else
				return false;
			
			return $statement;
		}
	
	
}
?>