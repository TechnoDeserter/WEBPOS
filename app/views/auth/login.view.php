<?php require viewpath('partials/head'); ?>

<div class="frame1">
    <div class="container">
        <form class="login-form" method="POST">
            <div class="logo-container"></div>
            <h2>Login</h2>
            <div class="form-group">
                <input  class="form-control <?=!empty($errors['email']) ? 'border-danger':''?>" type="email" id="email" name="email" required>
                <label for="email">Email</label>
                <?php if(!empty($errors['email'])):?>
                    <small class="text-danger"><?=$errors['email']?></small>
                <?php endif;?>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
                <?php if(!empty($errors['password'])):?>
                    <small class="text-danger"><?=$errors['password']?></small>
                <?php endif;?>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember Me</label>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</div>
    


<?php require viewpath('partials/foot'); ?>