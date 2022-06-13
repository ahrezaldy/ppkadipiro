<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HouseImport;

class HouseTableSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new HouseImport, storage_path('uniquecode-ppkadipiro.csv'));
    }
}
