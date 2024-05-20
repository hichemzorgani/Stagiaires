<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = Stagiaire::orderBy('last_name')->orderBy('first_name')->paginate(20);

        return view('admin.stagiaires', compact('stagiaires'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stagiaire $stagiaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stagiaire $stagiaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stagiaire $stagiaire)
    {
        //
    }

    public function indexSecurity()
    {
        $stagiaires = Stagiaire::orderBy('id')->paginate(10);
        return view('security.index', compact('stagiaires'));
    }
    public function searchSecurity(Request $request)
    {
        $query = Stagiaire::query();

        if ($request->has('name')) {
            $query->where('last_name', 'like', '%' . $request->input('name') . '%');
        }

        $stagiaires = $query->get();

        return view('security.index', compact('stagiaires'));
    }
}
