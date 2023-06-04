<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-disposition: attachment; filename=".date("Y-m-d")."-products-report.xls");

include_once '../classes/record-class.php';
include '../config/config.php';

$product = new Product;

echo 'Id' . "\t" . 'Product Name' . "\t" . 'Product Desc' . "\t" . 'Product Price' . "\n";

$count = 1;
if($product->list_product() != false){
    foreach($product->list_product() as $value){
        extract($value);

            echo $ProductId . "\t" . $ProductName. "\t " .$ProductDesc . "\t" . $ProductPrice . "\n";
            
            $count++;
    }
}