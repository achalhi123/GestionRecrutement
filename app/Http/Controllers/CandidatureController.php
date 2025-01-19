<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidature;
use App\Models\Cv;
use App\Models\LettreMotivation;
use App\Models\Offre;

class CandidatureController extends Controller
{
    public function create($offreId)
    {
        
        $offre = Offre::findOrFail($offreId);
        $cvs = auth()->user()->cvs; // Récupère les CVs du candidat connecté
        $lettres = auth()->user()->lettresMotivation; // Récupère les lettres de motivation du candidat
      //  dd( $lettres); //
        return view('candidatures.create', compact('offre', 'cvs', 'lettres'));
    }

    public function store(Request $request, $offreId)
    {
        $request->validate([
            'cv_id' => 'required|exists:cvs,id',
            'lettre_motivation_id' => 'required|exists:lettre_motivations,id',
        ]);

        Candidature::create([
            'user_id' => auth()->id(),
            'offre_id' => $offreId,
            'cv_id' => $request->cv_id,
            'lettre_motivation_id' => $request->lettre_motivation_id,
        ]);

        return redirect()->route('offres.index')->with('success', 'Votre candidature a été envoyée.');
    }

    public function mesCandidatures()
    {
        // Récupère les candidatures du candidat connecté
        $candidatures = auth()->user()->candidatures()->with('offre')->get();
        //dd(auth()->user());
    
        return view('candidatures.mesCandidatures', compact('candidatures'));
    }

    public function candidaturesPourMesOffres()
{
    // Récupérer les offres créées par le recruteur connecté
    $offres = auth()->user()->offres()->with('candidatures.user', 'candidatures.cv', 'candidatures.lettreMotivation')->get();

    return view('candidatures.offres', compact('offres'));
}
}
