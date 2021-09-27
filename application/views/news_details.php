<div id="breadcrumb" class="clearfix">
    <div class="container">
        <div class="inner">
            <div class="breadcrumb clearfix">
                <a class="home" href="<?php echo base_url(); ?>">الرئيسية </a>
                <span class="navigation-pipe">&gt;</span>
                <a href="">تفاصيل الخبر</a>
            </div>
        </div>
    </div>
</div>
<section id="columns" class="columns-container">
    <div class="container">
        <div class="row">
            <section id="center_column" class="col-md-12">
                <div id="blog-listing" class="blogs-container box">
                    <div class="inner">
                        <div class="leading-blog">  
                            <div class="nocol-lg-12">
                                <article class="blog-item" style="padding: 4%;">
                                    <h4 class="title">
                                        <a href="<?php echo base_url(); ?>evis_store/news_details/<?php echo $news_info->news_id; ?>" title=""><?php echo $news_info->news_title; ?></a>
                                    </h4>
                                    <div class="meta" style="margin-bottom: 3%">
                                        <span class="created">
                                            <span class="icon-calendar"> في: </span> 
                                            <time class="date"><?php echo $news_info->news_date ?></time>
                                        </span>
                                    </div>
                                    <div class="image">
                                        <img src="<?php echo base_url() . $news_info->news_image; ?>" title="" class="img-responsive" />
                                    </div>
                                    <div class="shortinfo" style="margin-top: 3%">
                                        <?php echo $news_info->full_news ?>
                                    </div>
                                </article>
                            </div>	
                        </div>
                    </div>
                </div>
                <div id="fb-root"></div>
                <script>
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=116412045458033";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));
                </script>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="960" data-numposts="3"></div>
            </section>
        </div>
</section>