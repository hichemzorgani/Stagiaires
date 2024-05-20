<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'domaine_id',
    ];

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}
