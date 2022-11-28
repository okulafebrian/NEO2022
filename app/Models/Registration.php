<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $table = 'registrations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];
    protected $dates = ['payment_due'];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

     public function refund()
    {
        return $this->hasOne(Refund::class);
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'registration_details')->withPivot(['price']);
    }

    public function registrationDetails()
    {
        return $this->hasMany(RegistrationDetail::class)->withTrashed();
    }  
  
    public function participants()
    {
        return $this->hasManyThrough(Participant::class, RegistrationDetail::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companion()
    {
        return $this->hasOne(Companion::class);
    }
}
