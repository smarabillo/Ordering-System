<h1>List New Product</h1>
<div class="productform">
    <form method="POST" action="processes/product-process.php?action=new">
      
            <label for="productname">Product Name</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="productname" class="input" name="ProductName" placeholder="Enter product name">

            <label for="productprice">Product Price</label>
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> type="text" id="productprice" class="input" name="ProductPrice" placeholder="Product price">

            <label for="productdesc">Product Description</label>
            <textarea <?php if($user->get_access($UserId) == 'Employee'){ echo 'disabled';};?> id="productdesc" class="input" name="ProductDesc" placeholder="Enter Description"></textarea>
      
            <input <?php if($user->get_access($UserId) == 'Employee'){ echo 'hidden';};?> type="submit" value="Save">
  </form>
</div>