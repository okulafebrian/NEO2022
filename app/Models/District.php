<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 

    public function participant()
    {
        return $this->hasOne(Participant::class);
    }
}
