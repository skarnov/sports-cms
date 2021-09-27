<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit City
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/setting"> Setting</a></li>
            <li class="active">Edit City</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/update_city" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" name="city_name" value="<?php echo $city_info->city_name; ?>" class="form-control">
                                    <input type="hidden" name="city_id" value="<?php echo $city_info->city_id; ?>">
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