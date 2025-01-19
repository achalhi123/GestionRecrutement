<?php

namespace App\Http\Controllers;

use App\Models\LettreMotivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LettreMotivationController extends Controller
{
    // Liste des lettres
    public function index()
    {
        $lettres = LettreMotivation::with('user')->get(); // Charge les lettres avec leurs utilisateurs
        return view('lettres.index', compact('lettres'));
    }
    

    // Formulaire de création d'une lettre
    public function create()
    {
        return view('lettres.create');
    }

    // Enregistrer une lettre
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);

        LettreMotivation::create([
            'user_id' => Auth::id(),
            'titre' => $request->titre,
            'contenu' => $request->contenu,
        ]);

        return redirect()->route('lettres.index')->with('success', 'Lettre créée avec succès.');
    }

    // Formulaire d'édition d'une lettre
    public function edit($id)
    {
        $lettreMotivation = LettreMotivation::findOrFail($id);
        return view('lettres.edit', compact('lettreMotivation'));
    }
    
    public function update(Request $request, $id)
    {
        // Charger la lettre de motivation
        $lettreMotivation = LettreMotivation::findOrFail($id);
    
        // Valider les données
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
        ]);
    
        // Mettre à jour les données
        $lettreMotivation->update($request->all());
    
        return redirect()->route('lettres.index')->with('success', 'Lettre modifiée avec succès.');
    }
    
    
    public function show($id)
    {
        $lettreMotivation = LettreMotivation::with('user')->findOrFail($id); // Charge la lettre avec l'utilisateur associé
        return view('lettres.show', compact('lettreMotivation'));
    }
    
    // Suppression d'une lettre
    public function destroy($id)
    {
        $lettreMotivation = LettreMotivation::findOrFail($id); // Récupère la lettre via l'ID
        $lettreMotivation->delete(); // Supprime la lettre
    
        return redirect()->route('lettres.index')->with('success', 'Lettre de motivation supprimée avec succès.');
    }
    
}
