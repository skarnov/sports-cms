<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>" title="">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                اخر الاخبار 
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <h1 class="page-heading product-listing">
                    اخر الاخبار 
                </h1>
                <?php
                foreach ($all_news as $v_news) {
                    ?>      
                <div class="secondary-blog">
                    <div class="col-xs-4">
                        <article class="blog-item" style="padding: 4%;">
                            <h4 class="title"><a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>"></a><?php echo $v_news->news_title; ?></h4>
                            <div class="meta" style="margin-bottom: 3%">
                                <span class="created">
                                    <span class="icon-calendar"> في: </span> 
                                    <time class="date"><?php echo $v_news->news_date; ?></time>
                                </span>
                            </div>
                            <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>" class="image">
                                <img src="<?php echo base_url() . $v_news->news_image; ?>" title="" class="img-responsive" />
                            </a>
                            <div class="shortinfo">
                                <p style="margin-top: 3%"><?php echo $v_news->news_summery; ?></p>
                                <p>
                                    <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $v_news->news_id; ?>" class="more btn btn-default">اقرأ المزيد</a>
                                </p>
                            </div>
                        </article>
                    </div>
                    </div>
                <?php } ?>
                <div class="content_sortPagiBar sortPagiBar-bottom">
                    <div class="bottom-pagination-content clearfix row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div id="pagination_bottom" class="pagination clearfix pull-right">
                                <ul class="pagination pull-left">
                                    <?php echo $this->pagination->create_links(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>