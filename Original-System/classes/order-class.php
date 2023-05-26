<?php
class Order{
	private $DB_SERVER='localhost';
	private $DB_USERNAME='root';
	private $DB_PASSWORD='';
	private $DB_DATABASE='tb_system';
	private $conn;
	public function __construct(){
		$this->conn = new PDO("mysql:host=".$this->DB_SERVER.";dbname=".$this->DB_DATABASE,$this->DB_USERNAME,$this->DB_PASSWORD);
		
	}
	
	public function new_order($ProductId, $CustomerName, $Quantity){

		$NOW = new DateTime('now', new DateTimeZone('Asia/Manila'));
		$NOW = $NOW->format('Y-m-d H:i:s');
		 
		$data = [
			[$NOW, $ProductId, $CustomerName, $Quantity],
		];
		$stmt = $this->conn->prepare("INSERT INTO tb_Orders (OrderDate, ProductId, CustomerName, Quantity) VALUES (?,?,?,?)");		
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
	public function list_order(){
		$sql="SELECT * FROM tb_Orders";
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

	public function list_product(){
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
	}

		function get_orderid($OrderId){
			$sql="SELECT OrderId FROM tb_Orders WHERE OrderId = :OrderId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['OrderId' => $OrderId]);
			$OrderId = $q->fetchColumn();
			return $OrderId;
		}

		function get_orderdate($OrderId){
			$sql="SELECT OrderDate FROM tb_Orders WHERE OrderId = :OrderId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['OrderId' => $OrderId]);
			$OrderDate = $q->fetchColumn();
			return $OrderDate;
		}
		
		function get_customername($OrderId){
			$sql="SELECT CustomerName FROM tb_Orders WHERE OrderId = :OrderId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['OrderId' => $OrderId]);
			$CustomerName = $q->fetchColumn();
			return $CustomerName;
		}

		function get_quantity($OrderId){
			$sql="SELECT Quantity FROM tb_Orders WHERE OrderId = :OrderId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['OrderId' => $OrderId]);
			$Quantity = $q->fetchColumn();
			return $Quantity;
		}

		function get_totalprice($OrderId){
			$sql="SELECT TotalPrice FROM tb_Orders WHERE OrderId = :OrderId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['OrderId' => $OrderId]);
			$TotalPrice = $q->fetchColumn();
			return $TotalPrice;
		}

		function get_prodid($ProductId){
			$sql="SELECT ProductId FROM tb_Products WHERE ProductId = :ProductId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['ProductId' => $ProductId]);
			$ProductId = $q->fetchColumn();
			return $ProductId;
		}
		function get_prodname($ProductId){
			$sql="SELECT ProductName FROM tb_Products WHERE ProductId = :ProductId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['ProductId' => $ProductId]);
			$ProductName = $q->fetchColumn();
			return $ProductName;
		}
		function get_proddesc($ProductId){
			$sql="SELECT ProductDesc FROM tb_Products WHERE ProductId = :ProductId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['ProductId' => $ProductId]);
			$ProductDesc = $q->fetchColumn();
			return $ProductDesc;
		}
	
		function get_prodprice($ProductId){
			$sql="SELECT ProductPrice FROM tb_Products WHERE ProductId = :ProductId";	
			$q = $this->conn->prepare($sql);
			$q->execute(['ProductId' => $ProductId]);
			$ProductPrice = $q->fetchColumn();
			return $ProductPrice;
		}
	}
?>