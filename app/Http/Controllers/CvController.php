<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    // Liste des CVs
    public function index()
    {

        $cvs = Cv::where('user_id', Auth::id())->get();
        if(auth()->user()->role==="recruteur"){
            return redirect()->route('home');
        }  
        return view('cvs.index', ['cvs' => $cvs]);
    }

    // Formulaire de création d'un CV
    public function create()
    {
        return view('cvs.create');
    }

    // Enregistrer un CV
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'experience' => 'required|string',
            'education' => 'required|string',
            'competences' => 'required|string',
        ]);

        Cv::create([
            'user_id' => Auth::id(),
            'titre' => $request->titre,
            'experience' => $request->experience,
            'education' => $request->education,
            'competences' => $request->competences,
        ]);

        return redirect()->route('cvs.index')->with('success', 'CV créé avec succès.');
    }

    public function edit($id)
    {
        $cv = Cv::findOrFail($id); // Récupère le CV via l'ID
        return view('cvs.edit', compact('cv')); // Passe le CV à la vue
    }
    
    public function update(Request $request, $id)
    {
        $cv = Cv::with('user')->findOrFail($id); // Récupère le CV
    
        $request->validate([
            'titre' => 'required|string|max:255',
            'experience' => 'required|string',
            'education' => 'required|string',
            'competences' => 'required|string',
        ]);
    
        $cv->update($request->all()); // Met à jour les données
    
        return redirect()->route('cvs.index')->with('success', 'CV modifié avec succès.');
    }
    
    

    // Détails d'un CV
    public function show($id)
{
    $cv = Cv::findOrFail($id); // Récupère le CV via l'ID
    return view('cvs.show', compact('cv')); // Passe le CV à la vue
}

    

    // Suppression d'un CV
    public function destroy($id)
    {
        $cv = Cv::findOrFail($id); // Récupère le CV via l'ID
        $cv->delete(); // Supprime le CV
    
        return redirect()->route('cvs.index')->with('success', 'CV supprimé avec succès.');
    }
    
    public function somme($a,$b)
    {
        $c=$a+$b;
        return view('somme', ['abdeljalil' => $c]);
    }
}
