<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Sale
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/add_sale">Add New Sale</a></li>
            <li class="active">Manage Sale</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Payment Type</th>
                            <th>Sale Amount</th>
                            <th>Sale Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_sale as $v_sale) {
                            ?>
                            <tr>
                                <td><?php echo $v_sale->first_name; ?></td>
                                <td><?php echo $v_sale->payment_type; ?></td>
                                <td><?php echo $v_sale->order_total; ?></td>
                                <td><?php echo $v_sale->invoice_date; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_sale/order_details/<?php echo $v_sale->order_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Sale Details"><i class="fa fa-shopping-cart"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_sale/delete_order/<?php echo $v_sale->order_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Sale" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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
        </div>
    </section>
</div>