<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'participants';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function registrationDetail()
    {
        return $this->belongsTo(RegistrationDetail::class);
    }
}
