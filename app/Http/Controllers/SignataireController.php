<?php

namespace App\Http\Controllers;

use App\Models\Signataire;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;

class SignataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signataires = Signataire::orderBy('last_name')->orderBy('first_name')->paginate(10);
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.signataires', compact('signataires', 'structuresIAPs'));
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
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
            'function' => 'required|in:Directeur Gestion du Personnel,Directeur de l’école'
        ]);

        Signataire::create($validatedData);

        return redirect()->route('signataires.index')->with('success', 'Signataire ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Signataire $signataire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Signataire $signataire)
    {
        $signataires = Signataire::orderBy('last_name')->orderBy('first_name')->paginate(10);
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.signataires', compact('signataires', 'structuresIAPs', 'signataire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Signataire $signataire)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
            'function' => 'required|in:Directeur Gestion du Personnel,Directeur de l’école'
        ]);

        $signataire->fill($validatedData)->save();

        return redirect()->route('signataires.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Signataire $signataire)
    {
        $signataire->delete();
        return redirect()->route('signataires.index')->with('success', 'Signataire désactivé.');
    }
}
