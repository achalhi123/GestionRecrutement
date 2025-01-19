<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    //
    protected $fillable = [
        'titre',
        'description',
        'user_id', // Ajoutez ici les autres champs nécessaires
    ];
    //----------------------------------------------------------------
    // Relations
    //----------------------------------------------------------------

    // une offre est publié par un recruitur
    public function recruteur()
    {
        return $this->belongsTo(User::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // une offre reçoit plusieurs cvs
    public function cvs()
    {
        return $this->belongsToMany(Cv::class, 'offre_cv');
    }
    // une offre reçoit plusieurs lettre de motivations 
    public function lettresMotivation()
    {
        return $this->belongsToMany(LettreMotivation::class, 'offre_lettre_motivation');
    }
        public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
    
}
