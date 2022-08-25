<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slots';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 
}
