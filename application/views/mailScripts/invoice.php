<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
        <style>
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }

            a {
                color: #0087C3;
                text-decoration: none;
            }

            body {
                position: relative;
                width: 21cm;  
                height: 29.7cm; 
                margin: 0 auto; 
                color: #555555;
                background: #FFFFFF; 
                font-family: Arial, sans-serif; 
                font-size: 14px; 
            }

            header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #AAAAAA;
            }

            #logo {
                float: left;
                margin-top: 8px;
            }

            #logo img {
                height: 70px;
            }

            #company {
                float: right;
                text-align: right;
            }

            #details {
                margin-bottom: 50px;
            }

            #client {
                padding-left: 6px;
                border-left: 6px solid #0087C3;
                float: left;
            }

            #client .to {
                color: #777777;
            }

            h2.name {
                font-size: 1.4em;
                font-weight: normal;
                margin: 0;
            }

            #invoice {
                float: right;
                text-align: right;
            }

            #invoice h1 {
                color: #0087C3;
                font-size: 2.4em;
                line-height: 1em;
                font-weight: normal;
                margin: 0  0 10px 0;
            }

            #invoice .date {
                font-size: 1.1em;
                color: #777777;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px;
            }

            table th,
            table td {
                padding: 20px;
                background: #EEEEEE;
                text-align: center;
                border-bottom: 1px solid #FFFFFF;
            }

            table th {
                white-space: nowrap;        
                font-weight: normal;
            }

            table td {
                text-align: right;
            }

            table td h3{
                color: #57B223;
                font-size: 1.2em;
                font-weight: normal;
                margin: 0 0 0.2em 0;
            }

            table .no {
                color: #FFFFFF;
                font-size: 1.6em;
                background: #57B223;
            }

            table .desc {
                text-align: left;
            }

            table .unit {
                background: #DDDDDD;
            }

            table .qty {
            }

            table .total {
                background: #57B223;
                color: #FFFFFF;
            }

            table td.unit,
            table td.qty,
            table td.total {
                font-size: 1.2em;
            }

            table tbody tr:last-child td {
                border: none;
            }

            table tfoot td {
                padding: 10px 20px;
                background: #FFFFFF;
                border-bottom: none;
                font-size: 1.2em;
                white-space: nowrap; 
                border-top: 1px solid #AAAAAA; 
            }

            table tfoot tr:first-child td {
                border-top: none; 
            }

            table tfoot tr:last-child td {
                color: #57B223;
                font-size: 1.4em;
                border-top: 1px solid #57B223; 

            }

            table tfoot tr td:first-child {
                border: none;
            }

            #thanks{
                font-size: 2em;
                margin-bottom: 50px;
            }

            #notices{
                padding-left: 6px;
                border-left: 6px solid #0087C3;  
            }

            #notices .notice {
                font-size: 1.2em;
            }

            footer {
                color: #777777;
                width: 100%;
                height: 30px;
                position: absolute;
                bottom: 0;
                border-top: 1px solid #AAAAAA;
                padding: 8px 0;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <header class="clearfix">
            <div id="logo">
                <img src="<?php echo base_url(); ?>asset/public/themes/leo_sportstore/img/logo3.jpg">
            </div>
            <div id="company">
                <h1>Invoice ID: <?php echo '#' . '' . $invoice_info->order_id . $invoice_info->customer_id; ?></h1>
                <div class="date">Date of Invoice: <?php echo $invoice_info->invoice_date; ?></div>
                <div class="date">Payment Method: Cash On Delivery</div>
            </div>
        </header>
        <main>
            <div id="details" class="clearfix">
                <div id="client">
                    <div class="to">Customer Address:</div>
                    <h2 class="name">Name: <?php echo $invoice_info->first_name . ' ' . $invoice_info->last_name; ?></h2>
                    <div class="address">Mobile: <?php echo $invoice_info->customer_mobile; ?></div>
                    <div class="address">City: <?php echo $invoice_info->city_name; ?></div>
                    <div class="address">Address: <?php echo $invoice_info->customer_address; ?></div>
                </div>
                <div id="invoice">
                    <div class="to">Shipping Address:</div>
                    <h2 class="name">Name: <?php echo $this->session->userdata('shipping_first_name') . ' ' . $this->session->userdata('shipping_last_name'); ?></h2>
                    <div class="address">Mobile: <?php echo $this->session->userdata('shipping_mobile'); ?></div>
                    <div class="address">City: <?php echo $this->session->userdata('shipping_city'); ?></div>
                    <div class="address">Address: <?php echo $this->session->userdata('shipping_address'); ?></div>
                </div>
            </div>
            <table border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">SL</th>
                        <th class="desc">Product Name</th>
                        <th class="unit">Quantity</th>
                        <th class="qty">Unit Price</th>
                        <th class="total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $contents = $this->cart->contents();
                    foreach ($contents as $cart_value) {
                        ?>
                        <tr>
                            <td class="no"><?php echo $i; ?></td>
                            <td class="desc"><?php echo $cart_value['name'] . ' (Color:- ' . $cart_value['options']['colour'] . ') (Size:- ' . $cart_value['options']['size'] . ')'; ?></td>
                            <td class="unit"><?php echo $cart_value['qty']; ?></td>
                            <td class="qty"><?php echo $cart_value['price']; ?></td>
                            <td class="total"><?php echo $cart_value['subtotal']; ?></td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">SUBTOTAL</td>
                        <td><?php echo $this->cart->total(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Shipping Cost: 0.00</td>
                        <td><?php echo $this->cart->total(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td><?php echo $this->cart->total(); ?></td>
                    </tr>
                </tfoot>
            </table>
            <div id="thanks">Thank you!</div>
        </main>
        <footer>
            Invoice was created on a computer and is valid without the signature and seal.
        </footer>
    </body>
</html>