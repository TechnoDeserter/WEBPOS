<br>
<div class="graph-container">
    <?php 
        $graph = new Graph();

        $data = daily_sales_data($today_records);
        $graph->title = "Today's Sales";
        $graph->xtitle = "Hours";
        $graph->canvasX = "1500";
        $graph->canvasY = "400";
        $graph->styles = "width: 100%; height: 100%;";
        $graph->display_graph($data);
    ?>
</div>


	<br>


<head>
	<style>
		.row {
			display: flex;
			justify-content: center;
		}
		
		.col-md-2,
		.col-md-3 {
			width: calc(33.33% - 16px);
			border-radius: 5px;
			border: 1px solid #ccc;
			padding: 20px;
			margin: 10px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			background-color: #fff; /* White background */
		}
		
		.col-md-2 h4,
		.col-md-3 h4 {
			margin-top: 0;
			margin-bottom: 10px;
		}
		
		.col-md-2 h1,
		.col-md-3 h1 {
			margin-top: 0;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-md-2">
			<h4><i class="fa-solid fa-cart-plus"></i> Total Products:</h4>
			<h1><?= $total_products ?></h1>
		</div>
		<div class="col-md-3">
			<h4><i class="fa fa-money-bill-wave"></i> This Month's Total Sales:</h4>
			<h1>₱ <?= number_format($Msales, 2) ?></h1>
		</div>
		<div class="col-md-3">
			<h4><i class="fa fa-money-bill-wave"></i> Today's Total Sales:</h4>
			<h1>₱ <?= number_format($salest, 2) ?></h1>
		</div>
		<div class="col-md-3">
			<h4><i class="fa fa-money-bill-wave"></i> Total Sales:</h4>
			<h1>₱ <?= number_format($total_sales, 2) ?></h1>
		</div>
	</div>
</body>
