<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../classes/order-class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

switch($action){
    case 'create':
        create_new();
	break;
}
function create_new(){
        $order = new Order();
        $ProductId = $_POST['ProductId'];
        $CustomerName= ucwords($_POST['CustomerName']); 
        $Quantity = $_POST['Quantity'];

        $OrderId = $order->new_order($ProductId, $CustomerName, $Quantity);
        if(is_numeric($OrderId)){
            header('location: ../index.php?page=orders');
        }
    }
?>