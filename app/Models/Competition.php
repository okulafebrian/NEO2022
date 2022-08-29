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
        return $this->belongsToMany(Registration::class, 'registration_details');
    }
}
