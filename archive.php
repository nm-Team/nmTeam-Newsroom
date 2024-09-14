<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="post-list" id="main" role="main">
    <h3 class="archive-title"><?php $this->archiveTitle([
                                    'category' => _t('分类 %s 下的文章'),
                                    'search'   => _t('包含关键字 %s 的文章'),
                                    'tag'      => _t('标签 %s 下的文章'),
                                    'author'   => _t('%s 发布的文章')
                                ], '', ''); ?></h3>
    <?php if ($this->have()) : ?>
        <?php while ($this->next()) : ?>
            <a href="<?php $this->permalink() ?>" class="post item come-out-animation" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="image" style="background-image: url(<?php echo getPostImg($this); ?>);"></div>
                <div class="info">
                    <h2 class="post-title" itemprop="name headline">
                        <?php $this->title() ?>
                    </h2>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                </div>
            </a>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="not-found">
            <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
        </div>
    <?php endif; ?>
</div><!-- end #main -->

<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>