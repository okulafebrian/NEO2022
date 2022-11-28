<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $table = 'majors';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function binusian()
    {
        return $this->hasOne(Binusian::class);
    }
}
