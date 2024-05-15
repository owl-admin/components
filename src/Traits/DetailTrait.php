<?php

namespace OwlAdmin\Components\Traits;

trait DetailTrait
{
    /**
     * 详情 tag 展示
     *
     * @param        $name
     * @param        $label
     * @param        $key
     * @param        $level
     *
     * @return mixed
     */
    public function detailTags($name, $label = '', $key = '', $level = 'info')
    {
        $key = $key ? 'item.' . $key : 'item';

        return amis()->StaticExactControl($name, $label)->type('static-each')->items(
            amis()->Tpl()->tpl('<span class="label label-' . $level . ' mr-2">${' . $key . '}</span>')
        );
    }

    /**
     * 详情图片展示
     *
     * @param $name
     * @param $label
     *
     * @return mixed
     */
    public function detailImage($name, $label = '')
    {
        return amis()->StaticExactControl($name, $label)->type('static-image')->enlargeAble(true);
    }

    /**
     * 详情图片展示 (可下载)
     *
     * @param $name
     * @param $label
     *
     * @return \Slowlyo\OwlAdmin\Renderers\FormControl
     */
    public function detailDownloadImage($name, $label = '')
    {
        return amis('control')->name($name)->label($label)->body([
            amis()->Image()->src('${' . $name . '}')->enlargeAble(),
            amis()->Wrapper()->size('none')->body(
                amis()->Tpl()->tpl('<a href="${' . $name . '}" download="${TIMESTAMP(NOW())}">下载</a>')
            ),
        ]);
    }
}
