<?php
    $subtotal = $this->cart->total();
    $total = $subtotal;
    $grand_total = $total;
    $sdata = array();
    $sdata['grand_total'] = $grand_total;
    $this->session->set_userdata($sdata);
?>
<ul class="text-right">
    <li>
        <div class="blockcart_top">
            <div id="cart" class="shopping_cart pull-right">
                <div class="heading">
                    <a href="<?php echo base_url(); ?>cart/show_cart" title="عرض عربة التسوق" rel="nofollow" class="clearfix">
                        <div class="title-cart">
                            <div class="cart-quantity">
                                <span class="ajax_cart_quantity"><?php echo $rows = count($this->cart->contents()); ?> <span class="item-cart">item</span></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </li>
</ul>