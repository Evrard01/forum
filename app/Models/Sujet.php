<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function discutions()
    {
        return $this->hasMany(Discution::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
