<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $table = 'competitions';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 

    public function registrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_details')->withPivot(['price']);
    }

    public function normalRegistrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_details')->wherePivot('type', 'NORMAL');
    }

    public function earlyRegistrations()
    {
        return $this->belongsToMany(Registration::class, 'registration_details')->wherePivot('type', 'EARLY');
    }

    public function registrationDetails()
    {
        return $this->hasMany(RegistrationDetail::class)->whereHas('verifiedPayment');
    }
    
     
    public function participants()
    {
        return $this->hasManyThrough(Participant::class, RegistrationDetail::class, 'competition_id', 'registration_detail_id')
                    ->whereHas('registrationDetail.verifiedPayment');
    }

    public function debateTeams()
    {
        return $this->hasManyThrough(DebateTeam::class, RegistrationDetail::class, 'competition_id', 'registration_detail_id')
                    ->whereHas('registrationDetail.verifiedPayment');
    }
}
