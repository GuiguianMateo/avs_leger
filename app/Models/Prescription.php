<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    function consultation()
    {
        return $this->belongsTo( Consultation::class);
    }

    function medicament()
    {
        return $this->hasmany(Medicament::class);
    }
}
