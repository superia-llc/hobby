<?php
	class Commission{
		public $commssionID;
		public $employeeIDNum;
		public $agentName;
		public $amount;
		public $status;
		public $dateRecieved;
		public $searchText;

		private $conn;
		private $tableName = "commissions";
		public $tableTitle = "Commissions";
	
		function __construct($db){
			$this->conn=$db;
		}

		function getCommissions(){
			$query = "SELECT * FROM " . $this->tableName;
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}

		function getSelectedCommission(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE CommissionID = ? LIMIT 0,1";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->commissionID);
			$stmt ->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->employeeIDNum = $row['EmployeeIDNum'];
			$this->agentName = $row['AgentName'];
			$this->amount = $row['CommissionAmount'];
			$this->status = $row['CommissionStatus'];
			$this->dateRecieved = $row['DateReceived'];

			return $stmt;
		}

		function search(){
			$query = "SELECT * FROM " . $this->tableName . " WHERE EmployeeIDNum LIKE '".$this->searchText."%' OR AgentName LIKE '".$this->searchText."%' OR CommissionAmount LIKE '".$this->searchText."%' OR CommissionStatus LIKE '".$this->searchText."%' OR DateReceived LIKE '".$this->searchText."%' ";
			$stmt = $this->conn->prepare($query);
			$stmt ->execute();
			return $stmt;
		}
	}
?>