<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Team
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/manage_team"> Manage Team</a></li>
            <li class="active">Edit Team</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sports/update_team" method="POST" name="team">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Team Name</label>
                                    <input type="text" required name="team_name" value="<?php echo $team_info->team_name; ?>" class="form-control">
                                    <input type="hidden" required name="team_id" value="<?php echo $team_info->team_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Team Wins</label>
                                    <input type="text" required name="team_wins" value="<?php echo $team_info->team_wins; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Loses</label>
                                    <input type="text" required name="team_loses" value="<?php echo $team_info->team_loses; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Team Ties</label>
                                    <input type="text" required name="team_ties" value="<?php echo $team_info->team_ties; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Goals</label>
                                    <input type="text" required name="team_goals" value="<?php echo $team_info->team_goals; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Team Points</label>
                                    <input type="text" required name="team_points" value="<?php echo $team_info->team_points; ?>" class="form-control">
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