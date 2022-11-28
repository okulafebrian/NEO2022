<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;
    protected $table = 'companions';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];

    public function verifiedPayment()
    {
        return $this->belongsTo(Registration::class, 'registration_id')
            ->whereHas('payment', function ($query) {
                        $query->where('is_verified', true);
                    });
    }
}
