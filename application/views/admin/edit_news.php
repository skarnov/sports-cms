<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit News
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_sale/manage_news"> Manage News</a></li>
            <li class="active">Edit News</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_sale/update_news" method="POST" name="news" enctype="multipart/form-data">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>News Title</label>
                                    <input type="text" name="news_title" value="<?php echo $news_info->news_title; ?>" class="form-control">
                                    <input type="hidden" name="news_id" value="<?php echo $news_info->news_id; ?>">
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_url() . $news_info->news_image; ?>" style="max-height:200px;" />
                                </div>
                                <div class="form-group">
                                    <label>New News Image </label>
                                    <input type="file" name="news_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" name="news_date" value="<?php echo $news_info->news_date; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>News Summery</label>
                                    <textarea name="news_summery" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $news_info->news_summery; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Full News</label>
                                    <textarea name="full_news" class="textarea" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $news_info->full_news; ?></textarea>
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