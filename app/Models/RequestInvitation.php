<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestInvitation extends Model
{
    use HasFactory;
    protected $table = 'request_invitations';
    protected $primaryKey = 'id';
    protected $timestamp = true;
    protected $guarded = [];
}
