<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;

class SubadminController extends Controller
{

    public function domaines()
    {
        $domaines = Domaine::paginate(10);
        $structuresIAPs = StructuresIAP::all();
        return view('subadmin.domaines', compact('domaines', 'structuresIAPs'));
    }
}
