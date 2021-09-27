<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                توقع معنا 
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    توقع معنا 
                </h1>
                <style> 
                    .fixture-item {
                        background-color: #fafafa;
                        box-shadow: 0 1px 1px 0 rgba( 0, 0, 0, .1 );
                        padding: 30px 20px;
                        margin: 0 0 20px 0;
                        transition: all 300ms;
                        box-sizing: border-box;
                    }
                </style>
                <?php
                foreach ($coming_soon_match as $v_schedule) {
                    ?>
                    <div class="fixture-item">
                        <div class="fixture-info clearfix">
                            <p class="pull-left match-date"><?php echo $v_schedule->match_date; ?></p>
                            <p class="pull-right league-name">Abdul Latif Jameel League</p>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="media">
                                    <div class="media-body">
                                        <h4><?php echo $v_schedule->first_team; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4" style="text-align: center;">
                                <i class="fa fa-clock-o"></i> <?php echo $v_schedule->match_time; ?>						</div>
                            <div class="col-xs-4">
                                <div class="media">  
                                    <div class="media-body">
                                        <h4 class="pull-right"><?php echo $v_schedule->opposite_team; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>
        </div>
    </div>
</section>