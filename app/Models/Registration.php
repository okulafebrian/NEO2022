<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory;
    use SoftDeletes;
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
        return $this->hasMany(RegistrationDetail::class);
    }  
  
    public function participants()
    {
        return $this->hasManyThrough(Participant::class, RegistrationDetail::class, 'competition_id', 'registration_detail_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function representative()
    {
        return $this->hasOne(Representative::class);
    }
}
