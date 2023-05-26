<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "records-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<div class="submenu"> 
    <!-- <a href="index.php?page=records&subpage=orderconfirm">Orders</a> -->
    <a href="index.php?page=records&subpage=newproduct">New Product</a>
    <a href="index.php?page=records&subpage=default">Product List</a>
  
</div>
    <?php
      switch($subpage){
            case 'newproduct':
                require_once 'records-module/product-create.php';
            break; 
            case 'updateproduct':
                require_once 'records-module/product-profile.php';
            break; 
            case 'orderconfirm':
                require_once 'orders-module/order-confirmed.php';
            break;
            default:
                require_once 'records-module/main.php';
            break; 
            }
    ?>
