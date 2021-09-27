<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                دفع 
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    دفع 
                </h1>
                <form action="<?php echo base_url() ?>checkout/save_payment_form" method="POST" name="shipping">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">
                            <div class="radio-primary">
                                <input type="radio" name="payment_type" value="COD" checked/>
                                <label for="payment_type" style="font-size: 2em;">الدفع عند التسليم</label>
                            </div>
                            <p class="submit">
                                <button type="submit" id="SubmitLogin" class="button btn btn-outline button-medium waves-effect">
                                    <span>
                                        <i class="fa fa-money"></i>&nbsp;
                                        تتفق ترتيب
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