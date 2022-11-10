<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;
    protected $table = 'qualifications';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function registrationDetail()
    {
        return $this->belongsTo(RegistrationDetail::class);
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function reRegistration()
    {
        return $this->hasOne(ReRegistration::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function submission()
    {
        return $this->hasOne(Submission::class);
    }
}
