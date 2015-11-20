<?php namespace App\Entities;

/**
 * App\Entities\Lookup
 *
 * @property integer $id
 * @property integer $type_id This will be the lookup type and will reference the list of lookup types stored in this very same table
 * @property string $short_value
 * @property string $long_value
 * @property integer $display_order
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Lookup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Lookup whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Lookup whereShortValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Lookup whereLongValue($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Lookup whereDisplayOrder($value)
 */
class Lookup extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'reg_lookup';

    public $timestamps = false;

    protected $fillable = array('type_id', 'short_value', 'long_value', 'display_order');

}

