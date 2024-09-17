<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php
// The permalink has been changed
// from /news/{directory}/{cid}-{slug}-{year}-{month}-{day}.html
// to /news/{cid}-{slug}-{year}-{month}-{day}.html
if (preg_match('/\/news\/(.+?)\/(.+?)$/', $_SERVER['REQUEST_URI'], $matches)) {
    $this->response->redirect('/news/' . $matches[2], 301);
    $this->response->end();
}
?>

<div class="error-page">
    <h2 class="title"><?php _e('找不到页面'); ?></h2>
    <p>
        <img src="<?php $this->options->themeUrl('img/404.png'); ?>" alt="404" />
    </p>
    <form method="post" class="search-box">
        <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
        <input type="text" name="s" class="text" autofocus placeholder="<?php _e('输入关键字搜索'); ?>" />
        <button type="submit" class="submit">
            <svg t="1726497330077" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1637">
                <path d="M661.44 597.44h-33.92l-11.84-11.52a277.76 277.76 0 1 0-29.76 29.76l11.52 11.84v33.6l213.44 212.8 64-64z m-256 0a192 192 0 1 1 192-192 192 192 0 0 1-192 192z" p-id="1638"></path>
            </svg>
        </button>
    </form>
</div><!-- end #content-->
<?php $this->need('footer.php'); ?>