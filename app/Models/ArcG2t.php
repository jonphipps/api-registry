<?php namespace App\Models;

/**
 * App\Models\ArcG2t
 *
 * @property integer $g
 * @property integer $t
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcG2t whereG($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ArcG2t whereT($value)
 */
class ArcG2t extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_g2t';

    public $primaryKey = 't';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array();

}

