<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationDetail extends Model
{
    use HasFactory;
    protected $table = 'registration_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
