<?php

namespace App\Exports;

use App\Models\Competition;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ParticipantsExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {   
        $competitions = Competition::all();
        $sheets = [];

        foreach ($competitions as $competition) {
            $sheets[] = new ParticipantPerCompetitionSheet($competition);
        }
        
        return $sheets;
    }
}
