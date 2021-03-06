<?php get_header(); ?>

    <div class="container body-container">
        <!-- 左主体 -->
        <div class="col-xs-12 col-lg-9 left-body" >
            <!-- 专题 -->
            <div class="col-xs-12 col-sm-3 index-subject">
                <a href="<?php echo sf_setting('index-subject1')?sf_setting('index-subject1'):'#'; ?>">
                    <div class="col-xs-12 col-sm-12 index-subject-block index-subject-block-1">
                        <div class="subject-tag subject-tag-1">
                            <span>专题</span>
                        </div>
                        <span class="subject-words"></span>
                    </div>
                </a>
                <a href="<?php echo sf_setting('index-subject2')?sf_setting('index-subject2'):'#'; ?>">
                    <div class="col-xs-12 col-sm-12 index-subject-block index-subject-block-2">
                        <div class="subject-tag subject-tag-2">
                            <span>专题</span>
                        </div>
                        <span class="subject-words"></span>
                    </div>
                </a>
            </div>
            <!-- 轮播图 -->
            <div class="col-xs-12 col-sm-9 index-carousel">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $defaultImg = sf_image('timg.jpg');
                        ?>
                        <div class="item active">
                            <img src="<?php echo sf_setting('index-carousel-img1')?sf_setting('index-carousel-img1'):$defaultImg; ?>" alt="...">
                            <div class="carousel-caption">
                                <a href="<?php echo sf_setting('index-carousel-url1')?sf_setting('index-carousel-url1'):'#'; ?>" target="_blank">
                                    <h4><?php echo sf_setting('index-carousel-title1'); ?></h4>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo sf_setting('index-carousel-img2')?sf_setting('index-carousel-img2'):$defaultImg; ?>" alt="...">
                            <div class="carousel-caption">
                                <a href="<?php echo sf_setting('index-carousel-url2')?sf_setting('index-carousel-url2'):'#'; ?>" target="_blank">
                                    <h4><?php echo sf_setting('index-carousel-title2'); ?></h4>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <img src="<?php echo sf_setting('index-carousel-img3')?sf_setting('index-carousel-img3'):$defaultImg; ?>" alt="...">
                            <div class="carousel-caption">
                                <a href="<?php echo sf_setting('index-carousel-url3')?sf_setting('index-carousel-url3'):'#'; ?>" target="_blank">
                                    <h4><?php echo sf_setting('index-carousel-title3'); ?></h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- 工具栏与热门推荐 -->
            <div class="col-xs-12 col-sm-12 index-hot">
                <div class="col-xs-12 col-sm-3 index-hot-tools hidden-xs">
                    <div class="col-xs-12 hot-tools-button hot-tools-button-1">
                        <a href="<?php echo sf_setting('index-tool1')?sf_setting('index-tool1'):'#'; ?>">链接收藏</a>
                    </div>
                    <div class="col-xs-12 hot-tools-button hot-tools-button-2">
                        <a href="<?php echo sf_setting('index-tool2')?sf_setting('index-tool2'):'#'; ?>">我的作品</a>
                    </div>
                    <div class="col-xs-12 hot-tools-img"></div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="col-xs-12 col-sm-6 index-hot-widget index-hot-article">
                        <h4><span><i class="fa fa-fire"></i>&nbsp;热评文章</span></h4>
                        <ul class="">
                            <?php sf_most_viewed(); ?>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 index-hot-widget index-hot-push">
                        <h4><span><i class="fa fa-fire"></i>&nbsp;随机文章</span></h4>
                        <ul class="">
                            <?php random_posts(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 文章列表 -->
            <div class="col-xs-12 col-sm-12 index-article">
                <div class="index-article-box">
                        <?php
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                            $post_thumbnail = sf_thumbnail( 'index-thumbnail', 240, 240 );
                            $post_class     = 'col-xs-12 col-sm-12 col-lg-12 sf_post_list';

                            if ( $post_thumbnail["exist"] ) {
                                $post_class .= ' sf_post_thumbnail';
                            }
                            else{
                                $post_class .= ' sf_post_normal';
                            }
                            ?>
                            <div  id="post-<?php the_ID(); ?>" class="<?php echo $post_class; ?>">
                                <div class="col-xs-12 col-sm-12 col-lg-12 post_body">
                                    <?php
                                        if ( $post_thumbnail["exist"] ) : ?>
                                            <div class="col-xs-12 col-sm-4 col-md-3 post-thumbnail">
                                                <div class="ih-item square effect6 from_top_and_bottom">
                                                    <a href="<?php the_permalink() ?>" rel="bookmark">
                                                        <div class="img">
                                                            <img class="lazy" src="<?php echo sf_image('placeholder.png'); ?>"
                                                                 data-original="<?php echo sf_thumbnail_url($post_thumbnail); ?>"
                                                                 alt="<?php the_title(); ?>" width="240" height="240"/>
                                                        </div>
                                                        <div class="info">
                                                            <h3><?php the_title(); ?></h3>
                                                            <p><i class="fa fa-eye"></i>点击阅读</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-8 col-md-9 post-content">
                                        <?php else : ?>
                                            <div class="col-xs-12 col-sm-12 col-lg-12 post-content">
                                        <?php endif; ?>
                                                <div class="col-xs-12 col-sm-12 col-lg-12 post_title">
                                                    <h2>
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                        <?php if ( is_sticky() ) { ?>
                                                            <span class="post-sticky label label-danger"><?php _e( 'Stick', SF_NAME ); ?></span>
                                                        <?php } ?>
                                                    </h2>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-lg-12 post_meta">
                                                    <ul class="post_meta_ul">
                                                        <li class="inline-li">
                                                            <i class="fa fa-calendar-check-o"></i>
                                                            <?php echo date('Y-m-d H:i',strtotime($post->post_date)); ?>
                                                        </li>
                                                        <li class="inline-li">
                                                            <i class="fa fa-tags"></i>
                                                            <?php the_category( ' , ' ); ?>
                                                        </li>
                                                        <li class="inline-li">
                                                            <i class="fa fa-eye"></i>
                                                            <?php echo sf_views(); ?> 阅读
                                                        </li>
                                                        <li class="inline-li">
                                                            <i class="fa fa-comments-o"></i>
                                                            <?php comments_popup_link( '暂无回复', '1 条回复', '% 条回复', '', '评论关闭'); ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-lg-12 post-content-main">
                                                    <?php
                                                    $short_post = sf_excerpt( $post->post_content, 300 );
                                                    $short_post = empty($short_post) ? "该文章没有预览内容，请直接进入文章页浏览。" : $short_post;
                                                    printf( '<p>%s</p>', $short_post );
                                                    ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-lg-12 post-bottom">
                                                    <div class="col-xs-9 col-sm-9 post-tags">
                                                        <?php the_tags('',' '); ?>
                                                    </div>
                                                    <a class="view-all" href="<?php the_permalink() ?>">阅读全文 &raquo;</a>
                                                </div>
                                            </div>
                                </div>
                            </div>

                        <?php endwhile; else: ?>
                            <div class="col-xs-12 col-sm-12 col-lg-12">
                                <h2><?php _e('抱歉。'); ?></h2>
                                <p><?php _e('没有内容！'); ?></p>
                            </div>
                        <?php endif; ?>
                </div>
                <div class="row">
                    <nav class="text-center" aria-label="Page navigation">
                        <ul class="pagination">
                            <?php sf_pagenavi(); ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- 侧栏 -->
        <?php get_sidebar(); ?>
    </div>

<?php get_footer(); ?>

