<?php

namespace App\Exports;

use App\Models\Competition;
use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParticipantPerCompetitionSheet implements FromQuery, WithTitle, WithHeadings
{
    private Competition $competition;

    public function __construct(Competition $competition)
    {
        $this->competition = $competition;
    }
    
    public function query()
    {   
        return Participant::whereHas('registrationDetail.verifiedPayment')
            ->whereRelation('registrationDetail', 'competition_id', $this->competition->id)
            ->leftJoin('binusians', 'binusians.participant_id', 'participants.id')
            ->select('name', 'gender', 'grade', 'province_id', 'district_id', 'address', 'email', 'phone_number', 'line_id', 'institution', 'nim', 'region');
    }

    public function title(): string
    {   
        return $this->competition->name != 'Speech' ? $this->competition->name : $this->competition->name . ' ' . $this->competition->category;
    }

    public function headings(): array {
        return [
            'NAME',
            'GENDER',
            'GRADE',
            'PROVINCE',
            'DISTRICT/CITY',
            'ADDRESS',
            'EMAIL',
            'PHONE NUMBER',
            'LINE ID',
            'INSTITUTION',
            'NIM',
            'REGION'
        ];
    }
}
