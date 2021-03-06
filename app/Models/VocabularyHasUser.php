<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\VocabularyHasUser
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
 * @property-read \App\Models\User $User
 * @property-read \App\Models\Vocabulary $Vocabulary
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereVocabularyId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereIsMaintainerFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereIsRegistrarFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereIsAdminFor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereLanguages($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereDefaultLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\VocabularyHasUser whereCurrentLanguage($value)
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
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Vocabulary()
    {
        return $this->belongsTo('App\Models\Vocabulary', 'vocabulary_id', 'id');
    }

}

