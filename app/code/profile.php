<?php

$errors = [];
$user = new User();

$id = $_GET['id'] ?? Auth::get('id');
$row = $user->first(['id'=>$id]);
	
if ($_SERVER['REQUEST_METHOD'] == "POST")
{

	//restriction in editing profile role
	if($_POST['role'] == "owner")
	{
		if(!Auth::get('role') == "owner")
		{
			$_POST['role'] = "user";
		}
	}	
	
	$errors = $user->validate($_POST, $id);
	if(empty($errors)){

		if(empty($_POST['password'])){
			unset($_POST['password']);
		}else{

			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}
		

		$user->update($id,$_POST);
		
		
		redirect('admin&tab=users');
	}
	
}
if(Auth::access('owner') || ($row && $row['id'] == Auth::get('id'))){
	require viewpath('auth/profile');
}
else{

	Auth::set_message("Only Admin can Create Users!!");
	require viewpath('auth/security');
}