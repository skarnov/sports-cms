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
<div id="slideshow" class="clearfix">
    <div class="container">
        <div class="row ApRow">
            <div class="col-md-4 ApColumn">
                <div class="ApSlideShow">
                    <h3 class="title-div">المبارات القادمة</h3>
                    <table>
                        <?php
                        foreach ($today_match as $v_today_match) {
                            ?>
                            <tr class="odd-tr">
                                <td width="5%"><a href="<?php echo base_url(); ?>evis_store/match_prediction/<?php echo $v_today_match->match_id; ?>" class="btn btn-success">تنبؤ</a></td>
                                <td width="30%" height="37px"><?php echo $v_today_match->first_team; ?></td>
                                <td width="35%">-<?php echo $v_today_match->match_time; ?>-</td>
                                <td width="30%"><?php echo $v_today_match->opposite_team; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-8 ApColumn">
                <div id="slideshow-form_11616043454670915" class="ApSlideShow">
                    <div class="bannercontainer banner-fullwidth" style="padding: 0;margin: 0;">
                        <div id="iview">
                            <?php
                            foreach ($all_slide as $v_slide) {
                                ?>
                                <div class="slide_config"
                                     data-leo_image= "<?php echo base_url() . $v_slide->slide_image; ?>"
                                     data-leo_background="image">
                                    <div class="tp-caption" 
                                         data-x="260"
                                         data-y="330"
                                         data-transition="fade"
                                         style="font-size:14px;color: #333333;background-color:rgba(255, 255, 255, 0.9);font-size:18px;text-align:right">
                                        <!-- LAYER TEXT BEGIN -->
                                        <?php echo $v_slide->slide_title; ?>
                                        <!-- LAYER TEXT END -->
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            jQuery("#iview").iView({
                                pauseTime: 5000, // Delay
                                startSlide: 0,
                                autoAdvance: 1, // Enable Timer
                                pauseOnHover: 0,
                                randomStart: 0, // Ramdom Slide When Start
                                // Timer
                                timer: "360Bar",
                                timerPosition: "top-right", // Top-Right, Top Left
                                timerX: 10,
                                timerY: 10,
                                timerOpacity: 0.5,
                                timerBg: "#000",
                                timerColor: "#EEE",
                                timerDiameter: 30,
                                timerPadding: 4,
                                timerStroke: 3,
                                timerBarStroke: 1,
                                timerBarStrokeColor: "#EEE",
                                timerBarStrokeStyle: "solid",
                                playLabel: "Play",
                                pauseLabel: "Pause",
                                closeLabel: "Close", // Muli Language
                                // Navigator Control
                                controlNav: 0, // true : enable navigate - default:'false'
                                keyboardNav: 0, // true : enable keybroad
                                controlNavThumbs: 0, // true show thumbnail, false show number ( bullet )
                                controlNavTooltip: 0, // true : hover to bullet show thumnail
                                tooltipX: 5,
                                tooltipY: -5,
                                controlNavHoverOpacity: 1, // opacity navigator
                                // DIRECTION
                                controlNavNextPrev: false, // false dont show direction at navigator
                                directionNav: 0, // true  show direction at image ( in this case : enable direction )
                                directionNavHoverOpacity: 1, // direction opacity at image
                                nextLabel: "Next", // Muli language
                                previousLabel: "Previous", // Muli language
                                // ANIMATION 
                                fx: 'random', // Animation
                                animationSpeed: 500, // time to change slide
                                //		strips: 20,
                                strips: 1, // set value is 1 -> fix animation full background
                                blockCols: 10, // number of columns
                                blockRows: 5, // number of rows
                                captionSpeed: 500, // speed to show caption
                                captionOpacity: 1, // caption opacity
                                captionEasing: 'easeInOutSine', // caption transition easing effect, use JQuery Easings effect
                                customHtmlBullet: false,
                                rtl: true,
                                height: 380,
                                //onBeforeChange: function(){}, // Triggers before a slide transition
                                //onAfterChange: function(){}, // Triggers after a slide transition
                                //onSlideshowEnd: function(){}, // Triggers after all slides have been shown
                                //onLastSlide: function(){}, // Triggers when last slide is shown
                                //onPause: function(){}, // Triggers when slider has paused
                                //onPlay: function(){} // Triggers when slider has played
                                onAfterLoad: function ()
                                {
                                    // THUMBNAIL
                                    // BULLET
                                    // Display timer
                                    $('#iview-timer').hide();
                                },
                            });
                        });
                        $(document).ready(function () {
                            $(".img_disable_drag").bind('dragstart', function () {
                                return false;
                            });
                        });
                        $(document).ready(function () {
                            // step 1
                            var link_event = 'click';
                            // step 3
                            $("#iview .slide_config").on("click", function ()
                            {
                                if (link_event !== 'click') {
                                    link_event = 'click';
                                    return;
                                }
                                if ($(this).data('link') != undefined && $(this).data('link') != '') {
                                    window.open($(this).data('link'), $(this).data('target'));
                                }
                            });
                            // step 2
                            $("#iview .slide_config").on('swipe', function () {
                                link_event = 'swiped';	// dont do click event
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <!-- Center -->
            <section id="center_column" class="col-md-12">
                <div class="clearfix">
                    <div class="row ApRow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                            <div class="tabs-left">
                                <div class="block_content">
                                    <ul class="nav nav-tabs col-md-3" role="tablist">
                                        <?php
                                        foreach ($all_category as $v_category) {
                                            ?>
                                            <li class="tab-1 waves-effect waves-light">
                                                <a href="<?php echo base_url(); ?>evis_store/product_listing/<?php echo $v_category->category_id; ?>" class="form_7938480316807773" style="color: white; background-color: <?php echo $v_category->color_code_name; ?>">
                                                    <span><?php echo $v_category->category_name; ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>          
                                    </ul>
                                    <div class="col-md-9">
                                        <div class="tab-pane">
                                            <div class="block ApProductList">
                                                <input type="hidden" class="apconfig" value='{"form_id":"form_9376089360571382","select_by_categories":"1","categorybox":"3","category_type":"all","product_type":"all","order_way":"asc","order_by":"position","columns":"3","nb_products":"3","profile":"plist1428323172","class":"ApProductList","rtl":"1","page_number":"1","get_total":false}'/>
                                                <!-- Latest Products list -->
                                                <ul class="product_list grid row product-default">
                                                    <?php
                                                    foreach ($new_product as $v_new_product) {
                                                        ?>
                                                        <li class="ajax_block_product product_block col-md-4 col-xs-12 first_item">
                                                            <div class="product-container product-block">
                                                                <div class="left-block">
                                                                    <h5 itemprop="name" class="name">
                                                                        <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_new_product->product_id; ?>">
                                                                            <?php echo $v_new_product->product_name; ?>
                                                                        </a>
                                                                    </h5>
                                                                    <div itemprop="offers" class="content_price">
                                                                        <span itemprop="price" class="price product-price">
                                                                            <?php echo $v_new_product->product_price; ?> ريال
                                                                        </span>
                                                                    </div>
                                                                    <div class='block-code'>
                                                                        <span class='btn-floating open-hover waves-effect'><i class='mdi-navigation-more-vert'></i></span>
                                                                        <div class="product-image-container">
                                                                            <a class="product_img_link"	href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_new_product->product_id; ?>" title="<?php echo $v_new_product->product_summery; ?>">
                                                                                <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_new_product->product_image_0; ?>" />
                                                                            </a>
                                                                            <?php
                                                                            $product_tag = $v_new_product->product_tag;
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
                                                                                <a class="btn-tooltip addToWishlist wishlistProd_2" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_new_product->product_id; ?>);" title="اضف الى قائمة الامنيات">
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
                                                                            <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_new_product->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                                                <span>أضف إلى السلة</span>
                                                                            </a>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <p class="product-desc" itemprop="description">
                                                                            <?php echo $v_new_product->product_summery; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#tab_1487413415 .nav a').click(function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    });
                                    apTabHref = $('#tab_1487413415 .nav a:eq(0)').tab('show');
                                    $('#tab_1487413415 .tab-pane').addClass('fade');
                                    $($(apTabHref).attr('href')).addClass('in');
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row ApRow ">
                        <div class="block-deal col-lg-8 col-md-8 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                            <div class="block products_block exclusive appagebuilder ApProductCarousel">
                                <h4 class="title_block">
                                    احدث العروض
                                </h4>
                                <div class="block_content">	
                                    <div id="carousel-3144393561" class="owl-carousel owl-theme product-default-deal">
                                        <?php
                                        foreach ($discount_product as $v_discount_product) {
                                            ?>
                                            <div class="item">
                                                <div class="product-container product-block">
                                                    <div class="left-block">
                                                        <h5 itemprop="name" class="name">
                                                            <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_discount_product->product_id; ?>" title="<?php echo $v_discount_product->product_name; ?>" itemprop="url" >
                                                                <?php echo $v_discount_product->product_name; ?>
                                                            </a>
                                                        </h5>
                                                        <div itemprop="offers" class="content_price">
                                                            <span itemprop="price" class="price product-price">
                                                                <?php echo $v_discount_product->product_price . ' '; ?>ريال 
                                                            </span>
                                                            <span class="old-price product-price">
                                                                <?php echo $v_discount_product->product_old_price; ?> ريال
                                                            </span>
                                                            <?php
                                                            $product_tag = $v_discount_product->product_tag;
                                                            if ($product_tag != NULL) {
                                                                ?>
                                                                <span class="price-percent-reduction"><?php echo $product_tag; ?></span>
                                                            <?php } ?>    
                                                        </div>
                                                        <div class='block-code'>
                                                            <span class='btn-floating open-hover waves-effect'>
                                                                <i class='mdi-navigation-more-vert'></i>
                                                            </span>
                                                            <div class="product-image-container">
                                                                <a class="product_img_link" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_discount_product->product_id; ?>" title="" itemprop="url">
                                                                    <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_discount_product->product_image_0; ?>" alt="" title=""  itemprop="image" />
                                                                </a>
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
                                                                    <a class="btn-tooltip addToWishlist wishlistProd_2" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_discount_product->product_id; ?>);" title="اضف الى قائمة الامنيات">
                                                                        <i class="mdi-action-favorite btn-floating btn-large waves-effect waves-light"></i><span class="i-wishlist">مفضلة</span>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="right-block">
                                                        <?php
                                                        if ($customer_id == NULL) {
                                                            ?>
                                                            <a href="<?php echo base_url(); ?>login" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                                <span>أضف إلى السلة</span>
                                                            </a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_discount_product->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                                <span>أضف إلى السلة</span>
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>              
                                        <?php } ?>
                                    </div>
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#carousel-3144393561').owlCarousel({
                                                items: 2,
                                                itemsDesktop: [1199, 2], itemsDesktopSmall: [991, 2], itemsTablet: [768, 2],
                                                itemsMobile: [479, 1], itemsCustom: false, singleItem: false, // true : show only 1 item
                                                itemsScaleUp: false,
                                                slideSpeed: 200, //  change speed when drag and drop a item
                                                paginationSpeed: 800, // change speed when go next page
                                                autoPlay: 8000, // time to show each item
                                                stopOnHover: true,
                                                navigation: true,
                                                navigationText: ["&lsaquo;", "&rsaquo;"],
                                                scrollPerPage: true,
                                                pagination: false, // show bullist
                                                paginationNumbers: false, // show number
                                                responsive: true,
                                                //responsiveRefreshRate : 200,
                                                //responsiveBaseWidth : window,
                                                //baseClass : "owl-carousel",
                                                //theme : "owl-theme",
                                                lazyLoad: false,
                                                lazyFollow: false, // true : go to page 7th and load all images page 1...7. false : go to page 7th and load only images of page 7th
                                                lazyEffect: "fade",
                                                autoHeight: false,
                                                //jsonPath : false,
                                                //jsonSuccess : false,
                                                //dragBeforeAnimFinish
                                                mouseDrag: false,
                                                touchDrag: false,
                                                addClassActive: true,
                                                direction: 'rtl', //transitionStyle : "owl_transitionStyle",
                                                //beforeUpdate : false,
                                                //afterUpdate : false,
                                                //beforeInit : false,
                                                //afterInit : false,
                                                //beforeMove : false,
                                                //afterMove : false,
                                                //afterAction : false,
                                                //startDragging : false,
                                                //afterLazyLoad: false
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="hidden-xs hidden-sp col-lg-4 col-md-4 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                            <div class="ApSlideShow">
                                <h3 class="title-div">جدول ترتيب الدورى</h3>
                                <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td title="Team" class="wcheader1">الفريق</td>
                                            <td title="Win" class="wcheader1">ث</td>
                                            <td title="Loses" class="wcheader1">ل</td>
                                            <td title="Ties" class="wcheader1">ت</td>
                                            <td title="Goals" class="wcheader1">ز</td>
                                            <td title="Points" class="wcheader1">ص</td>
                                        </tr>
                                        <?php
                                        foreach ($all_team as $v_team) {
                                            ?> 
                                            <tr>     
                                                <td class="wc_m"><?php echo $v_team->team_name; ?></td>
                                                <td class="wc_m"><?php echo $v_team->team_wins; ?></td>
                                                <td class="wc_m"><?php echo $v_team->team_loses; ?></td>
                                                <td class="wc_m"><?php echo $v_team->team_ties; ?></td>
                                                <td class="wc_m"><?php echo $v_team->team_goals; ?></td>
                                                <td class="wc_g"><?php echo $v_team->team_points; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row ApRow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                            <div id="tab_2274873350" class="tabs-top">
                                <div class="block_content">
                                    <ul class="nav nav-tabs tab-default" role="tablist" >
                                        <li class="">
                                            <a href="#tab_34789564716814575" class="form_6231564940638677" role="tab" data-toggle="tab">
                                                <span>احدث المنتجات</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#tab_8833138936256463" class="form_8248483981696742" role="tab" data-toggle="tab">
                                                <span>الاكثر مبيعا</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="nav nav-tabs owl-carousel owl-theme tab-for-top" role="tablist">
                                        <div class=" item">
                                            <a href="#tab_34789564716814575" class="form_6231564940638677" role="tab" data-toggle="tab">
                                                <span>احدث المنتجات</span>
                                            </a>
                                        </div>
                                        <div class=" item">
                                            <a href="#tab_8833138936256463" class="form_8248483981696742" role="tab" data-toggle="tab">
                                                <span>الاكثر مبيعا</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div id="tab_34789564716814575" class="tab-pane">
                                            <div class="block products_block exclusive appagebuilder ApProductCarousel">
                                                <div class="block_content">	
                                                    <div id="carousel-1643711377" class="owl-carousel owl-theme product-default">
                                                        <?php
                                                        foreach ($latest_product as $v_latest_product) {
                                                            ?>
                                                            <div class="item">
                                                                <div class="product-container product-block">
                                                                    <div class="left-block">
                                                                        <h5 itemprop="name" class="name">
                                                                            <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_latest_product->product_id; ?>" title="<?php echo $v_latest_product->product_name; ?>" itemprop="url" >
                                                                                <?php echo $v_latest_product->product_name; ?>
                                                                            </a>
                                                                        </h5>
                                                                        <div itemprop="offers" class="content_price">
                                                                            <span itemprop="price" class="price product-price">
                                                                                <?php echo $v_latest_product->product_price; ?> ريال 
                                                                            </span>
                                                                        </div>
                                                                        <div class='block-code'>
                                                                            <span class='btn-floating open-hover waves-effect'>
                                                                                <i class='mdi-navigation-more-vert'></i>
                                                                            </span>
                                                                            <div class="product-image-container">
                                                                                <a class="product_img_link" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_latest_product->product_id; ?>" title="<?php echo $v_latest_product->product_name; ?>" itemprop="url">
                                                                                    <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_latest_product->product_image_0; ?>" alt="<?php echo $v_latest_product->product_name; ?>" title="<?php echo $v_latest_product->product_name; ?>" itemprop="image" />
                                                                                </a>
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
                                                                                    <a class="btn-tooltip addToWishlist wishlistProd_2" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_latest_product->product_id; ?>);" title="اضف الى قائمة الامنيات">
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
                                                                                <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_latest_product->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                                                    <span>أضف إلى السلة</span>
                                                                                </a>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <p class="product-desc" itemprop="description">
                                                                                <?php echo $v_latest_product->product_summery; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $('#carousel-1643711377').owlCarousel({
                                                                items: 5,
                                                                itemsDesktop: [1199, 4], itemsDesktopSmall: [991, 3], itemsTablet: [768, 2],
                                                                itemsMobile: [479, 1], itemsCustom: false, singleItem: false, // true : show only 1 item
                                                                itemsScaleUp: false,
                                                                slideSpeed: 200, //  change speed when drag and drop a item
                                                                paginationSpeed: 800, // change speed when go next page
                                                                autoPlay: false, // time to show each item
                                                                stopOnHover: false,
                                                                navigation: true,
                                                                navigationText: ["&lsaquo;", "&rsaquo;"],
                                                                scrollPerPage: false,
                                                                pagination: false, // show bullist
                                                                paginationNumbers: false, // show number
                                                                responsive: true,
                                                                //responsiveRefreshRate : 200,
                                                                //responsiveBaseWidth : window,
                                                                //baseClass : "owl-carousel",
                                                                //theme : "owl-theme",
                                                                lazyLoad: false,
                                                                lazyFollow: false, // true : go to page 7th and load all images page 1...7. false : go to page 7th and load only images of page 7th
                                                                lazyEffect: "false",
                                                                autoHeight: false,
                                                                //jsonPath : false,
                                                                //jsonSuccess : false,
                                                                //dragBeforeAnimFinish
                                                                mouseDrag: false,
                                                                touchDrag: false,
                                                                addClassActive: true,
                                                                direction: 'rtl', //transitionStyle : "owl_transitionStyle",
                                                                //beforeUpdate : false,
                                                                //afterUpdate : false,
                                                                //beforeInit : false,
                                                                //afterInit : false,
                                                                //beforeMove : false,
                                                                //afterMove : false,
                                                                //afterAction : false,
                                                                //startDragging : false,
                                                                //afterLazyLoad: false
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                //$(".tab-for-top").find('.owl-item').removeClass('active');
                                                $(".tab-for-top").find('.owl-item').first().addClass('active');
                                                $(".tab-for-top .owl-item").click(function () {
                                                    $('.owl-item', ".tab-for-top").removeClass('active');
                                                    $(this).addClass('active');
                                                });
                                                var rtl = 'ltr';
                                                if ($('html').hasClass('rtl')) {
                                                    rtl = 'rtl';
                                                }
                                                $(".tab-for-top").owlCarousel({
                                                    items: 4,
                                                    itemsDesktop: [1199, 2],
                                                    itemsDesktopSmall: [992, 2],
                                                    itemsTablet: [768, 2],
                                                    itemsTabletSmall: [640, 2],
                                                    itemsMobile: [479, 1],
                                                    singleItem: false, // chỉ hiện thị 1 item
                                                    itemsScaleUp: false, // true sẽ hiện thị giãn ảnh nếu diện tích còn thừa, và ẩn nếu độ rộng ko đủ
                                                    slideSpeed: 200, // tốc độ trôi khi thả chuột, kéo 1 nửa rồi thả ra
                                                    paginationSpeed: 800, // tốc độ next page
                                                    rewindSpeed: 1000, // tốc độ tua lại về first item
                                                    autoPlay: false, // thời gian show each item
                                                    stopOnHover: true,
                                                    navigation: false,
                                                    navigationText: ["&lsaquo;", "&rsaquo;"],
                                                    rewindNav: true, // enable, disable tua lại về first item
                                                    scrollPerPage: false,
                                                    pagination: false, // show bullist : nut tròn tròn
                                                    paginationNumbers: false, // đổi nut tròn tròn thành số
                                                    responsive: true,
                                                    //responsiveRefreshRate : 200,
                                                    //responsiveBaseWidth : window,
                                                    //baseClass : "owl-carousel",
                                                    //theme : "owl-theme",
                                                    lazyLoad: true,
                                                    lazyFollow: true, // TRUE : nhảy vào page 7 load ảnh TỪ page 1->7. FALSE : nhảy vào page 7 CHỈ load ảnh page 7
                                                    lazyEffect: "fade",
                                                    autoHeight: true,
                                                    //jsonPath : false,
                                                    //jsonSuccess : false,
                                                    //dragBeforeAnimFinish
                                                    mouseDrag: true,
                                                    touchDrag: true,
                                                    direction: rtl,
                                                    //transitionStyle : "owl_transitionStyle",
                                                    //beforeUpdate : false,
                                                    //afterUpdate : false,
                                                    //beforeInit : false,
                                                    //afterInit : false,
                                                    //beforeMove : false,
                                                    //afterMove : false,
                                                    //afterAction : false,
                                                    //startDragging : false,
                                                    //afterLazyLoad: false
                                                });
                                            });
                                        </script>
                                        <div id="tab_8833138936256463" class="tab-pane">
                                            <div class="block products_block exclusive appagebuilder ApProductCarousel">
                                                <div class="block_content">	
                                                    <div id="carousel-2527663949" class="owl-carousel owl-theme product-default">
                                                        <?php
                                                        foreach ($best_selling as $v_best_selling) {
                                                            ?>
                                                             <div class="item">
                                                                <div class="product-container product-block">
                                                                    <div class="left-block">
                                                                        <h5 itemprop="name" class="name">
                                                                            <a class="product-name" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_best_selling->product_id; ?>" title="<?php echo $v_best_selling->product_name; ?>" itemprop="url" >
                                                                                <?php echo $v_best_selling->product_name; ?>
                                                                            </a>
                                                                        </h5>
                                                                        <div itemprop="offers" class="content_price">
                                                                            <span itemprop="price" class="price product-price">
                                                                                <?php echo $v_best_selling->product_price; ?> ريال 
                                                                            </span>
                                                                        </div>
                                                                        <div class='block-code'>
                                                                            <span class='btn-floating open-hover waves-effect'>
                                                                                <i class='mdi-navigation-more-vert'></i>
                                                                            </span>
                                                                            <div class="product-image-container">
                                                                                <a class="product_img_link" href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_best_selling->product_id; ?>" title="<?php echo $v_best_selling->product_name; ?>" itemprop="url">
                                                                                    <img class="replace-2x img-responsive" src="<?php echo base_url() . $v_best_selling->product_image_0; ?>" alt="<?php echo $v_best_selling->product_name; ?>" title="<?php echo $v_best_selling->product_name; ?>" itemprop="image" />
                                                                                </a>
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
                                                                                    <a class="btn-tooltip addToWishlist wishlistProd_2" data-toggle="modal" data-target="#Wishlist" onclick="addToWishlist(<?php echo $v_best_selling->product_id; ?>);" title="اضف الى قائمة الامنيات">
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
                                                                                <a data-toggle="modal" data-target="#smallModal" onclick="addToCart(<?php echo $v_best_selling->product_id; ?>);" class="button ajax_add_to_cart_button btn btn-default waves-effect waves-light" title="أضف إلى السلة">
                                                                                    <span>أضف إلى السلة</span>
                                                                                </a>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <p class="product-desc" itemprop="description">
                                                                                <?php echo $v_best_selling->product_summery; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            $('#carousel-2527663949').owlCarousel({
                                                                items: 5,
                                                                itemsDesktop: [1199, 4], itemsDesktopSmall: [991, 3], itemsTablet: [768, 2],
                                                                itemsMobile: [479, 1], itemsCustom: false, singleItem: false, // true : show only 1 item
                                                                itemsScaleUp: false,
                                                                slideSpeed: 200, //  change speed when drag and drop a item
                                                                paginationSpeed: 800, // change speed when go next page
                                                                autoPlay: false, // time to show each item
                                                                stopOnHover: false,
                                                                navigation: true,
                                                                navigationText: ["&lsaquo;", "&rsaquo;"],
                                                                scrollPerPage: false,
                                                                pagination: false, // show bullist
                                                                paginationNumbers: false, // show number
                                                                responsive: true,
                                                                //responsiveRefreshRate : 200,
                                                                //responsiveBaseWidth : window,
                                                                //baseClass : "owl-carousel",
                                                                //theme : "owl-theme",
                                                                lazyLoad: false,
                                                                lazyFollow: false, // true : go to page 7th and load all images page 1...7. false : go to page 7th and load only images of page 7th
                                                                lazyEffect: "false",
                                                                autoHeight: false,
                                                                //jsonPath : false,
                                                                //jsonSuccess : false,
                                                                //dragBeforeAnimFinish
                                                                mouseDrag: false,
                                                                touchDrag: false,
                                                                addClassActive: true,
                                                                direction: 'rtl', //transitionStyle : "owl_transitionStyle",
                                                                //beforeUpdate : false,
                                                                //afterUpdate : false,
                                                                //beforeInit : false,
                                                                //afterInit : false,
                                                                //beforeMove : false,
                                                                //afterMove : false,
                                                                //afterAction : false,
                                                                //startDragging : false,
                                                                //afterLazyLoad: false
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                //$(".tab-for-top").find('.owl-item').removeClass('active');
                                                $(".tab-for-top").find('.owl-item').first().addClass('active');
                                                $(".tab-for-top .owl-item").click(function () {
                                                    $('.owl-item', ".tab-for-top").removeClass('active');
                                                    $(this).addClass('active');
                                                });
                                                var rtl = 'ltr';
                                                if ($('html').hasClass('rtl')) {
                                                    rtl = 'rtl';
                                                }
                                                $(".tab-for-top").owlCarousel({
                                                    items: 4,
                                                    itemsDesktop: [1199, 2],
                                                    itemsDesktopSmall: [992, 2],
                                                    itemsTablet: [768, 2],
                                                    itemsTabletSmall: [640, 2],
                                                    itemsMobile: [479, 1],
                                                    singleItem: false, // chỉ hiện thị 1 item
                                                    itemsScaleUp: false, // true sẽ hiện thị giãn ảnh nếu diện tích còn thừa, và ẩn nếu độ rộng ko đủ
                                                    slideSpeed: 200, // tốc độ trôi khi thả chuột, kéo 1 nửa rồi thả ra
                                                    paginationSpeed: 800, // tốc độ next page
                                                    rewindSpeed: 1000, // tốc độ tua lại về first item
                                                    autoPlay: false, // thời gian show each item
                                                    stopOnHover: true,
                                                    navigation: false,
                                                    navigationText: ["&lsaquo;", "&rsaquo;"],
                                                    rewindNav: true, // enable, disable tua lại về first item
                                                    scrollPerPage: false,
                                                    pagination: false, // show bullist : nut tròn tròn
                                                    paginationNumbers: false, // đổi nut tròn tròn thành số
                                                    responsive: true,
                                                    //responsiveRefreshRate : 200,
                                                    //responsiveBaseWidth : window,
                                                    //baseClass : "owl-carousel",
                                                    //theme : "owl-theme",
                                                    lazyLoad: true,
                                                    lazyFollow: true, // TRUE : nhảy vào page 7 load ảnh TỪ page 1->7. FALSE : nhảy vào page 7 CHỈ load ảnh page 7
                                                    lazyEffect: "fade",
                                                    autoHeight: true,
                                                    //jsonPath : false,
                                                    //jsonSuccess : false,
                                                    //dragBeforeAnimFinish
                                                    mouseDrag: true,
                                                    touchDrag: true,
                                                    direction: rtl,
                                                    //transitionStyle : "owl_transitionStyle",
                                                    //beforeUpdate : false,
                                                    //afterUpdate : false,
                                                    //beforeInit : false,
                                                    //afterInit : false,
                                                    //beforeMove : false,
                                                    //afterMove : false,
                                                    //afterAction : false,
                                                    //startDragging : false,
                                                    //afterLazyLoad: false
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#tab_2274873350 .nav a').click(function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    });
                                    apTabHref = $('#tab_2274873350 .nav a:eq(0)').tab('show');
                                    $('#tab_2274873350 .tab-pane').addClass('fade');
                                    $($(apTabHref).attr('href')).addClass('in');
                                });
                            </script>
                            <script>
                                $(document).ready(function () {
                                    //$(".tab-for-top").find('.owl-item').removeClass('active');
                                    $(".tab-for-top").find('.owl-item').first().addClass('active');
                                    $(".tab-for-top .owl-item").click(function () {
                                        $('.owl-item', ".tab-for-top").removeClass('active');
                                        $(this).addClass('active');
                                    });
                                    var rtl = 'ltr';
                                    if ($('html').hasClass('rtl')) {
                                        rtl = 'rtl';
                                    }
                                    $(".tab-for-top").owlCarousel({
                                        items: 4,
                                        itemsDesktop: [1199, 2],
                                        itemsDesktopSmall: [992, 2],
                                        itemsTablet: [768, 2],
                                        itemsTabletSmall: [640, 2],
                                        itemsMobile: [479, 1],
                                        singleItem: false, // chỉ hiện thị 1 item
                                        itemsScaleUp: false, // true sẽ hiện thị giãn ảnh nếu diện tích còn thừa, và ẩn nếu độ rộng ko đủ
                                        slideSpeed: 200, // tốc độ trôi khi thả chuột, kéo 1 nửa rồi thả ra
                                        paginationSpeed: 800, // tốc độ next page
                                        rewindSpeed: 1000, // tốc độ tua lại về first item
                                        autoPlay: false, // thời gian show each item
                                        stopOnHover: true,
                                        navigation: false,
                                        navigationText: ["&lsaquo;", "&rsaquo;"],
                                        rewindNav: true, // enable, disable tua lại về first item
                                        scrollPerPage: false,
                                        pagination: false, // show bullist : nut tròn tròn
                                        paginationNumbers: false, // đổi nut tròn tròn thành số
                                        responsive: true,
                                        //responsiveRefreshRate : 200,
                                        //responsiveBaseWidth : window,
                                        //baseClass : "owl-carousel",
                                        //theme : "owl-theme",
                                        lazyLoad: true,
                                        lazyFollow: true, // TRUE : nhảy vào page 7 load ảnh TỪ page 1->7. FALSE : nhảy vào page 7 CHỈ load ảnh page 7
                                        lazyEffect: "fade",
                                        autoHeight: true,
                                        //jsonPath : false,
                                        //jsonSuccess : false,
                                        //dragBeforeAnimFinish
                                        mouseDrag: true,
                                        touchDrag: true,
                                        direction: rtl,
                                        //transitionStyle : "owl_transitionStyle",
                                        //beforeUpdate : false,
                                        //afterUpdate : false,
                                        //beforeInit : false,
                                        //afterInit : false,
                                        //beforeMove : false,
                                        //afterMove : false,
                                        //afterAction : false,
                                        //startDragging : false,
                                        //afterLazyLoad: false
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row ApRow">
                        <?php
                        foreach ($all_banner as $v_banner) {
                            if ($v_banner->banner_position == 1) {
                                ?>
                                <div class="hidden-xs hidden-sp col-lg-6 col-md-6 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                                    <div id="image-form_3865517998746702" class="block ApImage">
                                        <a href="<?php echo base_url(); ?>">
                                            <img src="<?php echo base_url() . $v_banner->banner_image; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        foreach ($all_banner as $v_banner) {
                            if ($v_banner->banner_position == 2) {
                                ?>    
                                <div class="hidden-xs hidden-sp col-lg-6 col-md-6 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                                    <div id="image-form_2677425064000690" class="block ApImage">
                                        <a href="<?php echo base_url(); ?>">
                                            <img src="<?php echo base_url() . $v_banner->banner_image; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row ApRow">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-sp-12 ApColumn">
                            <div id="blockleoblogstabs" class="icenter blogs block">
                                <h4 class="title_block">اخبار الدورى السعودى</h4>
                                <div class="block_content row">
                                    <div class="carousel slide">
                                        <div class="carousel-inner" id="blockleoblogs468073307">
                                            <?php
                                            foreach ($all_news as $v_news) {
                                                ?>
                                                <div class="item active">
                                                    <div class="item">
                                                        <div>
                                                            <div class="blog-item blog_block ajax_block_blog first_item">
                                                                <div class="media-body clearfix">
                                                                    <div class="image">
                                                                        <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>">
                                                                            <img src="<?php echo base_url() . $v_news->news_image; ?>" class="img-responsive"/>
                                                                        </a>
                                                                        <div class="blog-meta">
                                                                            <span class="blog-created">
                                                                                <i class="mdi-device-access-time"></i>
                                                                                <?php echo $v_news->news_date; ?>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="blog-block">
                                                                        <h5 class="blog-tittle">
                                                                            <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>" title=""><?php echo $v_news->news_title; ?></a></h5>
                                                                        <div class="blog-shortinfo">
                                                                            <p><?php echo $v_news->news_summery; ?></p>
                                                                            <div class="blog-readmore">
                                                                                <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>" class="read-more waves-effect btn-flat" title="">
                                                                                    <span>اقرأ المزيد</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                        $("#blockleoblogs468073307").owlCarousel({
                                            items: 3,
                                            itemsDesktop: [1199, 3], itemsDesktopSmall: [980, 2], itemsTablet: [768, 2], itemsTabletSmall: [640, 2], itemsMobile: [479, 1], singleItem: false, // chỉ hiện thị 1 item
                                            itemsScaleUp: false, // true sẽ hiện thị giãn ảnh nếu diện tích còn thừa, và ẩn nếu độ rộng ko đủ
                                            slideSpeed: 200, // tốc độ trôi khi thả chuột, kéo 1 nửa rồi thả ra
                                            paginationSpeed: 800, // tốc độ next page
                                            rewindSpeed: 1000, // tốc độ tua lại về first item
                                            autoPlay: false, // thời gian show each item
                                            stopOnHover: true,
                                            navigation: true,
                                            navigationText: ["&lsaquo;", "&rsaquo;"],
                                            rewindNav: true, // enable, disable tua lại về first item
                                            scrollPerPage: true,
                                            pagination: false, // show bullist : nut tròn tròn
                                            paginationNumbers: false, // đổi nut tròn tròn thành số
                                            responsive: true,
                                            //responsiveRefreshRate : 200,
                                            //responsiveBaseWidth : window,
                                            //baseClass : "owl-carousel",
                                            //theme : "owl-theme",
                                            lazyLoad: false,
                                            lazyFollow: true, // TRUE : nhảy vào page 7 load ảnh TỪ page 1->7. FALSE : nhảy vào page 7 CHỈ load ảnh page 7
                                            lazyEffect: "fade",
                                            autoHeight: false,
                                            //jsonPath : false,
                                            //jsonSuccess : false,
                                            //dragBeforeAnimFinish
                                            mouseDrag: false,
                                            touchDrag: false,
                                            addClassActive: true,
                                            direction: 'rtl', //transitionStyle : "owl_transitionStyle",
                                            //beforeUpdate : false,
                                            //afterUpdate : false,
                                            //beforeInit : false,
                                            //afterInit : false,
                                            //beforeMove : false,
                                            //afterMove : false,
                                            //afterAction : false,
                                            //startDragging : false,
                                            //afterLazyLoad: false
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="row ApRow">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-sp-12 ApColumn">
                                <div class="ApRawHtml block">
                                    <div class="service-site">
                                        <div class="media bg-color-1">
                                            <div class="pull-left icon-box">
                                                <i class="mdi-maps-local-shipping"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="title-service">التوصيل مجانا</h3>
                                                <p class="detail-service">التوصيل خلال 24 ساعة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-sp-12 ApColumn">
                                <div class="ApRawHtml block">
                                    <div class="service-site">
                                        <div class="media bg-color-2">
                                            <div class="pull-left icon-box">
                                                <i class="mdi-content-reply-all"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="title-service">استرداد النقود كامله</h3>
                                                <p class="detail-service">امكانية استرجاع المنتج</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-sp-12 ApColumn">
                                <div class="ApRawHtml block">
                                    <div class="service-site">   
                                        <div class="media bg-color-3">   
                                            <div class="pull-left icon-box">      
                                                <i class="mdi-action-settings-phone"></i> 
                                            </div>      
                                            <div class="media-body">   
                                                <h3 class="title-service">خدمة اونلاين 24 ساعة</h3>  
                                                <p class="detail-service">0123456789</p>   
                                            </div>   
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 col-sp-12 ApColumn">
                                <div class="ApRawHtml block">
                                    <div class="service-site">
                                        <div class="media bg-color-4">
                                            <div class="pull-left icon-box">
                                                <i class="mdi-maps-local-mall"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3 class="title-service">ضمان على المنتج</h3>
                                                <p class="detail-service">اسعار منخفضة بجودة عالية</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</section>