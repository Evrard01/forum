<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discution extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sujet()
    {
        return $this->belongsTo(Sujet::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Discution::class,'discution_id');
    }
    
    public function fils()
    {
        return $this->hasMany(Discution::class,'discution_id');
    }
}
