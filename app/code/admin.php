<?php

$tab = $_GET['tab'] ?? 'dashboard';


if ($tab == "products") 
{
	
	$productClass = new Product();
	$products = $productClass->query("select * from products order by id desc");


}else
if ($tab == "sales") 
{	

	$section = $_GET['s'] ?? 'table';
	$startdate = $_GET['start'] ?? null;
	$enddate = $_GET['end'] ?? null;

	$saleClass = new Sale();

	$limit = $_GET['limit'] ?? 10;
	$limit = (int)$limit;
	$limit = $limit < 1 ? 10 : $limit;

	$pager = new Pager($limit); 
	$offset = $pager->offset;
	
	$query = "select * from sales order by id desc limit $limit offset $offset";
	//today's sales
	$year =  date("Y");
	$month =  date("m");
	$day =  date("d");

	$query_total = "SELECT sum(total) as total FROM sales WHERE day(date) = $day &&  month(date) = $month && year(date) = $year";


	
	//start and end date
	if($startdate && $enddate)
	{
		$startyear = date("Y",strtotime($startdate));
		$startmonth = date("m",strtotime($startdate));
		$startday = date("d",strtotime($startdate));

		$endyear = date("Y",strtotime($enddate));
		$endmonth = date("m",strtotime($enddate));
		$endday = date("d",strtotime($enddate));

		$query = "select * from sales where (year(date) >= '$startyear' && month(date) >= '$startmonth' && day(date) >= '$startday') && (year(date) <= '$endyear' && month(date) <= '$endmonth' && day(date) <= '$endday') order by id desc limit $limit offset $offset";
		$query_total = "select sum(total) as total from sales where (year(date) >= '$startyear' && month(date) >= '$startmonth' && day(date) >= '$startday') && (year(date) <= '$endyear' && month(date) <= '$endmonth' && day(date) <= '$endday')";

	}else

	$query = "select * from sales order by id desc limit $limit offset $offset";
	//start date
	if($startdate && !$enddate)
	{
		$startyear = date("Y",strtotime($startdate));
		$startmonth = date("m",strtotime($startdate));
		$startday = date("d",strtotime($startdate));


		$query = "select * from sales where (year(date) = '$startyear' && month(date) = '$startmonth' && day(date) = '$startday') order by id desc limit $limit offset $offset";
		$query_total = "select sum(total) as total from sales where (year(date) = '$startyear' && month(date) = '$startmonth' && day(date) = '$startday')";

	}


	$sales = $saleClass->query("$query");
	
	$stotal = $saleClass->query("$query_total");
	
	$sales_total = 0;
	if($stotal){
		$sales_total = $stotal[0]['total'] ?? 0;
	}

	if($section == 'graph')
	{
		//read graph data
		$db = new Database();

		//query todays records
		$today = date('Y-m-d');
		$query = "SELECT total,date FROM sales WHERE DATE(date) = '$today' ";
		$today_records = $db->query($query);

		//query week records
		$week = date('W');
		$query = "SELECT total,date FROM `sales` WHERE week(date); '$week' ";
		$week_records = $db->query($query);



		//query this months records
		$thismonth = date('m');
		$thisyear = date('Y');
		$query = "SELECT total,date FROM sales WHERE month(date) = '$thismonth' && year(date) = '$thisyear'";
		$thismonth_records = $db->query($query);

		//query this years records
		$query = "SELECT total,date FROM sales WHERE year(date) = '$thisyear'";
		$thisyear_records = $db->query($query);

	}

}else

if ($tab == "users") 
{
	$limit = 5;
	$pager = new Pager($limit);
	$offset = $pager->offset;

	$userClass = new User();
	$users = $userClass->query("select * from users order by id desc limit $limit offset $offset");

}else

if($tab == "dashboard")
{

	$db = new Database();
	$query = "select count(id) as total from users";

	$myusers = $db->query($query);
	$total_users = $myusers[0]['total'];

	$query = "select count(id) as total from products";

	$myproducts = $db->query($query);
	$total_products = $myproducts[0]['total'];

	$query = "select sum(total) as total from sales";

	$mysales = $db->query($query);
	$total_sales = $mysales[0]['total'];

	
	$year = date("Y");
	$month = date("m");
	$day = date("d");
	$query = "SELECT sum(total) as total FROM sales WHERE day(date) = $day && month(date) = $month && year(date) = $year";
	$sales = $db->query($query);
	$salest = $sales[0]['total'];

	//query this months records
	$thismonth = date('m');
	$thisyear = date('Y');
	$query = "SELECT sum(total) as total FROM sales WHERE month(date) = '$thismonth' && year(date) = '$thisyear'";
	$salesm = $db->query($query);
	$Msales = $salesm[0]['total'];


	$today = date('Y-m-d');
	$query = "SELECT total,date FROM sales WHERE DATE(date) = '$today' ";
	$today_records = $db->query($query);

		

	}


if(Auth::access('owner')){
	require viewpath('admin/admin');
}
else{

	Auth::set_message("You don't have access to ADMIN PAGE!!");
	require viewpath('auth/security');
}