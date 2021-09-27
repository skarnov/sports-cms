<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Slide
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_app/add_slide">Add New Slide</a></li>
            <li class="active">Manage Slide</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_slide as $v_slide) {
                            ?>
                            <tr>
                                <td><?php echo $v_slide->slide_title; ?></td>
                                <td><img src="<?php echo base_url() . $v_slide->slide_image; ?>" style="height:200px; width:350px;" /></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_app/edit_slide/<?php echo $v_slide->slide_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Slide"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_app/delete_slide/<?php echo $v_slide->slide_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Slide" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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