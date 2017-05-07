<?php
/**
 * author      : shiwuhao
 * createTime  : 2017/5/7
 * description :
 */

namespace App\Transformer;


abstract class Transformer
{
    public function transformCollection($items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}