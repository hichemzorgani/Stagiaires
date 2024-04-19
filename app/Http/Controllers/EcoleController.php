<?php

namespace App\Http\Controllers;

use App\Models\ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoles = ecole::paginate(5);
        return view('superadmin.ecoles', compact('ecoles'));
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


        $request->validate([
            'name' => 'required|regex:/^[\p{L}\'\s]+$/u|unique:ecoles,name',
        ]);

        //insertion
        ecole::create([
            'name' => $name,
        ]);

        return to_route('ecoles.index')->with('success', 'École ajoutée avec success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ecole $ecole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ecole $ecole)
    {
        $ecoles = (ecole::paginate(5));
        return view('superadmin.ecoles', compact('ecoles', 'ecole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ecole $ecole)
    {
        $validatedData = $request->validate([
            'name' => 'required|regex:/^[\p{L}\'\s]+$/u|unique:ecoles,name',
        ]);
        $ecole->fill($validatedData)->save();
        return to_route('ecoles.index')->with('success', 'Modification effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ecole $ecole)
    {
        $ecole->delete();
        return to_route('ecoles.index')->with('success', 'École supprimée avec success.');
    }
}
