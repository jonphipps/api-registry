<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Element extends Model
{
    use SoftDeletes;

    protected $table = 'reg_schema_property';
    
	protected $dates = ['deleted_at'];


    protected $fillable = array('deleted_at', 'name', 'label', 'definition', 'comment', 'type', 'parent_uri', 'uri',
        'language', 'note', 'domain', 'orange', 'is_deprecated', 'url', 'lexical_alias');
	
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
		"created_user_id" => "integer",
		"updated_user_id" => "integer",
		"schema_id" => "integer",
		"name" => "string",
		"label" => "string",
		"definition" => "string",
		"comment" => "string",
		"type" => "string",
		"is_subproperty_of" => "integer",
		"parent_uri" => "string",
		"uri" => "string",
		"status_id" => "integer",
		"language" => "string",
		"note" => "string",
		"domain" => "string",
		"orange" => "string",
		"is_deprecated" => "boolean",
		"url" => "string",
		"lexical_alias" => "string"
    ];

	public static $rules = [
	    
	];

    public function UserCreator()
    {
        return $this->belongsTo('App\Models\User', 'created_user_id', 'id');
    }

    public function UserUpdater()
    {
        return $this->belongsTo('App\Models\User', 'updated_user_id', 'id');
    }

    public function Schema()
    {
        return $this->belongsTo('App\Models\Schema', 'schema_id', 'id');
    }

    public function SchemaProperty()
    {
        return $this->belongsTo('App\Models\SchemaProperty', 'is_subproperty_of', 'id');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id', 'id');
    }

    public function Discussions()
    {
        return $this->hasMany('App\Models\Discuss', 'schema_property_id', 'id');
    }

    public function ParentElements()
    {
        return $this->hasMany('App\Models\SchemaProperty', 'is_subproperty_of', 'id');
    }

    public function Properties()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'schema_property_id', 'id');
    }

    public function RelatedElements()
    {
        return $this->hasMany('App\Models\SchemaPropertyElement', 'related_schema_property_id', 'id');
    }

    public function History()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'schema_property_id', 'id');
    }

    public function ObjectHistory()
    {
        return $this->hasMany('App\Models\SchemaPropertyElementHistory', 'related_schema_property_id', 'id');
    }

}
