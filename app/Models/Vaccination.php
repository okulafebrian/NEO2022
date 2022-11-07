<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    protected $table = 'vaccinations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
