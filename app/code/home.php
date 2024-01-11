<?php

defined("ABSPATH") ? "":die();

if(Auth::access('cashier')){
	require viewpath('home');
}
else{

	redirect('login');	
}





