<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CashDetail;

class CashDetailTableSeeder extends Seeder
{
    public function run()
    {
        $keys = [1000000, 100000, 50000, 20000, 10000, 5000, 2000, 1000, CashDetail::RECEH, CashDetail::TOTAL];

        foreach ($keys as $key) {
            CashDetail::create([
                'nominal' => $key,
                'count' => 0,
            ]);
        }
    }
}
