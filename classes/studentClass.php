<?php
class Student{
	public $userEmail;
	public $userPass;
	public $newPass;
	public $confirmPass;
	public $tableName = "useraccount";
	private $conn;
	public $sixDigitCode;
	public $codeInput;
	public $codeId;
	public $userId;
	public $encryptedEmail;
	
	function __construct($sd){
		$this->conn = $sd;

	}

	function readAll(){
		$query = "SELECT * FROM student";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}
	
	function confirm(){
			$query = "SELECT * FROM useraccount WHERE EmailAddress = ? ";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->userEmail);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$this->userId=$row['userId'];
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
		
	function checkEmailExisting(){
			$query = "SELECT * FROM codes WHERE userEmail = ? ";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->userEmail);
			
			$stmt->execute();
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
	
	function sendEmail(){
			session_start();
			$query = "SELECT * FROM codes WHERE codeId=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindparam(1, $this->codeId);
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$_SESSION['encryptedEmail'] = md5($this->userEmail);
			$_SESSION['fpEmail']=$this->userEmail;
			
			$message = '<html><body></br>
						</br>
						</br>
						</br>
						</br>
						</br>';
			$message .= '<div class="row">
						<div class="col lg-1">
						</div>
						<div class="col lg-10">
							<div class="card center" style="width: 18rem;">
							<div class="card-body center">';
			$message .= '<div class="row">
							<div class="col lg-1">
							</div>
							<div class="col lg-10">
								<div class="card center" style="width: 18rem;">
								<div class="card-body center">
						<h5 class="card-title"><center>';
			$message.=	'Your 6-digit code is:</center></h5>
						
						<div class="row fixed-center">
						<div class="col lg-12">
						<center><h4>'.$row['codeSixDigits'].'</h4>
						Copy and paste the link below to confirm:<br/><br/>http://localhost/fvhManagementSystem2/activation.php?access='.$_SESSION['encryptedEmail'].'</center>
						</div>	
						</div>
						</br>
						<p class="card-text"></p>
					</div>
							</div>
						</div>
						<div class="col lg-1">
						</div>
					</div>';
			$message .= '</html>';
			
			$to = $this->userEmail;
			$subject = 'Forgot Password';
			$emailHeading= 'Code Verification';
			$from = "From: Firmd Vacation House <firmdvacation@gmail.com>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// Additional headers
			$headers .= 'From: Firmd Vacation House<firmdvacation@gmail.com>' . "\r\n";
			$headers .= 'Cc: firmdvacation@gmail.com' . "\r\n";
			$headers .= 'Bcc: firmdvacation@gmail.com' . "\r\n";
			mail($to,$subject,$message,$headers);
		}
		
	function saveCode(){
		$query = "INSERT INTO codes SET codeId=?, codeSixDigits=?, userEmail=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->codeId);
		$stmt->bindParam(2, $this->sixDigitCode);
		$stmt->bindParam(3, $this->userEmail);
		$stmt->execute();

		return $stmt;
		
	}
	
	function validateCode(){
			$query = "SELECT * FROM codes WHERE codeSixDigits = ? AND userEmail=?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->codeInput);
			$stmt->bindParam(2, $_SESSION['fpEmail']);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			$num = $stmt->rowCount();
			
			if($num>0){
				return true;
			}
			else{
				return false;
			}
		}
	
	function changePassword(){
			$query = "UPDATE useraccount SET PasswordHash= ? WHERE EmailAddress = ? ";
			
			$stmt = $this->conn->prepare($query);
			
			$stmt->bindParam(1, $this->newPass);
			$stmt->bindParam(2, $_SESSION['fpEmail']);
			
			if($stmt->execute())
				return true;
			else
				return false;
		}
		
	function searchCode(){
		$query = "SELECT * FROM codes WHERE codeId=?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1, $this->codeId);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
			
		$this->sixDigitCode=$row['codeSixDigits'];

		return $stmt;
	}
	
	function setId(){
		$query = "SELECT * FROM codes";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$num = $stmt->rowCount();
		
		$this->codeId=$num+1;

		return $stmt;
	}
	
	function setVerified(){
			$query = "UPDATE useraccount SET verified=1 WHERE EmailAddress='example2@gmail.com'";
			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $stmt;
		}
		
	function setUserId(){
		$query = "SELECT * FROM useraccount WHERE EmailAddress=? AND userPass=?";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->userId=$row['UserID'];

		return $stmt;
	}
}
?>