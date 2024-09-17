<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle([
                'category' => _t('分类 %s 下的文章'),
                'search'   => _t('包含关键字 %s 的文章'),
                'tag'      => _t('标签 %s 下的文章'),
                'author'   => _t('%s 发布的文章')
            ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ayahub/webfont-harmony-sans-sc@1.0.0/css/index.min.css" media="print" onload="this.media='all'" />

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body data-nav-menu-extended="false">
    <header id="header" class="clearfix" data-nav-menu-extended="false">
        <div class="container">
            <div class="site-name">
                <?php if ($this->options->logoUrl) : ?>
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>" tabindex="-1">
                        <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                    </a>
                <?php endif; ?>
                <a class="site-name-text" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
            </div>
            <nav id="nav-menu" class="clearfix" role="navigation" data-nav-menu-extended="false">
                <a<?php if ($this->is('index')) : ?> class="current" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <a<?php if ($this->is('page', $pages->slug)) : ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
                        <a href="javascript:toggleHeader();" class="search-toggle"><?php _e('搜索'); ?></a>
            </nav>
            <button id="menu-toggle" class="menu-toggle" aria-controls="nav-menu" aria-expanded="false" data-nav-menu-extended="false" onclick="toggleHeader()">
                <span class="bar bar-1"></span>
                <span class="bar bar-2"></span>
                <span class="bar bar-3"></span>
            </button>
        </div>
        <div class="extend-menu" data-nav-menu-extended="false">
            <nav id="extend-nav-menu" class="clearfix" role="navigation" data-nav-menu-extended="false">
                <a<?php if ($this->is('index')) : ?> class="current" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php while ($pages->next()) : ?>
                        <a<?php if ($this->is('page', $pages->slug)) : ?> class="current" <?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                        <?php endwhile; ?>
            </nav>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" class="search-box" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit" aria-label="<?php _e('搜索'); ?>">
                        <svg t="1726497330077" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1637">
                            <path d="M661.44 597.44h-33.92l-11.84-11.52a277.76 277.76 0 1 0-29.76 29.76l11.52 11.84v33.6l213.44 212.8 64-64z m-256 0a192 192 0 1 1 192-192 192 192 0 0 1-192 192z" p-id="1638"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </header><!-- end #header -->
    <div id="body">
        <div class="container">
            <div class="row">