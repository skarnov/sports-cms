<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                الدفع 
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    الدفع 
                </h1>                
                <form action="<?php echo base_url() ?>checkout/save_shipping_form" method="POST" name="shipping">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">
                            <div class="form-group input-field">
                                <label for="first_name">الاسم الاول</label>
                                <input type="text" name="shipping_first_name" value="<?php echo $customer_info->first_name; ?>" id="name" class="is_required validate account_input form-control" data-validate="isName" />
                            </div>
                            <div class="form-group input-field">
                                <label for="last_name">الاسم الاخير</label>
                                <input type="text" name="shipping_last_name" value="<?php echo $customer_info->last_name; ?>" id="name" class="is_required validate account_input form-control" data-validate="isName" />
                            </div>
                            <div class="form-group input-field">
                                <label for="email">البريد الإلكتروني</label>
                                <input type="text" name="shipping_email" value="<?php echo $customer_info->customer_email; ?>" id="email" class="is_required validate account_input form-control" data-validate="isEmail" />
                            </div>
                            <div class="form-group input-field">
                                <label for="mobile">التليفون المحمول</label>
                                <input type="text" name="shipping_mobile" value="<?php echo $customer_info->customer_mobile; ?>" id="mobile" class="is_required validate account_input form-control" data-validate="isMobile" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="box col-xs-5">
                        <div class="form-group input-field">
                            <label for="city">اختر مدينة</label>
                            <input type="text" name="shipping_city" value="<?php echo $customer_info->city_name; ?>" id="city" class="is_required validate account_input form-control" data-validate="isCity" />
                        </div>
                        <div class="form-group input-field">
                            <label for="address">عنوان</label>
                            <textarea name="shipping_address" class="is_required validate account_input form-control" style="resize: none; height: 100px;"><?php echo $customer_info->customer_address; ?></textarea>
                        </div>
                        <p class="submit">
                            <button type="submit" id="SubmitLogin" class="button btn btn-outline button-medium waves-effect waves-light">
                                <span>
                                    <i class="fa fa-user left"></i>&nbsp;
                                    الدفع 
                                </span>
                            </button>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </div>
</section>