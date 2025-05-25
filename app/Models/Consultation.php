<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory, SoftDeletes;

    function type()
    {
        return $this->belongsTo(Type::class);
    }

    function user()
    {
        return $this->belongsTo( User::class);
    }

    function praticien()
    {
        return $this->belongsTo(Praticien::class);
    }

    function prescription()
    {
        return $this->hasMany( Prescription::class);
    }

}
