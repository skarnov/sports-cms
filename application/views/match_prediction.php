<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                توقع نتيجة المبارة
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    توقع نتيجة المبارة
                </h1>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('save_match_prediction');
                    if (isset($msg)) {
                        echo "<p style='margin-left:2%;'>$msg</p>";
                        $this->session->unset_userdata('save_match_prediction');
                    }
                    ?>
                </h3>
                <form action="<?php echo base_url() ?>evis_store/save_match_prediction" method="POST">
                    <div class="box col-xs-6">
                        <div class="form_content clearfix">
                            <div class="form-group input-field">
                                <h2><?php echo $match_schedule_info->first_team; ?></h2>
                            </div>
                            <div class="form-group input-field">
                                <label for="address"><?php echo $match_schedule_info->first_team; ?></label>
                                <textarea name="first_team_prediction" required class="is_required validate account_input form-control" style="resize: none; height: 100px;"></textarea>
                                <input type="hidden" name="match_id" value="<?php echo $match_schedule_info->match_id; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-1"></div>
                    <div class="box col-xs-5">
                        <div class="form-group input-field">
                            <h2><?php echo $match_schedule_info->opposite_team; ?></h2>
                        </div>
                        <div class="form-group input-field">
                            <label for="address"><?php echo $match_schedule_info->opposite_team; ?></label>
                            <textarea name="opposite_team_prediction" required class="is_required validate account_input form-control" style="resize: none; height: 100px;"></textarea>
                        </div>
                        <p class="submit">
                            <button type="submit" id="SubmitLogin" class="button btn btn-outline button-medium waves-effect waves-light">
                                <span>
                                    <i class="fa fa-user left"></i>&nbsp;
                                    انضم الينا
                                </span>
                            </button>
                        </p>
                    </div>
                </form>
            </section>
            <div class="col-xs-12">
                <div class="media">  
                    <?php
                    foreach ($current_prediction as $v_current_prediction) {
                        ?>
                        <div class="media-body">
                            <div class="entry-meta">
                                <strong class="comment-author">
                                    <a href="<?php echo base_url(); ?>"><?php echo $v_current_prediction->first_name; ?></a>
                                </strong> 
                                <span class="small comment-date">
                                    <i class="fa fa-clock-o"></i> <?php echo $v_current_prediction->date_of_prediction; ?>
                                </span>
                            </div>
                            <p class="comment-text">
                                <span style="color: #5ba244; font-weight: bolder;"><?php echo $v_current_prediction->first_team; ?>: </span>                                
                                <?php echo $v_current_prediction->first_team_prediction; ?>
                            </p>
                            <p class="comment-text">
                                <span style="color: #5ba244; font-weight: bolder;"><?php echo $v_current_prediction->opposite_team; ?>: </span>                                
                                <?php echo $v_current_prediction->opposite_team_prediction; ?>
                            </p>
                        </div>
                        <hr/>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>