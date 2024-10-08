<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="sidebar" id="secondary" role="complementary">
    <?php if (!$this->is('index') && !empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)) : ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('最新文章'); ?></h3>
            <ul class="widget-list widget-post-list">
                <?php while (\Widget\Contents\Post\Recent::alloc()
                    ->next()
                ) :
                    $post = \Widget\Contents\Post\Recent::alloc();
                ?>
                    <a class="post come-out-animation" href="<?php \Widget\Contents\Post\Recent::alloc()->permalink(); ?>">
                        <div class="image" style="background-image: url(<?php echo getPostImg($post); ?>);"></div>
                        <div class="info">
                            <h4 class="post-title"><?php \Widget\Contents\Post\Recent::alloc()->title(); ?></h4>
                            <div class="other">
                                <span class="category"><?php \Widget\Contents\Post\Recent::alloc()->category(', ', false, false); ?></span><time datetime="<?php \Widget\Contents\Post\Recent::alloc()->date('c'); ?>"><?php \Widget\Contents\Post\Recent::alloc()->date(); ?></time>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </ul>
            <p class="sidebar-show">
                <a href="javascript:toggleSidebarCategory();"><?php _e('显示文章归档'); ?></a>
            </p>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)) : ?>
        <section class="widget sidebar-hidden">
            <h3 class="widget-title"><?php _e('分类'); ?></h3>
            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)) : ?>
        <section class="widget sidebar-hidden">
            <h3 class="widget-title"><?php _e('归档'); ?></h3>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)) : ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('更多'); ?></h3>
            <ul class="widget-list">
                <!-- <?php if ($this->user->hasLogin()) : ?>
                    <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>
                            (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else : ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a>
                    </li>
                <?php endif; ?> -->
                <li><a href="https://nmteam.xyz"><?php _e('nmTeam'); ?></a></li>
                <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
                <!-- <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li> -->
                <!-- <li><a href="https://typecho.org">Typecho</a></li> -->
            </ul>
        </section>
    <?php endif; ?>

</div><!-- end #sidebar -->