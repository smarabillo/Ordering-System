<h1>Product List</h1>
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
                <td><button class="editbtn"><a href="index.php?page=records&subpage=updateproduct&id=<?php echo $ProductId;?>"><i class="fa fa-edit"></i> edit</a></button></td>
                </tr>
            <?php
                $count++;
            }
        }else{
            echo "No Record Found.";
        }
        ?>
    </table>