<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Subscription Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($subscription_search as $v_subscribe) {
                ?>
                <tr>
                    <td><?php echo $v_subscribe->subscription_email; ?></td>
                    <td>
                        <span class="btn-success">
                            <?php
                            if ($v_subscribe->subscription_status == '1') {
                                echo 'Active';
                            }
                            ?> 
                        </span>
                        <span class="btn-danger">
                            <?php
                            if ($v_subscribe->subscription_status == 0) {
                                echo 'Inactive';
                            }
                            ?>   
                        </span>
                    </td>
                    <td>
                        <?php
                        if ($v_subscribe->subscription_status == '1') {
                            ?>
                            <a href="<?php echo base_url(); ?>evis_sale/deactive_subscription/<?php echo $v_subscribe->subscription_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Deactive Subscription"><i class="fa fa-times"></i></a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo base_url(); ?>evis_sale/active_subscription/<?php echo $v_subscribe->subscription_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Active Subscription"><i class="fa fa-check"></i></a>
                            <?php
                        }
                        ?>
                        <a href="<?php echo base_url(); ?>evis_sale/delete_subscription/<?php echo $v_subscribe->subscription_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Subscription" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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