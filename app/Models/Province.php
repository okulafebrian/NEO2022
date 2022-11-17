<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }
}
