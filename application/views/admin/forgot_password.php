<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Forgot Password</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/private/css/style.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo base_url(); ?>"><b>Sports</b><br/> Forget Password </a>
            </div>
            <div class="login-box-body">
                <form action="<?php echo base_url(); ?>evis_login/reset_password" method="POST">
                    <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                    <h3 style="color:red">
                        <?php
                        $exc = $this->session->userdata('exception');
                        if (isset($exc)) {
                            echo $exc;
                            $this->session->unset_userdata('exception');
                        }
                        ?>
                    </h3>
                    <div class="form-group has-feedback">
                        <input type="email" name="admin_email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-danger btn-block btn-flat">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>