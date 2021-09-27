<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Settings</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <h2 style="color:green; text-shadow: 1px 1px 1px red; text-align: center;">Manage City</h2>
                </div>
                <h3 style="color:green">
                    <?php
                    $city_msg = $this->session->userdata('city');
                    if (isset($city_msg)) {
                        echo $city_msg;
                        $this->session->unset_userdata('city');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="col-xs-6">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>City Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_city as $v_city) {
                                ?>
                                <tr>
                                    <td><?php echo $v_city->city_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_sale/edit_city/<?php echo $v_city->city_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit City"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_sale/delete_city/<?php echo $v_city->city_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete City" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/save_city" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>City Name</label>
                                    <input type="text" name="city_name" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Add City</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <h2 style="color:green; text-shadow: 1px 1px 1px red; text-align: center;">Manage Color</h2>
                </div>
                <h3 style="color:green">
                    <?php
                    $color_msg = $this->session->userdata('color');
                    if (isset($color_msg)) {
                        echo $color_msg;
                        $this->session->unset_userdata('color');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="col-xs-6">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Color Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_color as $v_color) {
                                ?>
                                <tr>
                                    <td><?php echo $v_color->color_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_sale/edit_color/<?php echo $v_color->color_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Color"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_sale/delete_color/<?php echo $v_color->color_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Color" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/save_color" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Color Name</label>
                                    <input type="text" name="color_name" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Add Color</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <h2 style="color:green; text-shadow: 1px 1px 1px red; text-align: center;">Manage Color Code</h2>
                </div>
                <h3 style="color:green">
                    <?php
                    $color_code_msg = $this->session->userdata('color_code');
                    if (isset($color_code_msg)) {
                        echo $color_code_msg;
                        $this->session->unset_userdata('color_code');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="col-xs-6">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Color Code Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_color_code as $v_color_code) {
                                ?>
                                <tr>
                                    <td><?php echo $v_color_code->color_code_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_sale/edit_color_code/<?php echo $v_color_code->color_code_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Color Code"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_sale/delete_color_code/<?php echo $v_color_code->color_code_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Color Code" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/save_color_code" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Color Code Name</label>
                                    <input type="text" name="color_code_name" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Add Color Code</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-4">
                    <h2 style="color:green; text-shadow: 1px 1px 1px red; text-align: center;">Manage Size</h2>
                </div>
                <h3 style="color:green">
                    <?php
                    $size_msg = $this->session->userdata('size');
                    if (isset($size_msg)) {
                        echo $size_msg;
                        $this->session->unset_userdata('size');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <div class="col-xs-6">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Size Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($all_size as $v_size) {
                                ?>
                                <tr>
                                    <td><?php echo $v_size->size_name; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>evis_sale/edit_size/<?php echo $v_size->size_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Size"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?php echo base_url(); ?>evis_sale/delete_size/<?php echo $v_size->size_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Size" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-6">
                    <form action="<?php echo base_url(); ?>evis_sale/save_size" method="POST">
                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Size Name</label>
                                    <input type="text" name="size_name" class="form-control">
                                </div>
                                <button type="reset" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Add Size</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>