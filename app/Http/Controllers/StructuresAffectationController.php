<?php

namespace App\Http\Controllers;

use App\Models\StructuresAffectation;
use App\Models\StructuresIAP;
use Illuminate\Http\Request;

class StructuresAffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->paginate(10);
        $directions = StructuresAffectation::where('type', 'Direction')
            ->orWhere('type', 'Sous-direction')
            ->orderBy('structuresIAP_id')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.structuresAffectation', compact('structuresAffectations', 'structuresIAPs', 'directions'));
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
        $type = $request->type;
        $parent_id = $request->parent_id;
        $quota_pfe = $request->quota_pfe;
        $quota_im = $request->quota_im;
        $structuresIAP_id = $request->structuresIAP_id;

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Direction,Sous-direction,Departement',
            'quota_pfe' => 'required|integer|sometimes|between:0,99',
            'quota_im' => 'required|integer|sometimes|between:0,99',
            'parent_id' => 'exists:structures_affectations,id',
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
        ]);

        StructuresAffectation::create([
            'name' => $name,
            'type' => $type,
            'parent_id' => $parent_id,
            'quota_pfe' => $quota_pfe,
            'quota_im' => $quota_im,
            'year' => date('Y'),
            'structuresIAP_id' => $structuresIAP_id,
        ]);

        return to_route('structuresAffectation.index')->with('success', 'Structures D\'Affectation ajoutée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(StructuresAffectation $structuresAffectation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StructuresAffectation $structuresAffectation)
    {

        $structuresAffectations = StructuresAffectation::orderBy('structuresIAP_id')->orderby('type')->orderBy('name')->paginate(10);
        $directions = StructuresAffectation::where('type', 'Direction')
            ->orWhere('type', 'Sous-direction')
            ->orderBy('structuresIAP_id')
            ->orderBy('type')
            ->orderBy('name')
            ->get();
        $structuresIAPs = StructuresIAP::all();
        return view('superadmin.structuresAffectation', compact('structuresAffectations', 'structuresIAPs', 'directions', 'structuresAffectation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StructuresAffectation $structuresAffectation)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:Direction,Sous-direction,Departement',
            'quota_pfe' => 'required|integer|sometimes|between:0,99',
            'quota_im' => 'required|integer|sometimes|between:0,99',
            'parent_id' => 'exists:structures_affectations,id',
            'structuresIAP_id' => 'required|exists:structures_i_a_p_s,id',
        ]);
        $validatedData['year'] = date('Y');
        if ($request->input('type') === 'Direction' || $request->input('type') === 'Sous-direction') {
            $validatedData['parent_id'] = null;
        }
        $structuresAffectation->fill($validatedData)->save();
        return to_route('structuresAffectation.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StructuresAffectation $structuresAffectation)
    {
        $structuresAffectation->delete();
        return to_route('structuresAffectation.index')->with('success', 'Structures D\'Affectation désactivée.');
    }
}
