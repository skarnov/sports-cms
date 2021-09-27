<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/add_product">Add New Product</a></li>
            <li class="active">Manage Product</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <input type="text" name="search" placeholder="Product Name" onkeyup="productSearch(this.value);" class="form-control input-lg" />
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_product');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_product');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body" id="search_product">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_product as $v_product) {
                            ?>
                            <tr>
                                <td><?php echo $v_product->product_name; ?></td>
                                <td>
                                    <img src="<?php echo base_url() . $v_product->product_image_0; ?>" style="height:50px; width:50px;" />
                                </td>
                                <td><?php echo $v_product->category_name; ?></td>
                                <td><?php echo $v_product->product_quantity; ?></td>
                                <td><?php echo $v_product->product_price; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_product->product_status == '1') {
                                            echo 'Published';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_product->product_status == 0) {
                                            echo 'Unpublished';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_inventory/edit_product/<?php echo $v_product->product_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Product"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_inventory/delete_product/<?php echo $v_product->product_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Product" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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