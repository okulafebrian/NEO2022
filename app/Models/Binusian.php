<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binusian extends Model
{
    use HasFactory;
    protected $table = 'binusians';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
       
}
