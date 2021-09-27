<script>
    function removeModal() {
        $(function () {
            $('#smallModal').modal('hide');
        });
    }
    function removeWishlist() {
        $(function () {
            $('#Wishlist').modal('hide');
        });
    }
</script>
<!--SHOPPING CART MODAL-->
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">اضاف الي البطاقة</h4>
            </div>
            <div class="modal-body">
                <h3>تم بنجاح</h3>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary" onclick="removeModal();">استمرار التسوق</button>
            </div>
        </div>
    </div>
</div>
<!--END OF SHOPPING CART MODAL-->
<!-- WISHLIST-->
<div class="modal fade" id="Wishlist" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">اضاف الي قائمة الرغبات</h4>
            </div>
            <div class="modal-body">
                <h3>تم بنجاح</h3>
            </div>
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-primary" onclick="removeWishlist();">استمرار التسوق</button>
            </div>
        </div>
    </div>
</div>
<!-- END OF WISHLIST-->
<script type="text/javascript">
    var FancyboxI18nClose = 'إغلاق';
    var FancyboxI18nNext = 'التالي';
    var FancyboxI18nPrev = 'السابق';
    var added_to_wishlist = 'وأضاف لسلة المفضلة.';
    var ajaxsearch = true;
    var comparator_max_item = '3';
    var comparedProductsIds = [];
    var contentOnly = false;
    var displayList = false;
    var id_lang = 9;
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var loggin_required = 'يجب تسجيل الدخول لإدارة سلة المفضلة.';
    var max_item = 'You cannot add more than 3 product(s) to the product comparison';
    var min_item = 'الرجاء اختيار منتج واحد على الأقل';
    var mywishlist_url = 'login5d15.html';
    var page_name = 'supplier';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var quickView = true;
    var request = '1__fashion-supplier.html';
    var roundMode = 2;
    var search_url = 'search.html';
    var static_token = '67dbc401aa40db031adb1eea22cc549d';
    var token = '49ab1172d1b3fe97ea124791076db6e3';
    var usingSecureMode = false;
    var wishlistProductsIds = false;
</script>
<style>
    .button_style{
        background-color: black;
    }
</style>
<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                <?php echo $category->category_name; ?>
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    <?php echo $category->category_name; ?>
                </h1>
                <div class="content_sortPagiBar clearfix z-depth-1">
                    <div class="sortPagiBar clearfix">					
                        <div class="col-md-10 col-sm-8 col-xs-6">				
                            <div class="sort row">
                                <div class="display pull-left hidden-xs">
                                    <span class="display-view">عرض</span>
                                    <div id="grid"><a rel="nofollow" href="#" title="شبكة"><i class="fa fa-th-large"></i></a></div>
                                    <div id="list"><a rel="nofollow" href="#" title="قائمة"><i class="fa fa-th-list"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product_list grid row product-default">
                    <?php
                    foreach ($category_product as $v_category_product) {
                        ?>
                        <div class="ajax_block_product col-sp-12 col-xs-12 col-sm-6 col-md-4">
                            <div class="product-container product-block">
                                <div class="left-block">
                                    <h5 itemprop="name" class="name">
                                        <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_category_product->product_id; ?>" title="<?php echo $v_category_product->product_name; ?>" itemprop="url">
                                            <?php echo $v_category_product->product_name; ?>
                                        </a>
                                    </h5>
                                    <div itemprop="offers" class="content_price">
                                        <span itemprop="price" class="price product-price">
                                            <?php echo $v_category_product->product_price . ' '; ?> ريال
                                        </span>
                                    </div>
                                    <div class='block-code'>
                                        <span class='btn-floating open-hover waves-effect'>
                                            <i class='mdi-navigation-more-vert'></i>
                                        </span>
                                        <div class="product-image-container">
                                            <a class="product_img_link" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_category_product->product_id; ?>" alt="<?php echo $v_category_product->product_name; ?>" title=" <?php echo $v_category_product->product_name; ?>" itemprop="url">
                                                <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_category_product->product_image_0; ?>" alt="<?php echo $v_category_product->product_name; ?>" title="<?php echo $v_category_product->product_name; ?>" itemprop="image" />
                                            </a>
                                            <?php
                                            $product_tag = $v_category_product->product_tag;
                                            if ($product_tag != NULL) {
                                                ?>
                                                <a class="sale-box">
                                                    <span class="sale-label product-label"><?php echo $product_tag; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        $customer_id = $this->session->userdata('customer_id');
                                        if ($customer_id == NULL) {
                                            ?>
                                            <div class="functional-buttons clearfix">        
                                                <a href="<?php echo base_url(); ?>login" class="btn-tooltip addToWishlist wishlistProd_2" title="اضف الى قائمة الامنيات">
                                                    <i class="mdi-action-favorite btn-floating btn-large waves-effect waves-light"></i><span class="i-wishlist">مفضلة</span>
                                                </a>
                                            </div>
                                            <?php
                                        } else {
                                            ?>
                                            <div class="functional-buttons clearfix">        
                                                <a class="btn-tooltip addToWishlist wishlistProd_2" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_category_product->product_id; ?>);" title="اضف الى قائمة الامنيات">
                                                    <i class="mdi-action-favorite btn-floating btn-large waves-effect waves-light"></i><span class="i-wishlist">مفضلة</span>
                                                </a>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <div class="product-meta">
                                        <?php
                                        if ($customer_id == NULL) {
                                            ?>
                                            <a href="<?php echo base_url(); ?>login" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                <span>أضف إلى السلة</span>
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_category_product->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                <span>أضف إلى السلة</span>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                        <p class="product-desc" itemprop="description">
                                            <?php echo $v_category_product->product_summery; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Start Pagination Area -->
                <div class="col-md-8 col-sm-8 col-xs-8 pull-right" style="padding:3%;">
                    <!-- Start Pagination -->
                    <form name="pagination">
                        <?php
                        $number_of_pages = ceil($total_product / $limit);
                        ?>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <?php if (($start - $limit) >= 0) { ?>
                                <a href="<?php echo base_url(); ?>evis_store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3); ?>" class='btn btn-sm btn-success'><</a>
                                <a href="<?php echo base_url(); ?>evis_store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start - $limit); ?>" class='btn btn-sm bt'><<</a>
                            <?php } ?>
                        </div>
                        <div class='col-lg-3 col-md-3 col-sm-3'>
                            <?php for ($i = 0; $i < $number_of_pages;) { ?>
                                <a href="<?php echo base_url(); ?>evis_store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($i * $limit); ?>" class='btn btn-sm btn-warning <?php
                                if ($start == ($i * $limit)) {
                                    echo "button_style";
                                }
                                ?>'><?php echo ++$i; ?> </a>
                               <?php } ?>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <?php if ($start + $limit < $total_product) { ?>
                                <a href="<?php echo base_url(); ?>evis_store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . ($start + $limit); ?>" class='btn btn-sm btn-default'>></a>
                                <a href="<?php echo base_url(); ?>evis_store/<?php echo $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . (($number_of_pages - 1) * $limit); ?>" class='btn btn-sm btn-success'>>></a>
                            <?php } ?>
                        </div>
                        <script type="text/javascript">
                            document.forms['pagination'].elements['per_page'].value = '<?php echo $limit ?>';
                        </script>
                    </form>
                    <!-- End Pagination -->
                </div>
                <!-- End Pagination Area -->
            </section>
        </div>
    </div>
</section>