<?php namespace App\Models;

/**
 * App\Models\ArcId2val
 *
 * @property integer $id
 * @property boolean $misc
 * @property string $val
 * @property boolean $val_type
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcId2val whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcId2val whereMisc($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcId2val whereVal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcId2val whereValType($value)
 */
class ArcId2val extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_id2val';

    public $primaryKey = 'val_type';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('misc', 'val');

}

