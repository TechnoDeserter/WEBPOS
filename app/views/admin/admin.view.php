<?php require viewpath('partials/head');?>

<div class="dash">
  <div class="overlap-g">
    <div class="finjnal_1"></div>
    <div class="business">RMM's <br/> Ihaw-Ihaw Business</div>
    <h1 class="title">ADMIN</h1>
    
    <div class="menu">
      <a href="index.php?page=admin&tab=dashboard" class="menu-item <?=!$tab || $tab == 'dashboard'?'highlight':''?>"><i class="fa-solid fa-chart-line ms-2 me-2" style="color: #000000;"></i>Dashboard</a>
      <a href="index.php?page=admin&tab=products" class="menu-item <?=$tab=='products'?'highlight':''?>"><i class="fa-solid fa-cart-plus ms-2 me-2" style="color: #000000;"></i>Products</a>
      <a href="index.php?page=admin&tab=sales" class="menu-item <?=$tab=='sales'?'highlight':''?>"><i class="fa-solid fa-file-circle-check ms-2 me-2" style="color: #000000;"></i>Sales Reports</a>
      <a href="index.php?page=admin&tab=users" class="menu-item <?=$tab=='users'?'highlight':''?>"><i class="fa-solid fa-users me-2 ms-2" style="color: #000000;"></i>Users/Roles</a>
      <a href="index.php?page=logout" class="menu-item"><i class="fa-solid fa-right-from-bracket ms-2 me-2" style="color: #000000;"></i>Log Out</a>
    </div>
  </div>
  <div class="border col p-3" style="border-radius: 10px; background-color: white;">
    <h2 style="border: 2px solid white; padding: 10px; display: inline-block; background-color: white; border-radius: 10px;"><?=strtoupper($tab)?></h2>


    <?php
        switch ($tab) {
            case 'products':
                require viewpath('admin/products');
                break;

            case 'users':
                require viewpath('admin/users');
                break;

            case 'sales':
                require viewpath('admin/sales');
                break;

            default:
                require viewpath('admin/dashboard');
                break;
        }
    ?>
  </div>
</div>

<?php require viewpath('partials/foot'); ?>
