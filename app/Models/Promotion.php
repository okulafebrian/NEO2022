<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function competitions()
    {
        return $this->belongsToMany(Competition::class);
    }
}
