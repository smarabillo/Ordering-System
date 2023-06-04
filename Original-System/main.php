<?php
require_once 'classes/order-class.php'; // Assuming the Order class is defined in Order.php

$order = new Order(); // Create an instance of the Order class

$dataPoints = array();

// Fetch the list of orders
$orders = $order->list_order();

if ($orders) {
    $productQuantities = array();

    // Calculate the total quantity for each product
    foreach ($orders as $orderData) {
        $productId = $orderData['ProductId'];
        $quantity = $orderData['Quantity'];

        if (isset($productQuantities[$productId])) {
            $productQuantities[$productId] += $quantity;
        } else {
            $productQuantities[$productId] = $quantity;
        }
    }

    // Prepare the data points for the chart
    foreach ($productQuantities as $productId => $quantity) {
        $productName = $order->get_prodname($productId);
        $dataPoints[] = array("label" => $productName, "value" => $quantity);
    }
}

// Prepare the data for the chart
$chartData = array(
    "chart" => array(
        "caption" => "ORDER QUANTITY BY PRODUCT",
        "theme" => "fusion",
        "paletteColors" => "#003049 ,#D62828, #f77f00, #fcbf49, #eae2b7",
        "showPercentValues" => "0",
        "numberSuffix" => ""
    ),
    "data" => $dataPoints
);

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../FusionCharts/themes/fusioncharts.theme.fusion.css">
	<link rel="stylesheet" type="text/css" href="css/chart.css">

    <title>FusionCharts | Pie Chart</title>
    <!-- FusionCharts Library -->
    <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Sofia+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	
</head>
<body>
    <?php
    // Generate a unique chart ID
    $chartId = "chart-" . uniqid();
    ?>
    <div id="<?php echo $chartId; ?>"></div>

    <script>
        FusionCharts.ready(function() {
            var chart = new FusionCharts({
                type: 'pie3d',
                renderAt: '<?php echo $chartId; ?>',
				top: 400,
                width: '100%',
                height: '635',
                dataFormat: 'json',
                dataSource: <?php echo json_encode($chartData); ?>
            });
            chart.render();
        });
    </script>
</body>
</html>
