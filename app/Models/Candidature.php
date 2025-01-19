<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Candidature extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'offre_id', 'cv_id', 'lettre_motivation_id'];

    // Relation avec l'utilisateur (candidat)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec l'offre
    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }

    // Relation avec le CV
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }

    // Relation avec la lettre de motivation
    public function lettreMotivation()
    {
        return $this->belongsTo(LettreMotivation::class);
    }
}
