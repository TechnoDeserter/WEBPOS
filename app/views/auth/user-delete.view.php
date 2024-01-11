<?php require viewpath('partials/head');?>

<div class="container-fluid border col-lg-4 col-md-5 mt-5 p-4 pt-5 shadow">

        <?php  if(is_array($row) && $row['remove_user']):?>
        <form method="post">
            <center>
                <h3><i class="fa-solid fa-user-xmark"></i> Delete User</h3>
                <div><?=esc(APP_NAME)?></div>
                <div class="alert alert-danger text-center mt-2"> Delete this user?! </div>
                
            </center>
            

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Username</label>
                <div class="form-control"><?=esc($row['username'])?></div>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <div class="form-control"><?=esc($row['email'])?></div>
     
            </div>

           <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Gender</label>
              <div class="form-control"><?=esc($row['gender'])?></div>

            </div>


           <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Role</label>
                <div class="form-control"><?=esc($row['role'])?></div>

            </div>

            <br>
            <button class="mb-3 mt-4 btn btn-danger float-end"><i class="fa-solid fa-trash"></i> Delete</button>
            <a href="index.php?page=admin&tab=users">
                <button type="button" class="mb-3 mt-4 btn btn-primary"><i class="fa-solid fa-ban"></i> Cancel</button>
            </a>
        </form> 
        <?php else:?>

            <?php  if(is_array($row) && !$row['remove_user']):?>
                <div class="alert alert-danger text-center">User can not be deleted!</div>
            <?php else:?>
                <div class="alert alert-danger text-center">User not found!</div>
            <?php endif;?>

            <a href="index.php?page=admin&tab=users">
                <button type="button" class="mb-3 mt-4 btn btn-danger"><i class="fa-solid fa-ban"></i> Cancel</button>
            </a>
        <?php endif;?>
    </div>
    
<?php require viewpath('partials/foot');?>
