<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                انضم الينا 
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    انضم الينا 
                </h1>
                <h3 style="color:green">
                    <div style="background-color: wheat;"><?php echo validation_errors(); ?></div>
                    <?php
                    $msg = $this->session->userdata('save_customer');
                    if (isset($msg)) {
                        echo "<p style='margin-left:2%;'>$msg</p>";
                        $this->session->unset_userdata('save_customer');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url()?>evis_store/save_customer" method="POST" id="login_form">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">
                            <div class="form-group input-field">
                                <label for="first_name">الاسم الاول</label>
                                <input type="text" name="first_name" id="name" class="is_required validate account_input form-control" data-validate="isName" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="last_name">الاسم الاخير</label>
                                <input type="text" name="last_name" id="name" class="is_required validate account_input form-control" data-validate="isName" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="text" name="customer_email" id="email" class="is_required validate account_input form-control" data-validate="isEmail" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="passwd">كلمة السر</label>
                                <input type="password" name="customer_password" id="passwd" class="is_required validate account_input form-control" data-validate="isPasswd" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="passwd">تأكيد كلمة المرور</label>
                                <input type="password" name="confirm_password" id="passwd" class="is_required validate account_input form-control" data-validate="isPasswd" value="" />
                            </div>
                            <div class="form-group input-field">
                                <label for="mobile">التليفون المحمول</label>
                                <input type="text" name="customer_mobile" id="mobile" class="is_required validate account_input form-control" data-validate="isMobile" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="box col-xs-5">
                        <div class="form-group input-field">
                            <select name="city_id" class="form-control">
                                <option value="">اختر مدينة</option>
                                <?php
                                foreach ($all_city as $v_city) {
                                    ?>
                                    <option value="<?php echo $v_city->city_id; ?>"><?php echo $v_city->city_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-field">
                            <label for="address">عنوان</label>
                            <textarea name="customer_address" class="is_required validate account_input form-control" style="resize: none; height: 100px;"></textarea>
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
                </form>
            </section>
        </div>
    </div>
</section>