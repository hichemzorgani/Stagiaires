<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'registration_id',
        'email',
        'function',
        'fibre_sh',
        'structuresAffectation_id'
    ];

    public function structureAffectation()
    {
        return $this->belongsTo(StructuresAffectation::class, 'structuresAffectation_id');
    }
}
