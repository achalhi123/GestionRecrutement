<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LettreMotivation extends Model
{

    protected $fillable = [
        'user_id',
        'titre',
        'contenu', // Ajouter d'autres champs si nécessaire
    ];
    
    // ----------------------------------------------------------------
    // Relations
    // ----------------------------------------------------------------
    // une lettre de motivation est écrite par un candidat

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        // une lettre de motivation est écrite par un candidat
        // une lettre de motivation peut appartenir à plusieurs offres

    // ----------------------------------------------------------------

    public function offres()
    {
        return $this->belongsToMany(Offre::class, 'offre_lettre_motivation');
    }
    
}
