<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    function consultation()
    {
        return $this->hasMany( Consultation::class);
    }

    function praticien()
    {
        return $this->hasmany(Medicament::class);
    }
}
