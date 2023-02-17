<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebateTeam extends Model
{
    use HasFactory;
    protected $table = 'debate_teams';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function registrationDetail()
    {
        return $this->belongsTo(RegistrationDetail::class)->whereHas('verifiedPayment');
    }
}
