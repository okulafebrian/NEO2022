<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
