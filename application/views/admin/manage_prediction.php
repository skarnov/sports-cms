<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Prediction
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Manage Prediction</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body" id="search_prediction">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Match</th>
                            <th>First Team</th>
                            <th>Opposite Team</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_prediction as $v_prediction) {
                            ?>
                            <tr>
                                <td><?php echo $v_prediction->first_name; ?></td>
                                <td><?php echo $v_prediction->first_team. ' Vs '. $v_prediction->opposite_team; ?></td>
                                <td><?php echo "<span style='color:red;'>$v_prediction->first_team :- </span>"; ?> <?php echo '<br/>'.$v_prediction->first_team_prediction; ?> </td>
                                <td><?php echo "<span style='color:red;'>$v_prediction->opposite_team :- </span>"; ?> <?php echo '<br/>'.$v_prediction->opposite_team_prediction; ?> </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_sports/delete_prediction/<?php echo $v_prediction->prediction_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Prediction" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>