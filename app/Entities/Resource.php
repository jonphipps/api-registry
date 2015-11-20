<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class Resource extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    public $table = "resources";
    
    protected $dates = ['deleted_at'];


    public $fillable = [
        "metadata"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "metadata" => "string"
    ];

    public static $rules = [

    ];



}
