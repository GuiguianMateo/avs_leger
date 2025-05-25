<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Praticien extends Model
{
    use HasFactory, SoftDeletes;

    function consultation()
    {
        return $this->hasMany(related: Consultation::class);
    }

    function type()
    {
        return $this->belongsTo(Type::class);
    }
}
