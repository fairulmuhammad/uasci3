<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="container">
        <div class="form">
            <header>
                <img src="<?php echo base_url('assets/images/logo_amikom_besar.png'); ?>" style="height: 3cm" />
            </header>
            <?php if($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
            <?php endif; ?>
            <?php echo form_open('auth/login'); ?>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit" class="button">Login</button>
                <?php echo anchor('auth/register', 'Register', ['class' => 'register-link']); ?>
            <?php echo form_close(); ?>
        </div>
    </div>
</body>
</html>