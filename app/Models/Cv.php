<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    // ----------------------------------------------------------------
    // Relations
    // -----------------------------------------------------------------
    //un cv apartient à un candidat
    protected $fillable = [
        'user_id',
        'titre',
        'experience',
        'education',
        'competences', // Ajoutez ici les autres champs nécessaires
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // un cv est envoyé à une ou plusieurs offres
    public function offres()
    {
        return $this->belongsToMany(Offre::class, 'offre_cv');
    }
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
    
}
