<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Oganda adventures - Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets1/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets1/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <img src="<?php echo base_url(); ?>assets/images/logo.jpg" alt="" height="30">
                                    <h5 class="text-muted">Enter your email address and password to access admin panel.</h5>
                                    <?php echo '<label class="text-danger">'.$this->session->flashdata('error'); ?>
                                </div>

                                <form method="post" action="<?php echo base_url();?>og/admin_login/admin_login_validation">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" placeholder="Enter your email">
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Enter your password">
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me?</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <input type="submit" name="submit" value="Log In" class="btn btn-primary btn-block">
                                        <br>
                                    </div>
                                    <div class="form-group mb-0 text-right">
                                        <p> <a href="pages-recoverpw.html" class="text-blue-50">Forgot your password?</a></p>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2019 &copy; Oganda adventures <a href="#" 
        </footer>

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets1/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets1/js/app.min.js"></script>
        
    </body>
</html>