<?php
class User{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='tb_system';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}

	public function new_user($UserPass,$FullName,$UserAddress,$ContactNum,$UserAccess){	

		$data = [
			[$UserPass,$FullName,$UserAddress,$ContactNum,$UserAccess],
		];
		$stmt = $this->conn->prepare("INSERT INTO tb_User (UserPass, FullName, UserAddress, ContactNum, UserAccess) VALUES (?,?,?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id = $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return $id;
	}

	public function update_user($UserId, $FullName, $UserAddress, $ContactNum, $UserAccess){

		$sql = "UPDATE tb_User SET FullName=:FullName, UserAddress=:UserAddress, ContactNum=:ContactNum, UserAccess=:UserAccess WHERE UserId=:UserId";

		$q = $this->conn->prepare($sql);
		$q->execute(array(':UserId'=>$UserId, ':FullName'=>$FullName,':UserAddress'=>$UserAddress, ':ContactNum'=>$ContactNum, ':UserAccess'=>$UserAccess));
		return true;
	}
	
	public function list_users(){
		$sql="SELECT * FROM tb_User";
		$q = $this->conn->query($sql) or die("failed!");
		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		if(empty($data)){
		   	return false;
		}else{
			return $data;	
		}
	}

	public function delete_user($id){
		$sql = "DELETE FROM tb_User WHERE UserId = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':id', $id);
		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}
	
	public function change_password($id,$password){
		$sql = "UPDATE tb_User SET UserPass=:UserPass WHERE UserId=:UserId";
		$q = $this->conn->prepare($sql);
		$q->execute(array(':UserPass'=>$password,':UserId'=>$id));
		return true;

	}

		function get_user($UserId){
			$sql="SELECT UserId FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$UserId = $q->fetchColumn();
			return $UserId;

		}

		function get_userid($UserId){
			$sql="SELECT UserId FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$UserId = $q->fetchColumn();
			return $UserId;

		}

		function get_fullname($UserId){
			$sql="SELECT FullName FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$FullName = $q->fetchColumn();
			return $FullName;

		}
		function get_address($UserId){
			$sql="SELECT UserAddress FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$UserAddress = $q->fetchColumn();
			return $UserAddress;
		}
		function get_contactnum($UserId){
			$sql="SELECT ContactNum FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$ContactNum = $q->fetchColumn();
			return $ContactNum;
		}

		function get_access($UserId){
			$sql="SELECT UserAccess FROM tb_User WHERE UserId = :UserId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['UserId' => $UserId]);
			$UserAccess = $q->fetchColumn();
			return $UserAccess;
		}

		function get_session(){
			if(isset($_SESSION['login']) && $_SESSION['login'] == true){
				return true;
			}else{
				return false;
			}
		}
		public function check_login($UserId,$UserPass){

			$sql = "SELECT count(*) FROM tb_User WHERE UserId = :text AND UserPass = :password"; 
			$q = $this->conn->prepare($sql);
			$q->execute(['text' => $UserId,'password' => $UserPass ]);
			$number_of_rows = $q->fetchColumn();
			
			if($number_of_rows == 1){
				$_SESSION['login']=true;
				$_SESSION['UserId']=$UserId;
				return true;
			}else{
				return false;
			}
		}
}
?>