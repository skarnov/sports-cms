<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($customer_search as $v_customer) {
                ?>
                <tr>
                    <td><?php echo $v_customer->first_name; ?></td>
                    <td><?php echo $v_customer->last_name; ?></td>
                    <td><?php echo $v_customer->customer_email; ?></td>
                    <td>
                        <span class="btn-success">
                            <?php
                            if ($v_customer->customer_status == '1') {
                                echo 'Active';
                            }
                            ?> 
                        </span>
                        <span class="btn-danger">
                            <?php
                            if ($v_customer->customer_status == 0) {
                                echo 'Inactive';
                            }
                            ?>   
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>evis_sale/edit_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Customer"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="<?php echo base_url(); ?>evis_sale/delete_customer/<?php echo $v_customer->customer_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Customer" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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