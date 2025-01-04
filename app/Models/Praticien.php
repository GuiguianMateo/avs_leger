<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praticien extends Model
{
    use HasFactory;

    function consultation()
    {
        return $this->hasMany(related: Consultation::class);
    }

    function type()
    {
        return $this->belongsTo(Type::class);
    }
}
