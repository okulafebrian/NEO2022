<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;

class Competition extends Model
{
    use HasFactory;
    protected $guarded= ['ID'];

    public function participant(){
        return $this->hasMany(Participant::class);
    }
}
