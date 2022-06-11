<?php
 
namespace App\Observers;

use App\Models\CashDetail;
 
class CashDetailObservers
{
    public function updated(CashDetail $model)
    {
        if ($model->nominal === CashDetail::TOTAL) {
            return;
        }

        $addCash = 0;
        if ($model->nominal === CashDetail::RECEH) {
            $addCash = $model->count;
        } else{
            $addCash = ($model->nominal * $model->count);
        }

        $dataTotal = CashDetail::where('nominal', CashDetail::TOTAL)->first();
        $dataTotal->count += $addCash;
        $dataTotal->save();
    }
}
