<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;

class StatistiquesController extends Controller
{
    public function statistiquesAdmin()
    {
        $stages = Stage::all();
        $stage_count = Stage::count();
        $count_pfe = Stage::where('stage_type', 'pfe')->count();
        $count_im = Stage::where('stage_type', 'immersion')->count();

        $pourcentage_pfe[] = ($count_pfe * 100) / $stage_count;
        $pourcentage_im[] = ($count_im * 100) / $stage_count;


        return view('admin.statistiques', compact('pourcentage_pfe', 'pourcentage_im', 'stages'));
    }
}
