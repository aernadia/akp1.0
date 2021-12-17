<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'country';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
