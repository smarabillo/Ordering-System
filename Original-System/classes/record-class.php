<?php
class Product{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='tb_system';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
		public function new_product($ProductName,$ProductDesc,$ProductPrice){
		
		$data = [
			[$ProductName,$ProductDesc,$ProductPrice],
		];
		$stmt = $this->conn->prepare("INSERT INTO tb_Products(ProductName, ProductDesc, ProductPrice) VALUES (?,?,?)");
		try {
			$this->conn->beginTransaction();
			foreach ($data as $row)
			{
				$stmt->execute($row);
			}
			$id= $this->conn->lastInsertId();
			$this->conn->commit();
			
		}catch (Exception $e){
			$this->conn->rollback();
			throw $e;
		}
		return $id;
		}

		public function update_prod($ProductId, $ProductName, $ProductPrice, $ProductDesc){

			$sql = "UPDATE tb_Products SET ProductName=:ProductName, ProductPrice=:ProductPrice, ProductDesc=:ProductDesc WHERE ProductId=:ProductId";
	
			$q = $this->conn->prepare($sql);
			$q->execute(array(':ProductId'=>$ProductId, ':ProductName'=>$ProductName,':ProductPrice'=>$ProductPrice, ':ProductDesc'=>$ProductDesc));
			return true;
		}

		public function list_product(){
			try{
				$sql="SELECT * FROM tb_Products";
				$q = $this->conn->query($sql) or die("failed!");
				while($r = $q->fetch(PDO::FETCH_ASSOC)){
				$data[]=$r;
				}
				if(empty($data)){
					return false;
				}else{
					return $data;	
				}
			}catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
				return false;
			}
		}
		
		public function list_product_search($keyword){
		
		//$keyword = "%".$keyword."%";

		$q = $this->conn->prepare('SELECT * FROM tb_Products WHERE ProductName LIKE ?');
		$q->bindValue(1, "%$keyword%", PDO::PARAM_STR);
		$q->execute();

		while($r = $q->fetch(PDO::FETCH_ASSOC)){
		$data[]= $r;
		}
		if(empty($data)){
		   return false;
		}else{
			return $data;	
		}
	}

		public function delete_prod($id){
			$sql = "DELETE FROM tb_Products WHERE ProductId = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':id', $id);
			if ($stmt->execute()) {
				return true;
			} else {
				return false;
			}
		}

	function get_prodid($ProductId){
		$sql="SELECT ProductId FROM tb_Products WHERE ProductId = :ProductId";	
		$q = $this->conn->prepare($sql);
		$q->execute(['ProductId' => $ProductId]);
		$ProductId = $q->fetchColumn();
		return $ProductId;
	}
	function get_prodname($id){
		$sql="SELECT ProductName FROM tb_Products WHERE ProductId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$ProductName = $q->fetchColumn();
		return $ProductName;
	}
	function get_proddesc($id){
		$sql="SELECT ProductDesc FROM tb_Products WHERE ProductId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$ProductDesc = $q->fetchColumn();
		return $ProductDesc;
	}

	function get_prodprice($id){
		$sql="SELECT ProductPrice FROM tb_Products WHERE ProductId = :id";	
		$q = $this->conn->prepare($sql);
		$q->execute(['id' => $id]);
		$ProductPrice = $q->fetchColumn();
		return $ProductPrice;
	}
	}
?>