<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'registration_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
