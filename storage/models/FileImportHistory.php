<?php namespace App\Models;

/**
 * Eloquent class to describe the reg_file_import_history table
 *
 * automatically generated by ModelGenerator.php
 */
class FileImportHistory extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'reg_file_import_history';

    protected $fillable = array('map', 'file_name', 'source_file_name', 'file_type', 'results', 'total_processed_count',
        'error_count', 'success_count');

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

    public function SchemaPropertyElementHistory()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'import_id', 'id');
    }

}

