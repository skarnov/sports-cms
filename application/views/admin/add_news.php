<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New News
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/manage_news"> Manage News</a></li>
            <li class="active">Add New News</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sale/save_news" method="POST" name="news" enctype="multipart/form-data">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_news');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_news');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>News Title <span style="color: red">*</span></label>
                                    <input type="text" name="news_title" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>News Image <span style="color: red">*</span></label>
                                    <input type="file" name="news_image" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date <span style="color: red">*</span></label>
                                    <input type="text" name="news_date" required value="<?php echo date("d-m-Y"); ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>News Summery <span style="color: red">*</span></label>
                                    <textarea name="news_summery" required class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Full News</label>
                                    <textarea name="full_news" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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