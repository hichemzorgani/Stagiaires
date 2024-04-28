<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\Etablissement;
use App\Models\Stage;
use App\Models\StructuresAffectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index()
    {
        $encadrants = Encadrant::whereHas('structureAffectation.structuresIAP', function ($query) {
            $query->where('id', Auth::user()->structuresIAP_id);
        })->get();
        $specialities = Stage::distinct()->pluck('speciality');
        $etablissements = Etablissement::orderBy('name')->get();
        $structuresAffectations = StructuresAffectation::where('structuresIAP_id', '=', Auth::user()->structuresIAP_id)->get();


        return view('admin.search', compact('specialities', 'encadrants', 'structuresAffectations', 'etablissements'));
    }

    public function search(Request $request)
    {
        $query = Stage::query();
        $encadrants = Encadrant::whereHas('structureAffectation.structuresIAP', function ($query) {
            $query->where('id', Auth::user()->structuresIAP_id);
        })->get();
        $specialities = Stage::distinct()->pluck('speciality');
        $etablissements = Etablissement::orderBy('name')->get();
        $structuresAffectations = StructuresAffectation::where('structuresIAP_id', '=', Auth::user()->structuresIAP_id)->get();

        if ($request->filled('theme')) {
            $query->where('theme', 'like', '%' . $request->input('theme') . '%');
        }

        if ($request->filled('stage_type')) {
            $query->where('stage_type', '=', $request->input('stage_type'));
        }

        if ($request->filled('level')) {
            $query->where('level', '=', $request->input('level'));
        }

        if ($request->filled('structuresAffectation_id')) {
            $query->where('structuresAffectation_id', $request->input('structuresAffectation_id'));
        }

        if ($request->filled('encadrant_id')) {
            $query->where('encadrant_id', $request->input('encadrant_id'));
        }

        if ($request->filled('etablissement_id')) {
            $query->where('etablissement_id', $request->input('etablissement_id'));
        }

        if ($request->filled('speciality')) {
            $query->where('speciality', '=', $request->input('speciality'));
        }

        if ($request->filled('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->filled('en_cours')) {
            if ($request->input('en_cours') == 'oui') {
                $query->where('end_date', '>', now());
            } elseif ($request->input('en_cours') == 'non') {
                $query->where('end_date', '<=', now());
            }
        }

        $result = $query->get();

        return view('admin.search', compact('specialities', 'encadrants', 'structuresAffectations', 'etablissements', 'result'));
    }
}
