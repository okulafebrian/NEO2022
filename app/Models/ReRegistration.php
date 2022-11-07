<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReRegistration extends Model
{
    use HasFactory;
    protected $table = 're_registrations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
