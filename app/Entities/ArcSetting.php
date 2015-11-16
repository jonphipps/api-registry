<?php namespace App\Entities;

/**
 * App\Entities\ArcSetting
 *
 * @property string $k
 * @property string $val
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcSetting whereK($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcSetting whereVal($value)
 */
class ArcSetting extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_setting';

    public $primaryKey = 'k';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('val');

}

