<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage News
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/add_news">Add New News</a></li>
            <li class="active">Manage News</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_news');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_news');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body" id="search_news">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_news as $v_news) {
                            ?>
                            <tr>
                                <td><?php echo $v_news->news_title; ?></td>
                                <td><?php echo $v_news->news_date; ?></td>
                                <td>
                                    <img src="<?php echo base_url() . $v_news->news_image; ?>" style="height:100px; width:200px;" />
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_sale/edit_news/<?php echo $v_news->news_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit News"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_sale/delete_news/<?php echo $v_news->news_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete News" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
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