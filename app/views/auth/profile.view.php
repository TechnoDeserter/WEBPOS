<?php require viewpath('partials/head');?>

<div class="container-fluid border col-lg-4 col-md-5 mt-5 p-4 pt-5 shadow">

            <?php  if(is_array($row)):?>
            <center>
                <h3><i class="fa fa-user"></i> User Profile</h3>
                <div><?=esc(APP_NAME)?></div>
            </center>
            <br>
            <center><img src="<?=crop($row['image'],400,$row['gender'])?>" style="width: 100%;max-width:100px;" ></center>
            <table class="table table-responsive  table-hover table-striped">
                <br>
                    <th>Username</th><td><?=$row['username']?></td>
                </tr>  
                <tr>
                    <th>Email</th><td><?=$row['email']?></td>
                </tr> 
                <tr>
                    <th>User ID</th><td><?=$row['id']?></td>
                </tr>  

                <tr>
                    <th>Gender</th><td><?=$row['gender']?></td>
                </tr>  
                <tr>
                    <th>Role</th><td><?=$row['role']?></td>
                </tr>  
                <tr>
                    <th>Date Created</th><td><?=get_date($row['date'])?></td>
                </tr>  


            </table>
            <br> 
            <a href="index.php?page=user-edit&id=<?=$row['id']?>">
                <button class="btn btn-outline-primary float-end my-auto mb-3 mt-2"><i class="fa-solid fa-pen-to-square me-1"></i>Edit</button>
            </a>

           
            <a href="index.php?page=user-delete&id=<?=$row['id']?>">
                <button class="mb-3 mt-2 btn btn-outline-danger float-end me-2"><i class="fa-solid fa-trash me-1"></i>Delete</button>
            </a>
         
            <div class="clearfix"></div>

           

     
        <?php else:?>
            <div class="alert alert-danger text-center">User not found!</div>

        <?php endif;?>
    </div>
    
<?php require viewpath('partials/foot');?>
