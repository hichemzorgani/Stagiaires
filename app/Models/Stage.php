<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'stage_type',
        'theme',
        'domain',
        'speciality',
        'start_date',
        'end_date',
        'level',
        'stagiare_count',
        'encadrant_id',
        'etablissement_id',
        'structuresAffectation_id',
    ];

    public function encadrant()
    {
        return $this->belongsTo(Encadrant::class);
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function structureAffectation()
    {
        return $this->belongsTo(StructuresAffectation::class, 'structuresAffectation_id');
    }
}
