<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Team
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/manage_team"> Manage Team</a></li>
            <li class="active">Add New Team</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sports/save_team" method="POST" name="team">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_team');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_team');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Team Name <span style="color: red">*</span></label>
                                    <input type="text" required name="team_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Wins<span style="color: red">*</span></label>
                                    <input type="text" required name="team_wins" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Loses <span style="color: red">*</span></label>
                                    <input type="text" required name="team_loses" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Team Ties <span style="color: red">*</span></label>
                                    <input type="text" required name="team_ties" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Goals <span style="color: red">*</span></label>
                                    <input type="text" required name="team_goals" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Points <span style="color: red">*</span></label>
                                    <input type="text" required name="team_points" class="form-control">
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