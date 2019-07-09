<link rel="stylesheet" href="<?php echo base_url('assets/build/css/login.css'); ?>">
<?php $this->load->view('public/partials/login.php'); ?>

<body style="background: url(uploads/l.jpg); color:white;">
<div class="full">
    <div class="loginPage" style="background: rgba(0,0,0,0.8);">    
        <header>
            <h2>Login</h2>
        </header>
        <?php echo validation_errors(); ?>
        
        <?php echo form_open('login/checklogin'); ?>
            <input placeholder="Email" type="email" name="email">
            <input placeholder="Password" type="password" name="password">
            <section class="links">
                <button class="button"><span>LOGIN</span></button>
                <br><br>
            </section>
            <ul style="list-style: none; text-align: center; color: white;">
                <li> Dont have accout? <a class="color8" href="<?php echo base_url('employee/add'); ?>">SignUp</a></li>
            </ul>
        </form>
    </div>
</div>