<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\House;

class HouseImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new House([
            'code' => $row['code'],
            'number' => $row['number'],
            'owner_name' => $row['owner_name'],
        ]);
    }
}
