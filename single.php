<?php get_header(); ?>
    <div class="container">
        <div class="col-xs-12 col-lg-9 page-main-frame">
            <div class="row">
                <div class="col-xs-12 col-sm-12 sf_page_breadcrumbs visible-xs-inline-block visible-sm-block visible-md-block visible-lg-block">
                    <ol class="breadcrumb">
                        <li><a rel="bookmark" href="<?php echo home_url(); ?>">首页</a></li>
                        <?php the_post(); ?>
                        <li><?php if($category=get_the_category($post->ID)) echo (get_category_parents($category[0]->term_id, true, '</li><li>')); ?>
                            <?php the_title(); ?></li>
                        <?php rewind_posts(); ?>
                    </ol>
                </div>

                    <?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>"  class="col-xs-12 col-sm-12">
                            <div class="row sf_page_post">
                                <div class="col-xs-12 col-sm-12 post-header">
                                    <h2 class="post-title"><a href="<?php the_permalink(); ?>"
                                                              title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-lg-12 post_meta">
                                    <ul class="post_meta_ul">
                                        <li class="inline-li">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <?php echo date('Y-m-d H:i',strtotime($post->post_date)); ?>
                                        </li>
                                        <li class="inline-li">
                                            <span class="post-span"> | </span>
                                        </li>
                                        <li class="inline-li">
                                            <i class="fa fa-tags"></i>
                                            <?php the_category( ' , ' ); ?>
                                        </li>
                                        <li class="inline-li">
                                            <span class="post-span"> | </span>
                                        </li>
                                        <li class="inline-li">
                                            <?php sf_views(); ?> 阅读
                                        </li>
                                        <li class="inline-li">
                                            <i class="fa fa-comments-o"></i>
                                            <?php comments_popup_link('暂无回复','1 回复', '% 回复'); ?>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-xs-12 col-sm-12 post-body clearfix">
                                    <div class="post-content"><?php the_content( '' ); ?></div>
                                </div>

                                <div class="col-xs-12 col-sm-12">
                                    <br>
                                </div>

                                <div class="hidden-xs shareThumbsButton col-sm-12">
                                    <div class="col-xs-12 col-sm-12 post-share-pay">
                                        <a href="javascript:void(0)" onclick="dashangToggle()" class="thumbs_button fa fa-coffee" title="打赏支持一下"> 打赏</a>
                                        <a href="javascript:void(0)" onclick="showShare();" class="reward_button show_share fa fa-share-alt" title="分享"> 分享</a>
                                    </div>
                                    <div class="bdshareOuterbox" id="bdshareOuterbox">
                                        <div class="bdsharebuttonbox">
                                            <a href="#" class="bds_tsina fa fa-2x fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a>
                                            <a href="#" class="bds_weixin fa fa-2x fa-weixin" data-cmd="weixin" title="分享到微信"></a>
                                            <a href="#" class="bds_sqq fa fa-2x fa-qq" data-cmd="sqq" title="分享到QQ好友"></a>
                                            <a href="#" class="bds_fbook fa fa-2x fa-facebook" data-cmd="fbook" title="分享到Facebook"></a>
                                            <a href="#" class="bds_twi fa fa-2x fa-twitter" data-cmd="twi" title="分享到Twitter"></a>
                                            <a href="#" class="bds_copy fa fa-2x fa-copy" data-cmd="copy" title="分享到复制网址"></a>
                                            <a href="#" class="bds_more fa fa-2x fa-plus" data-cmd="more"></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="pay-content">
                                    <div class="hide_box"></div>
                                    <div class="shang_box">
                                        <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭"><img src="<?php echo sf_image('close.jpg'); ?>" alt="取消" /></a>
                                        <div class="shang_tit">
                                            <p>如果您觉得我的文章对您有所帮助，欢迎您打赏一点咖啡钱~</p>
                                        </div>
                                        <div class="shang_payimg">
                                            <img src="<?php echo sf_image('alipay_pay.png'); ?>" alt="扫码支持" title="扫一扫" />
                                        </div>
                                        <div class="pay_explain">感谢您的支持，我会继续努力的！</div>
                                        <div class="shang_payselect">
                                            <div class="pay_item checked" data-id="alipay">
                                                <span class="radiobox"></span>
                                                <span class="pay_logo"><img src="<?php echo sf_image('alipay.jpg'); ?>" alt="支付宝" /></span>
                                            </div>
                                            <div class="pay_item" data-id="wechatpay">
                                                <span class="radiobox"></span>
                                                <span class="pay_logo"><img src="<?php echo sf_image('wechatpay.jpg'); ?>" alt="微信" /></span>
                                            </div>
                                        </div>
                                        <div class="shang_info">
                                            <p>打开<span id="shang_pay_txt">支付宝</span>扫一扫，即可进行扫码打赏哦</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 post-page-tags">
                                    <i class="fa fa-tags"></i> 标签：<?php the_tags('', '，', ''); ?>
                                </div>

                                <div class="col-xs-12 col-sm-12 post-state">
                                    <p><b>版权声明：</b>本站文章如无说明，则为 <a href="<?php bloginfo( 'url' ); ?>" target="_blank"><?php bloginfo( 'name' ); ?></a> 原创，版权归作者所有，转载请注明出处！</p>
                                    <p><b>本文链接：</b><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_permalink(); ?></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>

                    <!-- 上一页下一页 begin -->
                    <div class="col-xs-12 col-sm-12 lastAndNext">
                        <div class="col-xs-12 col-sm-6 lastAndNext-left">
                            <p><?php if (get_previous_post()) { previous_post_link('上一篇：%link');} else {echo "上一篇：没有了，已经是最后文章";} ?></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 lastAndNext-right">
                            <p><?php if (get_next_post()) { next_post_link('下一篇：%link');} else {echo "下一篇：没有了，已经是最新文章";} ?></p>
                        </div>
                    </div>
                    <!-- 上一页下一页 end -->

                <?php comments_template(); ?>
            </div>
        </div>
        <!-- 侧栏 -->
        <?php get_sidebar(); ?>
    </div>

<script type="text/javascript">
    $(function() {
        $("#bdshareOuterbox").hide();
        $(".pay_item").click(function() {
            $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
            var dataid = $(this).attr('data-id');
            var datastr = dataid+'_pay.png';
            $(".shang_payimg img").attr("src", "<?php echo sf_image('"+datastr+"'); ?>");
            $("#shang_pay_txt").text(dataid == "alipay" ? "支付宝" : "微信");
        });
    });
    function dashangToggle() {
        $(".hide_box").fadeToggle();
        $(".shang_box").fadeToggle();
    }
    function showShare() {
        $("#bdshareOuterbox").toggle(400);
    }
</script>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{"bdCustomStyle":' '}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<?php get_footer(); ?>
