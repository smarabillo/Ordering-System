<?php
 error_reporting(E_ALL); 
 ini_set('display_errors', 1); 

include '../classes/record-class.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

switch($action){
    case 'new':
        create_new();
	break;
    case 'update':
        update_prod();
	break;
    case 'delete':
        delete_prod();
	break;
}
function create_new(){
	$product = new Product();
    $ProductName= ucwords($_POST['ProductName']);  
    $ProductDesc= ucwords($_POST['ProductDesc']);  
    $ProductPrice= ucwords($_POST['ProductPrice']); 
    
    $ProductId = $product->new_product($ProductName,$ProductDesc,$ProductPrice);
    if(is_numeric($ProductId)){
        header('location: ../index.php?page=records&subpage=listproduct');
    }
}

function update_prod(){
	$product = new Product();
    $ProductId = $_POST['ProductId'];
    $ProductName = ucwords($_POST['ProductName']);
    $ProductPrice = $_POST['ProductPrice'];
    $ProductDesc = $_POST['ProductDesc'];
   
    $result = $product->update_prod($ProductId, $ProductName, $ProductPrice, $ProductDesc);
    if($result){
        header('location: ../index.php?page=records&subpage=default');
    }
}
function delete_prod(){
    if (isset($_POST['ProductId']) && is_numeric($_POST['ProductId'])) {
        $product = new Product();
        $ProductId = $_POST['ProductId'];
        $result = $product->delete_prod($ProductId);
        if ($result) {
            header('location: ../index.php?page=records&subpage=default'.$ProductId);
        } 
    }
}
?>