<div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Display Color</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($category_search as $v_category) {
                ?>
                <tr>
                    <td><?php echo $v_category->category_name; ?></td>
                    <td><?php echo $v_category->color_name; ?></td>
                    <td>
                        <span class="btn-success">
                            <?php
                            if ($v_category->category_status == '1') {
                                echo 'Published';
                            }
                            ?> 
                        </span>
                        <span class="btn-danger">
                            <?php
                            if ($v_category->category_status == 0) {
                                echo 'Unpublished';
                            }
                            ?>   
                        </span>
                    </td>
                    <td>
                        <a href="<?php echo base_url(); ?>evis_inventory/edit_category/<?php echo $v_category->category_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Category"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="<?php echo base_url(); ?>evis_inventory/delete_category/<?php echo $v_category->category_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Category" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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