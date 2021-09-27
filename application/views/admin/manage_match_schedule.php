<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Match Schedule
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/add_match_schedule">Add New Match Schedule</a></li>
            <li class="active">Manage Match Schedule</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_match_schedule');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_match_schedule');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body" id="search_match_schedule">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>First Team</th>
                            <th>Opposite Team</th>
                            <th>Match Time</th>
                            <th>Match Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_match_schedule as $v_match_schedule) {
                            ?>
                            <tr>
                                <td><?php echo $v_match_schedule->first_team; ?></td>
                                <td><?php echo $v_match_schedule->opposite_team; ?></td>
                                <td><?php echo $v_match_schedule->match_time; ?></td>
                                <td><?php echo $v_match_schedule->match_date; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_sports/edit_match_schedule/<?php echo $v_match_schedule->match_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Match Schedule"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_sports/delete_match_schedule/<?php echo $v_match_schedule->match_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Match Schedule" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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