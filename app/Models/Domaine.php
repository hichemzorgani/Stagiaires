<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'structuresIAP_id',
    ];

    public function structuresIAP()
    {
        return $this->belongsTo(StructuresIAP::class, 'structuresIAP_id');
    }
}
