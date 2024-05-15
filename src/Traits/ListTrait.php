<?php

namespace OwlAdmin\Components\Traits;

trait ListTrait
{
    /**
     * 列表图片
     *
     * @param $name
     * @param $label
     *
     * @return mixed
     */
    public function listImage($name, $label = '')
    {
        return amis()->TableColumn($name, $label)->type('image')->enlargeAble(true);
    }

    /**
     * 列表 - 快速编辑开关
     *
     * @param string $name
     * @param string $label
     *
     * @return \Slowlyo\OwlAdmin\Renderers\TableColumn
     */
    public function listSwitch(string $name, string $label = '')
    {
        return amis()->TableColumn($name, $label)->quickEdit(
            amis()->SwitchControl()->saveImmediately(1)->mode('inline')
        );
    }

    /**
     * 列表 - 长文本展示
     *
     * @param     $name
     * @param     $label
     * @param int $limit
     *
     * @return mixed
     */
    public function listLongText($name, $label, int $limit = 20)
    {
        return amis()->TableColumn()
            ->name($name)
            ->label($label)
            ->type('tpl')
            ->tpl('${' . $name . '|truncate:' . $limit . '}')
            ->popOver(
                amis()->SchemaPopOver()
                    ->body('${' . $name . '}')
                    ->trigger('hover')
                    ->showIcon(false)
                    ->position('left-bottom')
            );
    }

    /**
     * 列表 tag 展示
     *
     * @param        $name
     * @param        $label
     * @param        $key
     * @param        $level
     *
     * @return mixed
     */
    public function listTags($name, $label = '', $key = '', $level = 'info')
    {
        $key = $key ? 'item.' . $key : 'item';

        return amis()->TableColumn($name, $label)->type('each')->items(
            amis()->Tpl()->tpl('<span class="label label-' . $level . ' mr-2">${' . $key . '}</span>')
        );
    }
}
