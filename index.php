<?php

/**
 * nmTeam Newsroom Typecho Theme
 *
 * @package nmTeam Newsroom Typecho Theme
 * @author nmTeam
 * @version 1.0
 * @link http://newsroom.nmteam.xyz
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="post-list" id="main" role="main">
    <?php while ($this->next()) : ?>
        <a href="<?php $this->permalink() ?>" class="post item come-out-animation" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="image" style="background-image: url(<?php echo getPostImg($this); ?>);"></div>
            <div class="info">
                <div class="category">
                    <?php $this->category(', ', false); ?>
                </div>
                <h2 class="post-title" itemprop="name headline">
                    <?php $this->title() ?>
                </h2>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
            </div>
        </a>
    <?php endwhile; ?>

</div><!-- end #main-->

<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>