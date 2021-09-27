<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_category"> Manage Category</a></li>
            <li class="active">Add New Category</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_category');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('save_category');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url(); ?>evis_inventory/save_category" method="POST">
                    <div class="box box-info">
                        <div class="col-xs-8">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Category Name <span style="color: red">*</span></label>
                                    <input type="text" required name="category_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Color Code <span style="color: red">*</span></label>
                                        <select name="color_code_id" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_color_code as $v_color_code) {
                                                ?>
                                                <option style="color:white; background-color: <?php echo $v_color_code->color_code_name; ?>" value="<?php echo $v_color_code->color_code_id; ?>"><?php echo $v_color_code->color_code_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Category Status <span style="color: red">*</span></label>
                                    <div class="controls">
                                        <select name="category_status" class="form-control" tabindex="1">
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Save</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>