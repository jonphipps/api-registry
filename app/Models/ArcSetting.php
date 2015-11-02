<?php namespace App\Models;

/**
 * App\Models\ArcSetting
 *
 * @property string $k
 * @property string $val
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcSetting whereK($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcSetting whereVal($value)
 */
class ArcSetting extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_setting';

    public $primaryKey = 'k';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('val');

}

