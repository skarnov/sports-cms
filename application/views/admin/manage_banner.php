<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Banner
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_banner">Add New Banner</a></li>
            <li class="active">Manage Banner</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_banner as $v_banner) {
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url() . $v_banner->banner_image; ?>" style="height:200px; width:400px;" />
                                </td>
                                <td>
                                    <div class='activation_color'>
                                        <?php
                                        if ($v_banner->banner_position == '1') {
                                            echo 'Buttom Left';
                                        }
                                        elseif ($v_banner->banner_position == '2') {
                                            echo 'Buttom Right';
                                        }
                                        ?>   
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/edit_banner/<?php echo $v_banner->banner_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Position"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_banner/<?php echo $v_banner->banner_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Banner" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>