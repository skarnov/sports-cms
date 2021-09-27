<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                عربة التسوق
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-heading product-listing">
                    عربة التسوق
                </h1>
                <table id="cart_summary" class="table table-bordered stock-management-on">
                    <thead>
                        <tr>
                            <th class="cart_product first_item">منتج</th>
                            <th class="cart_description item">اسم</th>
                            <th class="cart_quantity item">الكمية</th>
                            <th class="cart_unit item">سعر الوحدة</th>
                            <th class="cart_unit item">المجموع الفرعي</th>
                            <th class="cart_delete last_item">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $contents = $this->cart->contents();
                        foreach ($contents as $v_contents) {
                            ?>
                            <tr id="product_2_7_0_0" class="cart_item last_item first_item address_0 odd">
                                <td class="cart_product">
                                    <a href="<?php echo base_url(); ?>evis_store/product_details/<?php echo $v_contents['id']; ?>">
                                        <img src="<?php echo base_url() . $v_contents['image']; ?>" width="98" height="98">
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name">
                                        <a href=""><?php echo $v_contents['name']; ?></a>
                                    </p>
                                    <small class="cart_ref">Color : <?php echo $v_contents['options']['colour']; ?></small>
                                    <small class="cart_ref">Size : <?php echo $v_contents['options']['size']; ?></small>
                                </td>
                                <td class="text-center">
                                    <form action="<?php echo base_url(); ?>cart/update_cart" method="POST">
                                        <input type="hidden"  value="<?php echo $v_contents['rowid']; ?>" name="rowid"/>
                                        <input type="number" name="product_quantity" value="<?php echo $v_contents['qty']; ?>" class="form-control" style="width: 39%; text-align: center;" />
                                        <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="Update">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="cart_total">
                                    <span class="price" id="total_product_price_2_7_0">
                                        <?php echo $v_contents['price']; ?>
                                    </span>
                                </td>
                                <td class="cart_total">
                                    <span class="price" id="total_product_price_2_7_0">
                                        <?php echo $v_contents['subtotal']; ?>
                                    </span>
                                </td>
                                <td class="cart_delete text-center" data-title="Delete">
                                    <div>
                                        <a rel="nofollow" title="حذف" class="cart_quantity_delete" href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <?php
                        $subtotal = $this->cart->total();
                        $total = $subtotal;
                        $grand_total = $total;
                        $sdata = array();
                        $sdata['grand_total'] = $grand_total;
                        $this->session->set_userdata($sdata);
                    ?>
                    <tfoot>
                        <tr class="cart_total_price">
                            <td rowspan="3" colspan="3" id="cart_voucher" class="cart_voucher"></td>
                            <td colspan="2" class="text-right">المجموع</td>
                            <td colspan="1" class="price" id="total_product"><?php echo $grand_total; ?></td>
                        </tr>
                        <tr class="cart_total_delivery">
                            <td colspan="2" class="text-right">تكلفة الشحن</td>
                            <td colspan="1" class="price" id="total_shipping">0.00</td>
                        </tr>
                        <tr class="cart_total_price">
                            <td colspan="2" class="total_price_container text-right">
                                <span>المبلغ الإجمالي</span>
                            </td>
                            <td colspan="1" class="price" id="total_price_container">
                                <span id="total_price"><?php echo $grand_total; ?></span>
                            </td>
                        </tr>
                    </tfoot>
                </table> 
                <p class="cart_navigation clearfix">
                    <a href="javascript:history.go(-1)" class="button-exclusive btn btn-outline btn-sm waves-effect waves-light" title="">
                        مواصلة التسوق   
                    </a>
                    <?php
                    if ($grand_total != NULL) {
                        ?>
                        <a href="<?php echo base_url(); ?>checkout" class="button btn btn-outline standard-checkout button-medium pull-right btn-sm waves-effect waves-light" title="" style="">
                            <span>الشروع في الخروج</span>
                        </a>
                        <?php
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>