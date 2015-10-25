<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Eloquent class to describe the _vocabulary_has_version table
 *
 * automatically generated by ModelGenerator.php
 */
class VocabularyHasVersion extends Model
{
    protected $table = 'reg_vocabulary_has_version';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at', 'timeslice');
    }

    protected $fillable = array('name', 'deleted_at', 'timeslice');

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

}

