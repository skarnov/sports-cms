<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Order Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/manage_order">Manage Order</a></li>
            <li class="active">Order Details</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-xs-5">
                    <img src="<?php echo base_url(); ?>asset/public/themes/leo_sportstore/img/logo3.jpg" style="height: 115px; width: 150px;"/>
                </div>
                <div class="col-xs-offset-2 col-xs-5">
                    <h1>Invoice ID: <?php echo $invoice_info->order_id.$invoice_info->customer_id; ?></h1>
                    <h4><?php echo $invoice_info->invoice_date; ?></h4>
                    <h4>Payment Method: COD</h4>
                </div>
                <div style="height: 150px;"></div>
                <div class="col-xs-5">
                    <address style="line-height: 10px;">
                        <h4>Customer Address</h4>
                        <p>Name: <?php echo $invoice_info->first_name. ' '. $invoice_info->last_name; ?></p>
                        <p>Mobile: <?php echo $invoice_info->customer_mobile; ?></p>
                        <p>City: <?php echo $invoice_info->city_name; ?></p>
                        <p>Address: <?php echo $invoice_info->customer_address; ?></p>
                    </address>
                </div>
                <div class="col-xs-offset-2 col-xs-5">
                    <address style="line-height: 10px;">
                        <h4>Shipping Address</h4>
                        <p>Name: <?php echo $invoice_info->shipping_first_name. ' '. $invoice_info->shipping_last_name; ?></p>
                        <p>Mobile: <?php echo $invoice_info->shipping_mobile; ?></p>
                        <p>City: <?php echo $invoice_info->shipping_city; ?></p>
                        <p>Address: <?php echo $invoice_info->shipping_address; ?></p>
                    </address>
                </div>
                <div style="height: 150px;"></div>
                <div class="col-xs-offset-2 col-xs-8">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                foreach ($order_info as $v_order) {   
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $v_order->product_name; ?></td>
                                <td><?php echo $v_order->product_sales_quantity; ?></td>
                                <td><?php echo $v_order->product_price; ?></td>
                                <td>
                                    <?php 
                                        $qty=$v_order->product_sales_quantity; 
                                        $price=$v_order->product_price;
                                        echo $total=$qty*$price;
                                    ?>
                                </td>
                            </tr>   
                                <?php
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-offset-7 col-xs-5">
                    <h4>Total: <?php echo $invoice_info->order_total; ?></h4> 
                    <h4>Shipping Cost: 0.00</h4> 
                    <h3 style="border: 2px solid black; padding: 1%">Grand Total: <?php echo $invoice_info->order_total; ?></h3> 
                </div>
            </div>
        </div>
    </section>
</div>