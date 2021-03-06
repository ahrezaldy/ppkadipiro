<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash_detail';

    public const RECEH = 0;
    public const TOTAL = -1;
}
