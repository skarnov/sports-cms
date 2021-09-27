<script>
    function removeModal() {
        $(function () {
            $('#smallModal').modal('hide');
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
<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                مفضلة
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    مفضلة
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
                    foreach ($select_wishlist as $v_select_wishlist) {
                        ?>
                        <div class="ajax_block_product col-sp-12 col-xs-12 col-sm-6 col-md-4">
                            <div class="product-container product-block">
                                <div class="left-block">
                                    <h5 itemprop="name" class="name">
                                        <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_select_wishlist->product_id; ?>" alt="<?php echo $v_select_wishlist->product_name; ?>" title="<?php echo $v_select_wishlist->product_name; ?>" itemprop="url">
                                            <?php echo $v_select_wishlist->product_name; ?>
                                        </a>
                                    </h5>
                                    <div itemprop="offers" class="content_price">
                                        <span itemprop="price" class="price product-price">
                                            <?php echo $v_select_wishlist->product_price; ?>
                                        </span>
                                    </div>
                                    <div class='block-code'>
                                        <div class="product-image-container">
                                            <?php
                                                $product_tag = $v_select_wishlist->product_tag;
                                                if ($product_tag != NULL) {
                                                    ?>
                                                    <a class="sale-box" href="">
                                                        <span class="sale-label product-label"><?php echo $product_tag; ?></span>
                                                    </a>
                                                <?php } ?>
                                            <a class="product_img_link" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_select_wishlist->product_id; ?>" alt="<?php echo $v_select_wishlist->product_name; ?>" title="<?php echo $v_select_wishlist->product_name; ?>" itemprop="url">
                                                <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_select_wishlist->product_image_0; ?>" alt="<?php echo $v_select_wishlist->product_name; ?>" title="<?php echo $v_select_wishlist->product_name; ?>" itemprop="image" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-block">
                                    <div class="product-meta">
                                        <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_select_wishlist->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                            <span>أضف إلى السلة</span>
                                        </a>
                                        <a href="<?php echo base_url(); ?>wishlist/delete/<?php echo $v_select_wishlist->product_id; ?>" onclick="confirm('Are you sure!')" class="button btn btn-danger waves-left" title="حذف">
                                            <span>حذف</span>
                                        </a>
                                        <p class="product-desc" itemprop="description">
                                            <?php echo $v_select_wishlist->product_summery; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="content_sortPagiBar sortPagiBar-bottom">
                    <div class="bottom-pagination-content clearfix row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="pagination_bottom" class="pagination clearfix pull-right">
                                <ul class="pagination pull-left">
                                    <?php echo $this->pagination->create_links(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>