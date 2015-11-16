<?php namespace App\Entities;

/**
 * App\Entities\Batch
 *
 * @property integer $id
 * @property \Carbon\Carbon $run_time
 * @property string $run_description
 * @property string $object_type
 * @property integer $object_id
 * @property \Carbon\Carbon $event_time
 * @property string $event_type
 * @property string $event_description
 * @property string $registry_uri
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\FileImportHistory[] $FileImportHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereRunTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereRunDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereEventTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereEventType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereEventDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Batch whereRegistryUri($value)
 */
class Batch extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'reg_batch';

    public $timestamps = false;

    public function getDates()
    {
        return array('run_time', 'event_time');
    }

    protected $fillable = array('run_time', 'run_description', 'object_type', 'object_id', 'event_time', 'event_type',
        'event_description', 'istry_uri');

    public function FileImportHistory()
    {
        return $this->hasMany('App\Entities\FileImportHistory', 'batch_id', 'id');
    }

}

