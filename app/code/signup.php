<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
	$user = new User();
	$_POST['role'] = "user";	
	$_POST['date'] = date("Y-m-d H-i-s");
	
	$errors = $user->validate($_POST);
	if(empty($errors)){

		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user->insert($_POST,'users');
		
		
		redirect('admin&tab=users');
	}
	
}
if(Auth::access('owner')){
	require viewpath('auth/signup');
}
else{

	Auth::set_message("Only Admin can Create Users!!");
	require viewpath('auth/security');
}