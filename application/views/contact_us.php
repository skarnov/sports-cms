<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                اتصل ينا
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    اتصل ينا
                </h1>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('send_email');
                    if (isset($msg)) {
                        echo "<p style='margin-left:2%;'>$msg</p>";
                        $this->session->unset_userdata('send_email');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url()?>evis_store/send_email" method="POST" id="login_form">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">
                            <div class="form-group input-field">
                                <label for="name">اسم</label>
                                <input type="text" name="name" required id="name" class="is_required validate account_input form-control" data-validate="isName" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="text" name="email" required id="email" class="is_required validate account_input form-control" data-validate="isEmail" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="box col-xs-5">
                        <div class="form-group input-field">
                            <label for="message">الرسالة</label>
                            <textarea name="message" required class="is_required validate account_input form-control" style="resize: none; height: 174px;"></textarea>
                        </div>
                        <p class="submit">
                            <button type="submit" id="SubmitLogin" class="button btn btn-outline button-medium waves-effect waves-light">
                                <span>
                                    <i class="fa fa-user left"></i>&nbsp;
                                    فعله
                                </span>
                            </button>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</section>