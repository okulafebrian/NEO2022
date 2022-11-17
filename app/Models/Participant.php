<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Authenticatable
{
    use HasFactory;
    protected $table = 'participants';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = ['participant'];

    public function registrationDetail()
    {
        return $this->belongsTo(RegistrationDetail::class);
    }

    public function binusian()
    {
        return $this->hasOne(Binusian::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
