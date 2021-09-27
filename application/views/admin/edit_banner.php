<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Banner Position
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/manage_banner"> Manage Banner</a></li>
            <li class="active">Edit Banner Position</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_app/update_banner" method="POST" name="banner">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <input type="hidden" name="banner_id" value="<?php echo $banner_info->banner_id; ?>">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Banner Position</label>
                                        <select name="banner_position" class="form-control select2" style="width: 100%;">
                                            <option value="">Select Status</option>
                                            <option value="1">Buttom Left</option>
                                            <option value="2">Buttom Right</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Edit Position</button>
                            </div>
                        </div>
                        <div class="box-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['banner'].elements['banner_position'].value = '<?php echo $banner_info->banner_position; ?>';
</script>