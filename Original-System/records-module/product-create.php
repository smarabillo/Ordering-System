<h1>List New Product</h1>
<div class="productform">
    <form method="POST" action="processes/product-process.php?action=new">
            <label for="productname">Product Name</label>
            <input type="text" id="productname" class="input" name="ProductName" placeholder="Enter product name">

            <label for="productprice">Product Price</label>
            <input type="text" id="productprice" class="input" name="ProductPrice" placeholder="Product price">

            <label for="productdesc">Product Description</label>
            <textarea id="productdesc" class="input" name="ProductDesc" placeholder="Enter Description"></textarea>
      
            <input type="submit" value="Save">
  </form>
</div>