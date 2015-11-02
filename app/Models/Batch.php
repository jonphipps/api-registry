<?php namespace App\Models;

/**
 * App\Models\Batch
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FileImportHistory[] $FileImportHistory
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereRunTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereRunDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereObjectType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereObjectId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereEventTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereEventType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereEventDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Batch whereRegistryUri($value)
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
        return $this->hasMany('App\Models\FileImportHistory', 'batch_id', 'id');
    }

}

