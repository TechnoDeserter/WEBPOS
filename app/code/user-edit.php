<?php

$errors = [];
$user = new User();

$id = $_GET['id'] ?? null;
$row = $user->first(['id'=>$id]);

if(!empty($_SERVER['HTTP_REFERER']) && !strstr($_SERVER['HTTP_REFERER'], "user-edit"))
{

	$_SESSION['refer'] = $_SERVER['HTTP_REFERER'];

}	

if ($_SERVER['REQUEST_METHOD'] == "POST")
{

	//restriction in editing profile role
	if(isset($_POST['role']) && $_POST['role'] != $row['role'])
	{
		if(Auth::get('role') != "admin")
		{
			$_POST['role'] = $row['role'];
		}
	}	

	if(!empty($_FILES['image']['name']))
	{
		$_POST['image'] = $_FILES['image'];
	}

	$errors = $user->validate($_POST, $id);
	if(empty($errors)){

		$folder = "uploads/";
		if(!file_exists($folder))
		{
			mkdir($folder,011,true);
		}

		if(!empty($_POST['image']))
		{

			$ext = strtolower(pathinfo($_POST['image']['name'],PATHINFO_EXTENSION));

			$product = new Product();	
			$destination = $folder . $product->generate_filename($ext);
			move_uploaded_file($_POST['image']['tmp_name'], $destination);
			$_POST['image'] = $destination;
			
			if(file_exists($row['image']))
			{
				unlink($row['image']);
			}
		
		}

		if(empty($_POST['password'])){
			unset($_POST['password']);
		}else{

			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}
		

		$user->update($id,$_POST);
		
		
		redirect("user-edit&id=$id");
	}
	
}
if(Auth::access('owner') || ($row && $row['id'] == Auth::get('id'))){
	require viewpath('auth/user-edit');
}
else{

	Auth::set_message("Only Admin can Create Users!!");
	require viewpath('auth/security');
}	