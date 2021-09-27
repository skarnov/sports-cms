<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Match Schedule
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/manage_match_schedule"> Manage Match Schedule</a></li>
            <li class="active">Add New Match Schedule</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sports/save_match_schedule" method="POST" name="match_schedule">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_match_schedule');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_match_schedule');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>First Team <span style="color: red">*</span></label>
                                    <input type="text" required name="first_team" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Opposite Team <span style="color: red">*</span></label>
                                    <input type="text" required name="opposite_team" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Match Time <span style="color: red">*</span></label>
                                    <input type="text" required name="match_time" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Match Date <span style="color: red">*</span></label>
                                    <input type="text" name="match_date" required value="<?php echo date("d-m-Y"); ?>" class="form-control">
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