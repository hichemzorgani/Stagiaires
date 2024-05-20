<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Exception;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class AttestationController extends Controller
{
    public function index()
    {
        $stagiaires = Stagiaire::orderBy('id')->paginate(20);
        return view('admin.attestation', compact('stagiaires'));
    }

    public function imprimer(Stagiaire $stagiaire)
    {
        try {
            $infostagiaire = Stagiaire::with('stage')->find($stagiaire->id);
            $fullName = $infostagiaire->last_name . '_' . str_replace(' ', '_', $infostagiaire->first_name);
            $pdf = PDF::loadView('partials.attestation', compact('infostagiaire'))->setPaper('a4', 'portrait');
            return $pdf->download('attestation_' . $fullName . '.pdf');
        } catch (Exception $e) {
            throw new Exception("erreur lors de telechargement");
        }
    }
}
