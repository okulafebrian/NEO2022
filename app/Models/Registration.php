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

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function competitions()
    {
        return $this->belongsToMany(Competition::class, 'registration_details');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
