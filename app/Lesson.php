<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\lesson
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $body
 * @property bool $free
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereFree($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Lesson whereUpdatedAt($value)
 */
class Lesson extends Model
{

//    protected $hidden = ['title'];
    protected $fillable = ['title', 'body'];

}
