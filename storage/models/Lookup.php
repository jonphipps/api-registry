<?php namespace App\Models;

/**
 * Eloquent class to describe the reg_lookup table
 *
 * automatically generated by ModelGenerator.php
 */
class Lookup extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'reg_lookup';

    public $timestamps = false;

    protected $fillable = array('type_id', 'short_value', 'long_value', 'display_order');

}

