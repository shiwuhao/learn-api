<?php
/**
 * author      : shiwuhao
 * createTime  : 2017/5/7
 * description :
 */

namespace App\Transformer;


/**
 * Class LessonTransformer
 * @package app\Transformer
 */
class LessonTransformer extends Transformer
{

    /**
     * @param $item
     * @return array
     */
    public function transform($item)
    {
        return [
            'title' => $item['title'],
            'content' => $item['body'],
            'isFree' => (boolean)$item['free'],
        ];
    }
}