<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationDetail extends Model
{
    use HasFactory;
    protected $table = 'registration_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function verifiedPayment()
    {
        return $this->belongsTo(Registration::class, 'registration_id')
                    ->whereHas('payment', function ($query) {
                        $query->where('is_verified', true);
                    });
    }

    public function debateTeam()
    {
        return $this->hasOne(DebateTeam::class);
    }

    public function rounds()
    {
        return $this->belongsToMany(Round::class, 'qualifications');
    }
}
