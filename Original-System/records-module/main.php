<div class="submenusearch">
  <a>Search<input type="text" id="search" name="search" placeholder="search products  " onkeyup="showResults(this.value)"></a>
</div>
    
<div class="button-container">
    <form method="POST" action="reports/xls-product.php">
        <button <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?>><a class="editbtn"><i class="fa fa-download"></i> Download Excel</a></button>
    </form> 
    <form method="POST" action="reports/pdf-product.php?">
        <button <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?>><a class="editbtn"><i class="fa fa-download"></i> Download  PDF</a></button>
    </form> 
</div>

<div id="page-title">
    <h1>Product List</h1>
</div>

<div id="search-result">

<table class="table">
    <tr>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Product Price</th>
        <th></th>
        
    </tr>
    
    <?php

    $count = 1;
    
    if($product->list_product() != false){
        foreach($product->list_product() as $value){
        extract($value);
        ?>
            <tr>
            <td><?php echo $ProductId;?></td>
            <td><?php echo $ProductName;?></td>
            <td><?php echo $ProductDesc;?></td>
            <td>Php <?php echo $ProductPrice;?></td>
            <td><button class="editbtn"><a href="index.php?page=records&subpage=updateproduct&id=<?php echo $ProductId;?>"><i class="fa fa-edit"></i> View</a></button></td>
            </tr>
        <?php
            $count++;
        }
    }else{
        echo "No Record Found.";
    }
    ?>
</table>
