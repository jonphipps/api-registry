<?php namespace App\Models;

/**
 * App\Models\ArcS2val
 *
 * @property integer $id
 * @property integer $cid
 * @property boolean $misc
 * @property string $val
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcS2val whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcS2val whereCid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcS2val whereMisc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcS2val whereVal($value)
 */
class ArcS2val extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_s2val';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('cid', 'misc', 'val');

}

