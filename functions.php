<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );

    $form->addInput($logoUrl);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档'),
            'ShowOther'          => _t('显示其它杂项')
        ],
        ['ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
}

// Post header image
function getPostImg($archive)
{
    $img = array();
    preg_match_all("/<img.*?src=\"(.*?)\".*?\/?>/i", $archive->content, $img);
    if (count($img) > 0 && count($img[0]) > 0) {
        return $img[1][0];
    } else {
        // return default image
        return 'data:image/png;base64,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';
    }
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/
