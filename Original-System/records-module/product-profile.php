<h1>Product Profile</h1>
<div class="productform">
    <form method="POST" action="processes/product-process.php?action=update">
            <label for="productname">Product Name</label>

            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="hidden" id="id" class="input" name="ProductId" value="<?php echo $product->get_prodid($id);?>" placeholder="">

            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="productname" class="input" name="ProductName" value="<?php echo $product->get_prodname($id);?>" placeholder="">

            <label for="productprice">Product Price</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="productprice" class="input" name="ProductPrice" value="<?php echo $product->get_prodprice($id);?>" placeholder="">

            <label for="productdesc">Product Description</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text "id="productdesc" class="input" name="ProductDesc" value="<?php echo $product->get_proddesc($id);?>" placeholder="">
      
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" value="update">
  </form>
  <!-- <form method="POST" action="processes/product-process.php?action=delete">
      <span><button type="submit" name="ProductId" value="<?php echo $id?>"><a>Delete</a></button></span>
  </form>  -->
</div>


