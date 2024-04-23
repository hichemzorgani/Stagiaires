<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructuresAffectation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'quota_pfe',
        'quota_im',
        'parent_id',
        'structuresIAP_id'
    ];

    public function structuresIAP()
    {
        return $this->belongsTo(StructuresIAP::class, 'structuresIAP_id');
    }

    public function encadrants()
    {
        return $this->hasMany(Encadrant::class);
    }

    public function parent()
    {
        return $this->belongsTo(StructuresAffectation::class, 'parent_id');
    }
}
