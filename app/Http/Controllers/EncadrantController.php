<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\StructuresAffectation;
use Illuminate\Http\Request;

class EncadrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $encadrants =  Encadrant::orderBy('structuresAffectation_id')
            ->orderBy('function')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(10);
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->get();
        return view('superadmin.encadrants', compact('encadrants', 'structuresAffectations'));
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
        $encadrants =  Encadrant::orderBy('structuresAffectation_id')
            ->orderBy('function')
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(10);
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->get();
        return view('superadmin.encadrants', compact('encadrants', 'structuresAffectations', 'encadrant'));
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
