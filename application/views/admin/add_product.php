<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
            <li class="active">Add New Product</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_inventory/save_product" method="POST" name="product" enctype="multipart/form-data">
                        <div style="background-color:wheat;"><?php echo validation_errors(); ?></div>
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_product');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_product');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Category <span style="color: red">*</span></label>
                                        <select name="category_id" class="form-control select2" style="width: 100%;">
                                            <?php
                                            foreach ($all_category as $v_category) {
                                                ?>
                                                <option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Color <span style="color: red">*</span></label>
                                        <?php
                                        foreach ($all_color as $v_color) {
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="color_name[]" value="<?php echo $v_color->color_name; ?>"><?php echo $v_color->color_name; ?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Size <span style="color: red">*</span></label>
                                        <?php
                                        foreach ($all_size as $v_size) {
                                            ?>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="size_name[]" value="<?php echo $v_size->size_name; ?>"><?php echo $v_size->size_name; ?></label>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Name <span style="color: red">*</span></label>
                                    <input type="text" required name="product_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Tag</label>
                                    <input type="text" name="product_tag" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Main Image <span style="color: red">*</span></label>
                                    <input type="file" name="product_image_0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 1</label>
                                    <input type="file" name="product_image_1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 2</label>
                                    <input type="file" name="product_image_2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Additional Image - 3</label>
                                    <input type="file" name="product_image_3" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Additional Image - 4</label>
                                    <input type="file" name="product_image_4" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity <span style="color: red">*</span></label>
                                    <input type="number" required name="product_quantity" id="product_quantity" onmouseout="startCalc();" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Current Price <span style="color: red">*</span></label>
                                    <input type="text" required name="product_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Old Price</label>
                                    <input type="text" name="product_old_price" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Summery</label>
                                    <textarea name="product_summery" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="product_description" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Product Status <span style="color: red">*</span></label>
                                        <select name="product_status" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Published</option>
                                            <option value="0">Unpublished</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>