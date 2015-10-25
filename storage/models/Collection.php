<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Eloquent class to describe the _collection table
 *
 * automatically generated by ModelGenerator.php
 */
class Collection extends Model
{
    protected $table = 'reg_collection';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at', 'last_updated');
    }

    protected $fillable = array('deleted_at', 'last_updated', 'name', 'uri', 'pref_label');

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

}

