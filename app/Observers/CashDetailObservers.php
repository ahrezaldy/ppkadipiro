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

        $redactCash = ($model->nominal * $model->getOriginal('count'));
        $addCash = ($model->nominal * $model->count);
        if ($model->nominal === CashDetail::RECEH) {
            $redactCash = $model->getOriginal('count');
            $addCash = $model->count;
        }

        $dataTotal = CashDetail::where('nominal', CashDetail::TOTAL)->first();
        $dataTotal->count += ($addCash - $redactCash);
        $dataTotal->save();
    }
}
