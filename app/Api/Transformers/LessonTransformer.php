<?php
/**
 * author      : shiwuhao
 * createTime  : 2017/5/7
 * description :
 */

namespace App\Api\Transformers;


use App\Lesson;
use League\Fractal\TransformerAbstract;

class LessonTransformer extends TransformerAbstract
{
    public function transform(Lesson $lesson)
    {
        return [
            'title' => $lesson['title'],
            'content' => $lesson['body'],
            'isFree' => (boolean)$lesson['free'],
        ];
    }
}