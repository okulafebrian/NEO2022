<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotDetail extends Model
{
    use HasFactory;
    protected $table = 'slot_details';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = []; 
}
