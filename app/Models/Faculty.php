<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $table = 'faculties';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function binusian()
    {
        return $this->hasOne(Binusian::class);
    }
}
