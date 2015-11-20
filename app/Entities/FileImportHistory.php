<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
/**
 * App\Entities\FileImportHistory
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property string $map stores the serialized column map array
 * @property integer $user_id
 * @property integer $vocabulary_id
 * @property integer $schema_id
 * @property string $file_name
 * @property string $source_file_name
 * @property string $file_type
 * @property integer $batch_id
 * @property string $results stores the serialized results of the import
 * @property integer $total_processed_count
 * @property integer $error_count
 * @property integer $success_count
 * @property-read \App\Entities\User $User
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @property-read \App\Entities\ElementSet $ElementSet
 * @property-read \App\Entities\Batch $Batch
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ConceptPropertyHistory[] $ConceptPropertyHistory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\ElementPropertyHistory[] $ElementPropertyHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereMap($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereSourceFileName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereFileType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereBatchId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereResults($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereTotalProcessedCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereErrorCount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\FileImportHistory whereSuccessCount($value)
 */
class FileImportHistory extends Model implements Transformable
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
        "map" => "max:65535",
        "file_name" => "max:255",
        "source_file_name" => "max:255",
        "file_type" => "max:30",
        "results" => "max:65535"
    ];

    public function User()
    {
        return $this->belongsTo('App\Entities\User', 'user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

    public function ElementSet()
    {
        return $this->belongsTo('App\Entities\ElementSet', 'schema_id', 'id');
    }

    public function Batch()
    {
        return $this->belongsTo('App\Entities\Batch', 'batch_id', 'id');
    }

    public function ConceptPropertyHistory()
    {
        return $this->hasMany('App\Entities\ConceptPropertyHistory', 'import_id', 'id');
    }

    public function ElementPropertyHistory()
    {
        return $this->hasMany('App\Entities\ElementPropertyHistory', 'import_id', 'id');
    }

}
