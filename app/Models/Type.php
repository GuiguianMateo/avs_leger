<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    function consultation()
    {
        return $this->hasMany( Consultation::class);
    }

    function praticien()
    {
        return $this->hasmany(Medicament::class);
    }
}
