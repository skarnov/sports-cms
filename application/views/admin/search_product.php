<div class="box-body">
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
            foreach ($product_search as $v_product) {
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