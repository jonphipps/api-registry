<?php namespace App\Entities;

/**
 * App\Entities\ArcTriple
 *
 * @property integer $t
 * @property integer $s
 * @property integer $p
 * @property integer $o
 * @property integer $o_lang_dt
 * @property string $o_comp
 * @property boolean $s_type
 * @property boolean $o_type
 * @property boolean $misc
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereT($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereS($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereP($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereO($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereOLangDt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereOComp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereSType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereOType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\ArcTriple whereMisc($value)
 */
class ArcTriple extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'arc_triple';

    public $primaryKey = 't';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = array('s', 'p', 'o', 'o_lang_dt', 'o_comp', 's_type', 'o_type', 'misc');

}

