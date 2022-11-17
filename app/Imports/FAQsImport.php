<?php

namespace App\Imports;

use App\Models\FAQ;
use Maatwebsite\Excel\Concerns\ToModel;

class FAQsImport implements ToModel
{

    public function model(array $row)
    {
        return new FAQ([
            'category' => $row[1],
            'title' => $row[2], 
            'description' => $row[3], 
        ]);
    }
}
