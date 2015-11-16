<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
class AgentHasUser extends Model
{
    protected $table = 'reg_agent_has_user';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'is_registrar_for', 'is_admin_for');

    public function User()
    {
        return $this->belongsTo('App\Entities\User', 'user_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Entities\Agent', 'agent_id', 'id');
    }

}

