<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Team
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sports/add_team">Add New Team</a></li>
            <li class="active">Manage Team</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_team');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_team');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body" id="search_team">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Team Name</th>
                            <th>Win</th>
                            <th>Loses</th>
                            <th>Ties</th>
                            <th>Goals</th>
                            <th>Points</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_team as $v_team) {
                            ?>
                            <tr>
                                <td><?php echo $v_team->team_name; ?></td>
                                <td><?php echo $v_team->team_wins; ?></td>
                                <td><?php echo $v_team->team_loses; ?></td>
                                <td><?php echo $v_team->team_ties; ?></td>
                                <td><?php echo $v_team->team_goals; ?></td>
                                <td><?php echo $v_team->team_points; ?></td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_sports/edit_team/<?php echo $v_team->team_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Team"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_sports/delete_team/<?php echo $v_team->team_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Team" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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