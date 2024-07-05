<?php

namespace OwlAdmin\Components\Traits;

trait FormTrait
{
    /**
     * 表单排序字段
     *
     * @param $name
     * @param $label
     *
     * @return \Slowlyo\OwlAdmin\Renderers\NumberControl
     */
    public function formSort($name, $label = '')
    {
        return amis()->NumberControl($name, $label)
            ->required()
            ->value(0)
            ->min(0)
            ->max(999999)
            ->description('越大越靠前');
    }

    /**
     * 金额输入
     *
     * @param $name
     * @param $label
     * @param $precision
     *
     * @return \Slowlyo\OwlAdmin\Renderers\NumberControl
     */
    public function formAmount($name, $label = '', $precision = 0.01)
    {
        return amis()->NumberControl($name, $label)
            ->min(0.01)
            ->max(99999999)
            ->required()
            ->step(0.01)
            ->precision(0.01);
    }
}
