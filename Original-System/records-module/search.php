<?php
include_once '../classes/record-class.php';

$product = new Product();

// Get the search query parameter 'q' from the URL
$q = isset($_GET["q"]) ? $_GET["q"] : "";

if (!empty($q)) {
  $data = $product->list_product_search($q);
} else {
  $data = $product->list_product();
}

$count = 1;

$hint='<table class="table">
        <tr>
            <th>Product Number</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th></th>
        </tr>';

// Check if there's any result
if($data != false){
    // Loop through each product and display its details in a table row
    foreach($data as $value){
        extract($value);
        $hint .= '
            <tr>
            <td>'.$ProductId.'</td>
            <td>'.$ProductName.'</td>
            <td>'.$ProductDesc.'</td>
            <td>'.$ProductPrice.'</td>
            <td><button class="editbtn"><a href="index.php?page=records&subpage=updateproduct&id='.$ProductId.'"><i class="fa fa-edit"></i> View</a></button></td>
            </tr>' 
           ;
        $count++;
       
    }
}
$hint .= '</table>';

// Output "No result(s)" if no hint was found or output the search results in a table
echo $hint === "" ? "No result(s)" : $hint;
?>

