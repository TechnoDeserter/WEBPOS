<?php

$errors = [];
$user = new User();

$id = $_GET['id'] ?? null;
$row = $user->first(['id'=>$id]);
	
if ($_SERVER['REQUEST_METHOD'] == "POST")
{


	if(is_array($row) && Auth::access('owner') && $row['remove_user'])
	{
		$user->delete($id);
		redirect('admin&tab=users');
	}
	
}
if(Auth::access('owner')){
	require viewpath('auth/user-delete');
}
else{

	Auth::set_message("Only Admin can Delete Users!!");
	require viewpath('auth/security');
}