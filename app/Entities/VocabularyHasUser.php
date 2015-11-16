<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Entities\VocabularyHasUser
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property integer $vocabulary_id
 * @property integer $user_id
 * @property boolean $is_maintainer_for
 * @property boolean $is_registrar_for
 * @property boolean $is_admin_for
 * @property string $languages
 * @property string $default_language
 * @property string $current_language
 * @property-read \App\Entities\User $User
 * @property-read \App\Entities\Vocabulary $Vocabulary
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereIsMaintainerFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereIsRegistrarFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereIsAdminFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereDefaultLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\VocabularyHasUser whereCurrentLanguage($value)
 */
class VocabularyHasUser extends Model
{
    protected $table = 'reg_vocabulary_has_user';

    use SoftDeletes;

    public function getDates()
    {
        return array('deleted_at');
    }

    protected $fillable = array('deleted_at', 'is_maintainer_for', 'is_registrar_for', 'is_admin_for', 'languages',
        'default_language', 'current_language');

    public function User()
    {
        return $this->belongsTo('App\Entities\User', 'user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Entities\Vocabulary', 'vocabulary_id', 'id');
    }

}

