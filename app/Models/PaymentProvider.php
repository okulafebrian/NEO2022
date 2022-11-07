<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    use HasFactory;
    protected $table = 'payment_providers';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

}
