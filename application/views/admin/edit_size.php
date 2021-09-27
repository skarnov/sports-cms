<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Size
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/setting"> Setting</a></li>
            <li class="active">Edit Size</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/update_size" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Size Name</label>
                                    <input type="text" name="size_name" value="<?php echo $size_info->size_name; ?>" class="form-control">
                                    <input type="hidden" name="size_id" value="<?php echo $size_info->size_id; ?>">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>