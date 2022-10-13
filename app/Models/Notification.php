<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];


    function user()
    {
        return $this->belongsTo(User::class);
    }
    function sujet()
    {
        return $this->belongsTo(Sujet::class);
    }
}
