<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Match Schedule
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/manage_match_schedule"> Manage Match Schedule</a></li>
            <li class="active">Edit Match Schedule</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sports/update_match_schedule" method="POST" name="match_schedule">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('edit_match_schedule');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('edit_match_schedule');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>First Team </label>
                                    <input type="text" required name="first_team" value="<?php echo $match_schedule_info->first_team; ?>" class="form-control">
                                    <input type="hidden" required name="match_id" value="<?php echo $match_schedule_info->match_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Opposite Team</label>
                                    <input type="text" required name="opposite_team" value="<?php echo $match_schedule_info->opposite_team; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Match Time </label>
                                    <input type="text" required name="match_time" value="<?php echo $match_schedule_info->match_time; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Match Date </label>
                                    <input type="text" name="match_date" required value="<?php echo $match_schedule_info->match_date; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>