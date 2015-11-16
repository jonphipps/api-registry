<?php namespace App\Entities;

/**
 * App\Entities\ArcG2t
 *
 * @property integer $g
 * @property integer $t
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcG2t whereG($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcG2t whereT($value)
 */
class ArcG2t extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_g2t';

    public $primaryKey = 't';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array();

}

