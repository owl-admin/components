<?php

namespace OwlAdmin\Components;

use OwlAdmin\Components\Traits\ListTrait;
use OwlAdmin\Components\Traits\FormTrait;
use OwlAdmin\Components\Traits\DetailTrait;

class Components
{
    use ListTrait, FormTrait, DetailTrait;

    public static function make()
    {
        return new self();
    }

    /**
     * 导入按钮
     *
     * @param string $api   导入接口
     * @param string $title 按钮标题
     *
     * @return \Slowlyo\OwlAdmin\Renderers\DialogAction
     */
    public function importAction(string $api, string $title = '导入')
    {
        // 导入的弹窗按钮
        return amis()->DialogAction()->label($title)->icon('fa fa-upload')->dialog(
            amis()->Dialog()->title($title)->body(
                amis()->Form()->mode('normal')->api($api)->body([
                    // 导入文件上传
                    amis()->FileControl()->name('file')->required()->drag(),
                ]),
            )
        );
    }
}
