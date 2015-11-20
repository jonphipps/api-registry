<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * App\Entities\AgentHasUser
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $user_id
 * @property integer $agent_id
 * @property boolean $is_registrar_for
 * @property boolean $is_admin_for
 * @property-read \App\Entities\User $User
 * @property-read \App\Entities\Agent $Agent
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereIsRegistrarFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\AgentHasUser whereIsAdminFor($value)
 */
class AgentHasUser extends Model implements Transformable
{
    protected $table = 'reg_agent_has_user';

    use SoftDeletes;
    use TransformableTrait;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'is_registrar_for', 'is_admin_for');

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "id" => "integer",
        "user_id" => "integer",
        "agent_id" => "integer",
        "is_registrar_for" => "boolean",
        "is_admin_for" => "boolean"
    ];

    public static $rules = [
        "updated_at" => "required|",
        "user_id" => "required|",
        "agent_id" => "required|"
    ];

    public function User()
    {
        return $this->belongsTo('App\Entities\User', 'user_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Entities\Agent', 'agent_id', 'id');
    }

}

