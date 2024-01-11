<?php 

$errors = [];

$id = $_GET['id'] ?? null;
$product = new Product();

$row = $product->first(['id'=>$id]);

if($_SERVER['REQUEST_METHOD'] == "POST" && $row)
{	
		$product->delete($row['id']);

			if(file_exists($row['image']))
			{
				unlink($row['image']);
			}
		

		redirect('admin&tab=products');
}

require viewpath('products/product-delete');