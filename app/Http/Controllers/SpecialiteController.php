<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Specialite;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structuresIAPs = StructuresIAP::all();
        $domaines = Domaine::orderBy('structuresIAP_id')->orderBy('name')->get();
        $specialites = Specialite::join('domaines', 'specialites.domaine_id', '=', 'domaines.id')
            ->orderBy('domaines.structuresIAP_id')
            ->orderBy('domaines.name')
            ->orderBy('specialites.name')
            ->select('specialites.*')
            ->paginate(10);
        return view('superadmin.specialites', compact('domaines', 'specialites', 'structuresIAPs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $domaine_id = $request->domaine_id;
        $request->validate([
            'name' => 'required|string',
            'domaine_id' => 'required|exists:domaines,id',
        ]);
        Specialite::create([
            'name' => $name,
            'domaine_id' => $domaine_id,
        ]);

        return to_route('specialites.index')->with('success', 'Spécialité ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialite $specialite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialite $specialite)
    {
        $structuresIAPs = StructuresIAP::all();
        $domaines = Domaine::orderBy('structuresIAP_id')->orderBy('name')->get();
        $specialites = Specialite::join('domaines', 'specialites.domaine_id', '=', 'domaines.id')
            ->orderBy('domaines.structuresIAP_id')
            ->orderBy('domaines.name')
            ->orderBy('specialites.name')
            ->select('specialites.*')
            ->paginate(10);
        return view('superadmin.specialites', compact('domaines', 'specialites', 'specialite', 'structuresIAPs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialite $specialite)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'domaine_id' => 'required|exists:domaines,id',
        ]);
        $specialite->fill($validatedData)->save();
        return to_route('specialites.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialite $specialite)
    {
        $specialite->delete();
        return to_route('specialites.index')->with('success', 'Spécialité désactivé');
    }
}
