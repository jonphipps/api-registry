<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileImportHistory extends Model
{
    protected $table = 'reg_file_import_history';
    
    protected $fillable = array('map', 'file_name', 'source_file_name', 'file_type', 'results', 'total_processed_count',
        'error_count', 'success_count');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"map" => "string",
		"user_id" => "integer",
		"vocabulary_id" => "integer",
		"schema_id" => "integer",
		"file_name" => "string",
		"source_file_name" => "string",
		"file_type" => "string",
		"batch_id" => "integer",
		"results" => "string",
		"total_processed_count" => "integer",
		"error_count" => "integer",
		"success_count" => "integer"
    ];

	public static $rules = [
	    
	];

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Schema()
    {
        return $this->belongsTo('App\Models\Schema', 'schema_id', 'id');
    }

    public function Batch()
    {
        return $this->belongsTo('App\Models\Batch', 'batch_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Models\ConceptPropertyHistory', 'import_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'import_id', 'id');
    }

}
