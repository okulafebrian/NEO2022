<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'registration_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function deletedParticipants()
    {
        return $this->hasMany(Participant::class)->withTrashed();
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

    public function registration()
    {
        return $this->belongsto(Registration::class);
    }
}
