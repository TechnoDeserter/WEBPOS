<?php


session_start();
define("ABSPATH", __DIR__);

require "../app/core/init.php";

$controller = $_GET['page'] ?? "home";
$controller = strtolower($controller);

if(file_exists("../app/code/" .$controller . ".php"))
{
    require "../app/code/" .$controller . ".php";
}else{
    echo "controller not found";
}

