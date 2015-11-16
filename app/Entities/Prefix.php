<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\Prefix
 *
 * @property string $prefix
 * @property string $uri
 * @property integer $rank
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Prefix wherePrefix($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Prefix whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Prefix whereRank($value)
 */
class Prefix extends Model
{
    protected $table = 'reg_prefix';

    public $primaryKey = 'prefix';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('uri', 'rank');
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "prefix" => "string",
        "uri" => "string",
        "rank" => "integer"
    ];

    public static $rules = [

    ];

}
