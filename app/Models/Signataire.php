<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signataire extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'function',
        'structuresIAP_id',
    ];

    public function structuresIAP()
    {
        return $this->belongsTo(StructuresIAP::class, 'structuresIAP_id');
    }
}
