<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_inventory/manage_product"> Manage Product</a></li>
            <li class="active">Edit Product</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_inventory/update_product" method="POST" name="product">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Category</label>
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
                                        <label>Select Color (<span style="color:red;">Selected Color:</span> <?php echo $product_info->product_color; ?>)</label>
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
                                        <label>Select Size (<span style="color:red;">Selected Size:</span> <?php echo $product_info->product_size; ?>)</label>
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
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" value="<?php echo $product_info->product_name; ?>" class="form-control">
                                    <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Product Tag</label>
                                    <input type="text" name="product_tag" value="<?php echo $product_info->product_tag; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="product_quantity" value="<?php echo $product_info->product_quantity; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Current Price</label>
                                    <input type="text" name="product_price" value="<?php echo $product_info->product_price; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Product Old Price</label>
                                    <input type="text" name="product_old_price" value="<?php echo $product_info->product_old_price; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Summery</label>
                                    <textarea name="product_summery" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->product_summery; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea name="product_description" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $product_info->product_description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Product Status</label>
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
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </form>
                </div>
                <hr/>
                <br/><br/>
                <div class="col-xs-6">
                    <div class="box-body">
                        <div style="height: 350px; background-color: wheat; padding: 3%; box-shadow: 0px 0px 7px red">
                            <form action="<?php echo base_url(); ?>evis_inventory/edit_image_one" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_0; ?>" style="max-height:200px; max-width:200px;" />
                                    <br/><br/>
                                    <div class="form-group">
                                        <input type="file" name="product_image_0" class="form-control">
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right">Upload New Product Main Image</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="height: 350px; background-color: wheat; padding: 3%; box-shadow: 0px 0px 7px red">
                            <form action="<?php echo base_url(); ?>evis_inventory/edit_image_two" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_1; ?>" style="max-height:200px; max-width:200px;" />
                                    <br/><br/>
                                    <div class="form-group">
                                        <input type="file" name="product_image_1" class="form-control">
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right">Upload New Product Additional Image - 1</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="height: 350px; background-color: wheat; padding: 3%; box-shadow: 0px 0px 7px red">
                            <form action="<?php echo base_url(); ?>evis_inventory/edit_image_three" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_2; ?>" style="max-height:200px; max-width:200px;" />
                                    <br/><br/>
                                    <div class="form-group">
                                        <input type="file" name="product_image_2" class="form-control">
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right">Upload New Product Additional Image - 2</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="box-body">
                        <div style="height: 350px; background-color: wheat; padding: 3%; box-shadow: 0px 0px 7px red">
                            <form action="<?php echo base_url(); ?>evis_inventory/edit_image_four" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_3; ?>" style="max-height:200px; max-width:200px;" />
                                    <br/><br/>
                                    <div class="form-group">
                                        <input type="file" name="product_image_3" class="form-control">
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right">Upload New Product Additional Image - 3</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div style="height: 350px; background-color: wheat; padding: 3%; box-shadow: 0px 0px 7px red">
                            <form action="<?php echo base_url(); ?>evis_inventory/edit_image_five" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $product_info->product_image_4; ?>" style="max-height:200px; max-width:200px;" />
                                    <br/><br/>
                                    <div class="form-group">
                                        <input type="file" name="product_image_4" class="form-control">
                                        <input type="hidden" name="product_id" value="<?php echo $product_info->product_id; ?>">                                        
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info pull-right">Upload New Product Additional Image - 4</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['product'].elements['category_id'].value = '<?php echo $product_info->category_id; ?>';
    document.forms['product'].elements['product_status'].value = '<?php echo $product_info->product_status; ?>';
</script>