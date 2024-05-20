<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Encadrant;
use App\Models\Etablissement;
use App\Models\Specialite;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\StructuresAffectation;
use App\Models\StructuresIAP;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function searchStages()
    {

        $userStructuresIAPId = Auth::user()->structuresIAP_id;

        $domaines = Domaine::where('structuresIAP_id', Auth::user()->structuresIAP_id)->get();
        $specialites = Specialite::join('domaines', 'specialites.domaine_id', '=', 'domaines.id')
            ->where('domaines.structuresIAP_id', Auth::user()->structuresIAP_id)
            ->orderBy('domaines.structuresIAP_id')
            ->orderBy('domaines.name')
            ->orderBy('specialites.name')
            ->select('specialites.*')
            ->get();
        $encadrants = Encadrant::whereHas('structureAffectation.structuresIAP', function ($query) {
            $query->where('id', Auth::user()->structuresIAP_id);
        })->get();
        $etablissements = Etablissement::orderBy('name')->get();
        $structuresAffectations = StructuresAffectation::where('structuresIAP_id', '=', Auth::user()->structuresIAP_id)->get();
        $themes = Stage::pluck('theme');

        return view('admin.search', compact('domaines', 'specialites', 'encadrants', 'etablissements', 'structuresAffectations', 'themes'));
    }

    public function searchResults1(Request $request)
    {
        $query = Stage::query();

        $searchParams = [
            'structuresAffectation_id',
            'encadrant_id',
            'stage_type',
            'etablissement_id',
            'level',
            'theme',
            'stagiare_count',
            'specialite_id',
        ];

        foreach ($searchParams as $param) {
            $query->when($request->filled($param), function ($query) use ($request, $param) {
                return $query->where($param, $request->input($param));
            });
        }

        if ($request->filled('domaine_id')) {
            $query->whereHas('specialite', function ($subQuery) use ($request) {
                $subQuery->where('domaine_id', $request->input('domaine_id'));
            });
        }

        $nbr_stages = $query->count();
        $stages = $query->paginate(5);
        $stages->appends($request->all());

        return view('admin.searchResults1', compact('stages', 'nbr_stages'));
    }

    public function searchResults2(Request $request)
    {
        $query = Stage::query();

        $searchParams = [
            'structuresAffectation_id',
            'encadrant_id',
            'stage_type',
            'etablissement_id',
            'level',
            'theme',
            'stagiare_count',
            'year',
            'specialite_id',
        ];

        foreach ($searchParams as $param) {
            $query->when($request->filled($param), function ($query) use ($request, $param) {
                return $query->where($param, $request->input($param));
            });
        }

        if ($request->filled('domaine_id')) {
            $query->whereHas('specialite', function ($subQuery) use ($request) {
                $subQuery->where('domaine_id', $request->input('domaine_id'));
            });
        }

        $nbr_stages = $query->count();
        $stages = $query->paginate(5);
        $stages->appends($request->all());


        return view('admin.searchResults2', compact('stages', 'nbr_stages'));
    }

    public function searchIAP(Request $request)
    {
        $query = StructuresIAP::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $structuresIAPs = $query->paginate(10);
        $structuresIAPs->appends($request->all());

        return view('superadmin.structuresIAP', compact('structuresIAPs'));
    }

    public function searchAffectation(Request $request)
    {
        $query = StructuresAffectation::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $directions = StructuresAffectation::where('type', 'Direction')
            ->orWhere('type', 'Sous-direction')
            ->orderBy('structuresIAP_id')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
        $structuresIAPs = StructuresIAP::all();
        $structuresAffectations = $query->paginate(10);
        $structuresAffectations->appends($request->all());

        return view('superadmin.structuresAffectation', compact('structuresAffectations', 'structuresIAPs', 'directions'));
    }

    public function searchEncadrant(Request $request)
    {
        $query = Encadrant::query();

        if ($request->filled('name')) {
            $query->where(function ($query) use ($request) {
                $name = $request->input('name');
                $query->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'like', '%' . $name . '%')
                    ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $name . '%');
            });
        }

        $encadrants = $query->paginate(10);
        $encadrants->appends($request->all());
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->get();

        return view('superadmin.encadrants', compact('encadrants', 'structuresAffectations'));
    }

    public function searchDomaine(Request $request)
    {
        $query = Domaine::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $domaines = $query->paginate(10);
        $domaines->appends($request->all());
        $structuresIAPs = StructuresIAP::all();

        return view('superadmin.domaines', compact('structuresIAPs', 'domaines'));
    }

    public function searchSpecialite(Request $request)
    {
        $query = Specialite::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $domaines = Domaine::orderBy('structuresIAP_id')->orderBy('name')->get();
        $specialites = $query->paginate(10);
        $specialites->appends($request->all());

        return view('superadmin.specialites', compact('domaines', 'specialites'));
    }

    public function searchComptes(Request $request)
    {
        $query = User::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $comptes = $query->paginate(10);
        $comptes->appends($request->all());
        $structuresIAPs = StructuresIAP::all();

        return view('superadmin.comptes', compact('comptes', 'structuresIAPs'));
    }

    public function searchEtablissement(Request $request)
    {
        $query = Etablissement::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        $etablissements = $query->paginate(10);
        $etablissements->appends($request->all());

        return view('superadmin.etablissements', compact('etablissements'));
    }

    public function searchResultsStagiares1(Request $request)
    {
        $query = Stagiaire::query();

        if ($request->filled('name')) {
            $query->where(function ($query) use ($request) {
                $name = $request->input('name');
                $query->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'like', '%' . $name . '%')
                    ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $name . '%');
            });
        }

        $stagiaires = $query->paginate(10);
        $stagiaires->appends($request->all());

        return view('admin.stagiaires', compact('stagiaires'));
    }

    public function searchResultsStagiares2(Request $request)
    {
        $query = Stagiaire::query();

        if ($request->filled('name')) {
            $query->where(function ($query) use ($request) {
                $name = $request->input('name');
                $query->where(DB::raw("CONCAT(last_name, ' ', first_name)"), 'like', '%' . $name . '%')
                    ->orWhere(DB::raw("CONCAT(first_name, ' ', last_name)"), 'like', '%' . $name . '%');
            });
        }

        $stagiaires = $query->paginate(2);
        $stagiaires->appends($request->all());

        return view('admin.attestation', compact('stagiaires'));
    }
}
