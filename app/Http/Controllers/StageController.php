<?php

namespace App\Http\Controllers;

use App\Models\Encadrant;
use App\Models\Etablissement;
use App\Models\Stage;
use App\Models\Stagiaire;
use App\Models\StructuresAffectation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stages = Stage::orderBy('structuresAffectation_id')
            ->orderBy('encadrant_id')->orderBy('stage_type')->orderBy('start_date')->paginate(10);
        return view('admin.stages', compact('stages',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $encadrants = Encadrant::whereHas('structureAffectation.structuresIAP', function ($query) {
            $query->where('id', Auth::user()->structuresIAP_id);
        })->get();
        $etablissements = Etablissement::orderBy('name')->get();
        $structuresAffectations = StructuresAffectation::where('structuresIAP_id', '=', Auth::user()->structuresIAP_id)->get();
        return view('admin.create', compact('structuresAffectations', 'etablissements', 'encadrants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validatedDataStage = $request->validate([
                'stage_type' => 'required|in:pfe,immersion',
                'theme' => 'required|string',
                'domain' => 'required|string',
                'speciality' => 'required|string',
                'start_date' => 'required|date',
                'reception_day' => 'required|in:Dimanche,Lundi,Mardi,Mercredi,Jeudi,Vendredi,Samedi',
                'end_date' => 'required|date|after:start_date',
                'level' => 'required|in:Master,Licence,Doctorat',
                'stagiare_count' => 'required|in:Monome,Binome,Trinome',
                'encadrant_id' => 'required|exists:encadrants,id',
                'etablissement_id' => 'required|exists:etablissements,id',
                'structuresAffectation_id' => 'required|exists:structures_affectations,id',
            ]);
            $stage = Stage::create($validatedDataStage);

            $count = 0;
            switch ($request->input('stagiare_count')) {
                case 'Monome':
                    $count = 1;
                    break;
                case 'Binome':
                    $count = 2;
                    break;
                case 'Trinome':
                    $count = 3;
                    break;
            }
            for ($i = 1; $i <= $count; $i++) {
                $request->validate([
                    "last_name{$i}" => 'required|string',
                    "first_name{$i}" => 'required|string',
                    "date_of_birth{$i}" => 'required|date',
                    "place_of_birth{$i}" => 'required|string',
                    "adress{$i}" => 'required|string',
                    "email{$i}" => 'required|email',
                    "blood_group{$i}" => 'required|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
                ]);

                Stagiaire::create([
                    'last_name' => $request->input("last_name{$i}"),
                    'first_name' => $request->input("first_name{$i}"),
                    'date_of_birth' => $request->input("date_of_birth{$i}"),
                    'place_of_birth' => $request->input("place_of_birth{$i}"),
                    'adress' => $request->input("adress{$i}"),
                    'email' => $request->input("email{$i}"),
                    'blood_group' => $request->input("blood_group{$i}"),
                    'stage_id' => $stage->id,
                ]);
            }

            DB::commit();

            return redirect()->route('stages.index')->with('success', 'Stage ajouté.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('danger', 'Une erreur est survenue lors de l\'enregistrement du stage.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stage $stage)
    {
        //
    }

    public function quotaVerification(Request $request)
    {
        // Retrieve the data sent from the JavaScript function
        $stageType = $request->input('stage_type');
        $structuresAffectationId = $request->input('structuresAffectation_id');

        try {
            // Retrieve the structures affectation by its ID
            $structuresAffectation = StructuresAffectation::findOrFail($structuresAffectationId);

            // Count the stages associated with the structures affectation
            $count = $structuresAffectation->stages()
                ->where('stage_type', $stageType)
                ->where('year', $structuresAffectation->year) // Assuming `year` exists in `StructuresAffectation`
                ->count();

            // Determine the quota based on the stage type
            $quota = $stageType === 'pfe' ? $structuresAffectation->quota_pfe : $structuresAffectation->quota_im;

            // Return the count and quota in the response
            return response()->json([
                'count' => $count,
                'quota' => $quota,
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions (e.g., structure not found)
            return response()->json(['error' => 'An error occurred while processing the request.'], 500);
        }
    }
}
