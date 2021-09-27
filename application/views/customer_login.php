<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                تسجيل الدخول
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    تسجيل الدخول
                </h1>
                <h3 style="color:green">
                    <div style="background-color: wheat;"><?php echo validation_errors(); ?></div>
                    <?php
                    $msg = $this->session->userdata('exception');
                    if (isset($msg)) {
                        echo "<p style='margin-left:2%;'>$msg</p>";
                        $this->session->unset_userdata('exception');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_customer/customer_login_check" method="POST" id="login_form">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">  
                            <div class="form-group input-field">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="text" name="customer_email" id="email" class="is_required validate account_input form-control" data-validate="isEmail" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="passwd">كلمة السر</label>
                                <input type="password" name="customer_password" id="passwd" class="is_required validate account_input form-control" data-validate="isPasswd" value="" />
                            </div>
                            <p class="submit">
                                <button type="submit" id="SubmitLogin" class="button btn btn-outline button-medium waves-effect waves-light">
                                    <span>
                                        <i class="fa fa-user left"></i>&nbsp;
                                        انضم الينا
                                    </span>
                                </button>
                            </p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</section>