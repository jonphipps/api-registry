<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Eloquent class to describe the schema_has_user table
 *
 * automatically generated by ModelGenerator.php
 */
class SchemaHasUser extends Model
{
    protected $table = 'schema_has_user';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'is_maintainer_for', 'is_registrar_for', 'is_admin_for', 'languages',
        'default_language', 'current_language');

    public function Schema()
    {
        return $this->belongsTo('App\Models\Schema', 'schema_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}

