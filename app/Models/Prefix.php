<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
