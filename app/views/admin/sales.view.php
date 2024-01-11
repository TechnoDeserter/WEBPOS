
<head>
	
	<style>
		body {
			background-color: white;
		}
		.table-responsive,
		.table,
		h2,
		ul.nav {
			background-color: white;
		}
	</style>
</head>
<body>
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link <?=($section == 'table') ? 'active':''?>" aria-current="page" href="index.php?page=admin&tab=sales">
				<h10>Table View</h10>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($section == 'graph') ? 'active':''?>" href="index.php?page=admin&tab=sales&s=graph">
				<h10>Graph View</h10>
			</a>
		</li>
	</ul>

	<?php if ($section == 'table'): ?>
		<div>
			<form class="row float-end">
				<div class="col">
					<div for="start">Start Date:</div>
					<input class="form-control" id="start" type="date" name="start" value="<?=!empty($_GET['start']) ? $_GET['start']:''?>">
				</div>
				<div class="col">
					<div for="end">End Date:</div>
					<input class="form-control" id="end" type="date" name="end" value="<?=!empty($_GET['end']) ? $_GET['end']:''?>">
				</div>
				<div class="col">
					<div for="limit">Rows:</div>
					<input style="max-width: 130px" class="form-control" id="limit" type="number" min="1" name="limit" value="<?=!empty($_GET['limit']) ? $_GET['limit']: $limit?>">
				</div>
				<button style="max-height:38px" class="btn col btn-outline-primary me-4 mt-4"><i class="fa fa-chevron-right"></i></button>
				<input type="hidden" name="page" value="admin">
				<input type="hidden" name="tab" value="sales">
			</form>
			<div class="clearfix"></div>
		</div>

		<div class="table-responsive">
			<h2 class="mt-2">Today's Total Sales: ₱ <?=number_format($sales_total,2)?></h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Receipt No</th>
						<th>Barcode</th>
						<th>Description</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Total</th>
						<th>Cashier</th>
						<th>Customer Name</th>
						<th>Customer Contact#</th>
						<th>Date</th>
						<th>
							<a href="index.php?page=home">
								<button type="button" class="btn btn-outline-primary btn-sm">
									<i class="fa-solid fa-plus me-1"></i>Add Sales
								</button>
							</a>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($sales)): ?>
						<?php foreach ($sales as $sale): ?>
							<tr>
								<td><?=esc($sale['receipt_no'])?></td>
								<td><?=esc($sale['barcode'])?></td>
								<td><?=esc($sale['description'])?></td>
								<td><?=esc($sale['qty'])?></td>
								<td><?=esc($sale['amount'])?></td>
								<td><?=esc($sale['total'])?></td>
								<?php
									$cashier = get_user_id($sale['user_id']);
									if(empty($cashier)){
										$name = "Unknown";
										$namelink = "#";
									}else{
										$name = $cashier['username'];
										$namelink = "index.php?page=profile&id=".$cashier['id'];
									}
								?>
								<td>
									<a href="<?=$namelink?>">
										<?=esc($name)?>
									</a>
								</td>
								<td><?=esc($sale['customer_name'])?></td>
								<td><?=esc($sale['customer_contact'])?></td>
								<td><?=date("jS M, Y",strtotime($sale['date']))?></td>
								<td>
									<a href="index.php?page=sale-edit&id=<?=$sale['id']?>">
										<button class="btn btn-outline-primary btn-sm me-1">
											<i class="fa-solid fa-pen-to-square me-1 ms-1"></i>
										</button>
									</a>
									<a href="index.php?page=sale-delete&id=<?=$sale['id']?>">
										<button class="btn btn-outline-danger btn-sm">
											<i class="fa-solid fa-trash me-1 ms-1"></i>
										</button>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>

			<?php $pager->display_page(); ?>
		</div>

	<?php else: ?>

		<br>

		<?php 
			$graph = new Graph();
			$data = daily_sales_data($today_records);
			$graph->title = "Today's Sales";
			$graph->xtitle = "Hours";
			$graph->styles = "width: 80%; margin: auto; display: block;";
			$graph->display_graph($data);
		?>
		<br>

		<?php 
			$data = monthly_sales_data($thismonth_records);
			$graph->title = "This Month's Sales";
			$graph->xtitle = "Days";
			$graph->styles = "width: 80%; margin: auto; display: block;";
			$graph->display_graph($data);
		?>
		<br>

		<?php 
			$data = yearly_sales_data($thisyear_records);
			$graph->title = "This Year's Sales";
			$graph->xtitle = "Months";
			$graph->styles = "width: 80%; margin: auto; display: block;";
			$graph->display_graph($data);
		?>
		<br>

		<?php 
			/*
			$data = weekly_sales_data($week_records);
			$graph->title = "Week's Sales";
			$graph->styles = "width: 80%;margin:auto;display:block;";
			$graph->display_graph($data);
			*/
		?>
		<br>

		<?php
			//show($data);
			//show($week_records);
			//show($thismonth_records);
			//show($thisyear_records);
		?>

	<?php endif; ?>
</body>

