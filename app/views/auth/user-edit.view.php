<?php

if (!empty($_SESSION['refer'])) {
    $blink = $_SESSION['refer'];
} else {
    $blink = "index.php?page=admin&tab=users";
}

?>

<?php require viewpath('partials/head'); ?>

<div class="container-fluid border col-lg-4 col-md-5 mt-1 p-4 pt-3 shadow">

    <?php if (is_array($row)) : ?>
        <form method="post" enctype="multipart/form-data">
            <center>
                <h3><i class="fa-solid fa-user-pen"></i> Edit User</h3>
                <div><?= esc(APP_NAME) ?></div>
            </center>
            <br>

            <div class="mb-3">
                <div for="formFile" class="form-label">User Image</div>
                <input name="image" class="form-control <?= !empty($errors['image']) ? 'border-danger' : '' ?>" type="file" id="formFile">
                <?php if (!empty($errors['image'])) : ?>
                    <small class="text-danger"><?= $errors['image'] ?></small>
                <?php endif; ?>
            </div>

            <img class="mx-auto d-block" src="<?= $row['image'] ?>" style="width: 25%;">


            <div class="mb-3">

                <div for="exampleFormControlInput1" class="form-label">Username</div>
                <input value="<?= set_value('username', $row['username']) ?>" name="username" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="Username">
                <?php if (!empty($errors['username'])) : ?>
                    <small class="text-danger"><?= $errors['username'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">

                <div for="exampleFormControlInput1" class="form-label">Email Address</div>
                <input value="<?= set_value('email', $row['email']) ?>" name="email" type="email" class="form-control <?= !empty($errors['email']) ? 'border-danger' : '' ?>" id="exampleFormControlInput1" placeholder="name@example.com">
                <?php if (!empty($errors['email'])) : ?>
                    <small class="text-danger"><?= $errors['email'] ?></small>
                <?php endif; ?>
            </div>

            <div class="mb-3">

                <div for="exampleFormControlInput1" class="form-label">Gender</div>
                <select name="gender" class="form-select  <?= !empty($errors['gender']) ? 'border-danger' : '' ?>">
                    <option><?= $row['gender'] ?></option>
                    <option>male</option>
                    <option>female</option>
                </select>
                <?php if (!empty($errors['gender'])) : ?>
                    <small class="text-danger"><?= $errors['gender'] ?></small>
                <?php endif; ?>
            </div>

            <?php if (Auth::get('role') == "owner" || "admin") : ?>
                <div class="mb-3">

                    <div for="exampleFormControlInput1" class="form-label">Role</div>
                    <select name="role" class="form-select  <?= !empty($errors['role']) ? 'border-danger' : '' ?>">
                        <option><?= $row['role'] ?></option>
                        <option>admin</option>
                        <option>owner</option>
                        <option>supervisor</option>
                        <option>cashier</option>
                        <option>user</option>
                    </select>

                    <?php if (!empty($errors['role'])) : ?>
                        <small class="text-danger"><?= $errors['role'] ?></small>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


            <div for="inputPassword5" class="form-label">Password</div>
            <input name="password" type="password" id="inputPassword5" class="form-control <?= !empty($errors['password']) ? 'border-danger' : '' ?>" aria-labelledby="passwordHelpBlock" placeholder="Password123">
            <div id="passwordHelpBlock" class="form-text">
                <?php if (!empty($errors['password'])) : ?>
                    <small class="text-danger"><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>

            
            <div for="inputPassword5" class="form-label">RetypePassword</div>
            <input name="password_retype" type="password" id="inputPassword5" class="form-control <?= !empty($errors['password_retype']) ? 'border-danger' : '' ?>" aria-labelledby="passwordHelpBlock" placeholder="Password123">
            <?php if (!empty($errors['password_retype'])) : ?>
                <small class="text-danger"><?= $errors['password_retype'] ?></small>
            <?php endif; ?>

            <br>
            <button class="mb-3 mt-4 btn btn-primary float-end"><i class="fa-solid fa-download"></i> Save</button>


            <a href="<?= $blink ?>">
                <button type="button" class="mb-3 mt-4 btn btn-danger float-end me-3"><i class="fa-solid fa-ban"></i> Cancel</button>
            </a>
            <br>
            <br>
        </form>

    <?php else : ?>
        <div class="alert alert-danger text-center">User not found!</div>

        <a href="<?= $blink ?>">
            <button type="button" class="mb-3 mt-4 btn btn-danger"><i class="fa-solid fa-ban"></i> Cancel</button>
        </a>

    <?php endif; ?>
</div>

<?php require viewpath('partials/foot'); ?>