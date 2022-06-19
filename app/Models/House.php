<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'house';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_iuran' => 'date:Y-m-d',
    ];
}
