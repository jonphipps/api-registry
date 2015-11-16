<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\RdfNamespace
 *
 * @property integer $id
 * @property integer $schema_id
 * @property string $created_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $created_user_id
 * @property integer $updated_user_id
 * @property string $token
 * @property string $note
 * @property string $uri
 * @property string $schema_location
 * @property-read \App\Entities\ElementSet $ElementSet
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereSchemaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereCreatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereUpdatedUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereUri($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\RdfNamespace whereSchemaLocation($value)
 */
class RdfNamespace extends Model
{
    protected $table = 'reg_rdf_namespace';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'created_user_id', 'updated_user_id', 'token', 'note', 'uri',
        'schema_location');

    public function ElementSet()
    {
        return $this->belongsTo('App\Entities\ElementSet', 'schema_id', 'id');
    }

}

