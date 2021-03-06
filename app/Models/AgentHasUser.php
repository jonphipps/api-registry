<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\AgentHasUser
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $user_id
 * @property integer $agent_id
 * @property boolean $is_registrar_for
 * @property boolean $is_admin_for
 * @property-read \App\Models\User $User
 * @property-read \App\Models\Agent $Agent
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereAgentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereIsRegistrarFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AgentHasUser whereIsAdminFor($value)
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
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Agent()
    {
        return $this->belongsTo('App\Models\Agent', 'agent_id', 'id');
    }

}

