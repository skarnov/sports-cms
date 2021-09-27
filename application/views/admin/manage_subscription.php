<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Subscription
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/send_newsletter">Send Newsletter</a></li>
            <li class="active">Manage Subscription</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-8">
                    <input type="text" name="search" placeholder="Subscription Email" onkeyup="subscriptionSearch(this.value);" class="form-control input-lg" />
                </div>
            </div>
            <div class="box-body" id="search_subscription">
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
                        foreach ($all_subscribe as $v_subscribe) {
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
        </div>
    </section>
</div>