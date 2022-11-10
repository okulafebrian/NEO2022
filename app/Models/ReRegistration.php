<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 're_registrations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
