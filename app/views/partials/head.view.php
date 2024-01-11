<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=esc(APP_NAME)?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/solid.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    

    <link href="assets/css/modals.css" rel="stylesheet">
    
</head>
<body>
   
    <?php 
        $no_nav[] = "login";
        $no_nav[] = "product-add";
        $no_nav[] = "product-edit";
       
    ?>
   <?php if(!in_array($controller, $no_nav)):?>
        <?php require viewpath('partials/nav');?>
    <?php endif;?>
    <div class="container-fluid" style="min-width: 350px;">
