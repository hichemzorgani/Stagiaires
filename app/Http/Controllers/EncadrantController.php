<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\StructuresAffectation;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EncadrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structuresIAPs = StructuresIAP::all();
        $encadrants = Encadrant::join('structures_affectations', 'encadrants.structuresAffectation_id', '=', 'structures_affectations.id')
            ->join('structures_i_a_p_s', 'structures_affectations.structuresIAP_id', '=', 'structures_i_a_p_s.id')
            ->orderBy('structures_i_a_p_s.id')
            ->orderBy('structures_affectations.parent_id')
            ->orderBy('encadrants.structuresAffectation_id')
            ->orderBy('encadrants.function')
            ->orderBy('encadrants.last_name')
            ->orderBy('encadrants.first_name')
            ->select('encadrants.*')
            ->paginate(10);
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->get();
        return view('superadmin.encadrants', compact('encadrants', 'structuresAffectations', 'structuresIAPs'));
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
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'registration_id' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                'max:255',
            ],
            'fibre_sh' => 'required|unique:encadrants,fibre_sh',
            'function' => 'required',
            'email' => 'required|email|max:255',
            'structuresAffectation_id' => 'required|exists:structures_affectations,id',
        ]);

        Encadrant::create($validatedData);

        return to_route('encadrants.index')->with('success', 'Encadrant ajouté.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Encadrant $encadrant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Encadrant $encadrant)
    {
        $structuresIAPs = StructuresIAP::all();
        $encadrants = Encadrant::join('structures_affectations', 'encadrants.structuresAffectation_id', '=', 'structures_affectations.id')
            ->join('structures_i_a_p_s', 'structures_affectations.structuresIAP_id', '=', 'structures_i_a_p_s.id')
            ->orderBy('structures_i_a_p_s.id')
            ->orderBy('structures_affectations.parent_id')
            ->orderBy('encadrants.structuresAffectation_id')
            ->orderBy('encadrants.function')
            ->orderBy('encadrants.last_name')
            ->orderBy('encadrants.first_name')
            ->select('encadrants.*')
            ->paginate(10);
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->get();
        return view('superadmin.encadrants', compact('encadrants', 'structuresAffectations', 'encadrant', 'structuresIAPs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encadrant $encadrant)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'registration_id' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                'max:255',
            ],
            'fibre_sh' => 'required|unique:encadrants,fibre_sh,' . $encadrant->id,
            'function' => 'required',
            'email' => 'required|email|max:255',
            'structuresAffectation_id' => 'required|exists:structures_affectations,id',
        ]);
        $encadrant->fill($validatedData)->save();
        return to_route('encadrants.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encadrant $encadrant)
    {
        $encadrant->delete();
        return redirect()->route('encadrants.index')->with('success', 'Encadrant désactivé.');
    }
}
