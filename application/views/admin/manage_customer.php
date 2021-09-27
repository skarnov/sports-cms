<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Customer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/add_customer">Add New Customer</a></li>
            <li class="active">Manage Customer</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <input type="text" name="search" placeholder="First Name" onkeyup="customerSearch(this.value);" class="form-control input-lg" />
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_customer');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_customer');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body" id="search_customer">
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
                        foreach ($all_customer as $v_customer) {
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
        </div>
    </section>
</div>