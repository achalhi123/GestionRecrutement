<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    // Liste des offres
    public function index()
    {
        if(Auth::check()){
        if (auth()->user()->isRecruteur()) {
            // Récupérer uniquement les offres créées par le recruteur connecté
            $offres = auth()->user()->offres()->latest()->get();
        }
        else {
            // Récupérer toutes les offres
            $offres = Offre::with('user')->latest()->get();
        }
        return view('offres.index', compact('offres'));
    }
    else {
        $offres = Offre::get();
        return view('offres.index', compact('offres'));
    }
}
    // Formulaire de création d'une offre
    public function create()
    {
        return view('offres.create');
    }

    // Enregistrer une nouvelle offre
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Offre::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('offres.index')->with('success', 'Offre créée avec succès.');
    }

    // Détails d'une offre
    public function show($id)
    {
        $offre = Offre::with('user')->findOrFail($id); // Charge l'offre avec l'utilisateur associé
        return view('offres.show', compact('offre'));
    }
    

    // Formulaire d'édition
    public function edit($id)
    {
        $offre = Offre::findOrFail($id); // Récupère l'offre via l'ID
        return view('offres.edit', compact('offre')); // Passe l'offre à la vue
    }
    
    public function update(Request $request, $id)
    {
        $offre = Offre::findOrFail($id); // Récupère l'offre
    
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $offre->update($request->all()); // Met à jour les données
    
        return redirect()->route('offres.index')->with('success', 'Offre modifiée avec succès.');
    }
    

    // Suppression d'une offre
    public function destroy($id)
    {
        $offre = Offre::findOrFail($id); // Récupère l'offre via l'ID
        $offre->delete(); // Supprime l'offre
    
        return redirect()->route('offres.index')->with('success', 'Offre supprimée avec succès.');
    }
    
}
