<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $domaines = Domaine::orderBy('structuresIAP_id')->orderBy('name')->paginate(10);
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.domaines', compact('structuresIAPs', 'domaines'));
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
        $structuresIAP_id = $request->structuresIAP_id;
        $request->validate([
            'name' => 'required|string',
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
        ]);
        Domaine::create([
            'name' => $name,
            'structuresIAP_id' => $structuresIAP_id,
        ]);

        return to_route('domaines.index')->with('success', 'Domaine ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Domaine $domaine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domaine $domaine)
    {
        $domaines = Domaine::orderBy('structuresIAP_id')->orderBy('name')->paginate(10);
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.domaines', compact('structuresIAPs', 'domaines', 'domaine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domaine $domaine)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
        ]);
        $domaine->fill($validatedData)->save();
        return to_route('domaines.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domaine $domaine)
    {
        $domaine->delete();
        return to_route('domaines.index')->with('success', 'Domaine désactivé');
    }
}
