<?php session_start(); ?>
<?php require 'pages/inc/_global/config.php'; ?>
<?php require 'pages/inc/_global/views/head_start.php'; ?>
<?php require 'pages/inc/_global/views/head_end.php'; ?>
<?php require 'pages/inc/_global/views/page_start.php'; ?>

<!-- Page Content -->
<div class="hero-static d-flex align-items-center">
    <div class="w-100">
        <!-- Sign In Section -->
        <div class="bg-white">
            <div class="content content-full">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                        <!-- Header -->
                        <div class="text-center">
                            
                            <h1 class="h4 mb-1">
                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> SIGN IN
                            </h1>
                            <h2 class="h6 font-w400 text-muted mb-3">
                                HIV/AIDS Patient Centralized System
                            </h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-signin" action="backend/login.php" method="POST">
                            <div class="py-3">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Email..." required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password..." required>
                                </div>
                                <div class="form-group">
                                    <div class="d-md-flex align-items-md-center justify-content-md-between">
                                        <div class="custom-control custom-switch">
                                            <?php if(isset($_SESSION['danger'])) { ?>
                                                    <div class="alert alert-danger"><?=$_SESSION['danger']?></div>
                                            <?php $_SESSION['danger'] = null; } ?>
                                        </div>
                                        <div class="py-2">
                                            <a class="font-size-sm" href="op_auth_reminder2.php">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-0">
                                <div class="col-md-6 col-xl-5">
                                    <button type="submit" class="btn btn-block btn-danger">
                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Sign In Section -->

        <!-- Footer -->
        <div class="font-size-sm text-center text-muted py-3">
            &copy; <span data-toggle="year-copy"></span>
        </div>
        <!-- END Footer -->
    </div>
</div>
<!-- END Page Content -->

<?php require 'pages/inc/_global/views/page_end.php'; ?>
<?php require 'pages/inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $one->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $one->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'pages/inc/_global/views/footer_end.php'; ?>
