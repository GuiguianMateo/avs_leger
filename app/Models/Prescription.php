<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    function consultation()
    {
        return $this->belongsTo( Consultation::class);
    }

    function medicament()
    {
        return $this->hasmany(Medicament::class);
    }
}
