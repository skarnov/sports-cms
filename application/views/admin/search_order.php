<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Payment Type</th>
                <th>Order Amount</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($order_search as $v_order) {
                ?>
                <tr>
                    <td><?php echo $v_order->order_id; ?></td>
                    <td><?php echo $v_order->first_name; ?></td>
                    <td><?php echo $v_order->payment_type; ?></td>
                    <td><?php echo $v_order->order_total; ?></td>
                    <td><?php echo $v_order->invoice_date; ?></td>
                    <td>Pending</td>
                    <td>
                        <a href="<?php echo base_url(); ?>evis_sale/order_details/<?php echo $v_order->order_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Order Details"><i class="fa fa-shopping-cart"></i></a>
                        <a href="<?php echo base_url(); ?>evis_sale/paid_order/<?php echo $v_order->order_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Paid"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="<?php echo base_url(); ?>evis_sale/delete_order/<?php echo $v_order->order_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>