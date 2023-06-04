<?php
    include '../classes/order-class.php'
?>

<h1>Orders</h1>
    <table class="ordertable">
        <tr>
            <th>Order Id</th>
            <th>Order Date</th>
            <th>Customer Name</th>
            <th>Order</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th></th>
        </tr>
        <?php

        $count = 1;
        
        if(($order->list_order()) != false){
            foreach(($order->list_order()) as $value){  
            extract($value);
              ?>
                <tr>
                <td><?php echo $order->get_orderid($OrderId);?></td>
                <td><?php echo $order->get_orderdate($OrderId);?></td>
                <td><?php echo $order->get_customername($OrderId);?></td>
                <td><?php echo $order->get_prodname($ProductId).' / Php '.$order->get_prodprice($ProductId); ?></td>
                <td><?php echo $order->get_quantity($OrderId);?></td>
                <td><?php echo $TotalPrice = $order->get_prodprice($ProductId) * $order->get_quantity($OrderId);?></td>
                <td><button class="editbtn"><a><i class="fa fa-edit"></a></button></td>
                </tr>
             <?php
                $count++;
            }
        }
        ?>
    </table>
    <div class="orderform">
    <form method="POST" action="processes/order-process.php?action=create">

            <label for="CustomerName">Customer Name</label>
            <input type="text" id="customername" class="input" required name="CustomerName" placeholder="Customer's Name" oninvalid="this.setCustomValidity('Enter Customer Name')" oninput="this.setCustomValidity('')">
            
            <label for="ProductId">Order</label>
                <select required id="ProductId" class="select" required name="ProductId">

                    <?php
                    if($order->list_product() != false){
                        foreach($order->list_product() as $value){
                            extract($value);
                            ?>
                                <option value="<?php echo $ProductId;?>"><?php echo $order->get_prodname($ProductId).' / Php '.$order->get_prodprice($ProductId); ?><?; ?></option>
                            <?php
                        }
                    }
                ?>
                </select>

            <label for="Quantity">Quantity</label>
            <input type="number" id="Quantity" required name="Quantity" min="1" max="999999" placeholder="Quantity" oninvalid="this.setCustomValidity('Enter Valid Quantity')" oninput="this.setCustomValidity('')">

        <input type="submit" value="Create">
  </form>
</div> 

