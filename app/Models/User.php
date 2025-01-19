<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
// vérifier si c'est une recruteur ou un candidat
    public function isRecruteur()
    {
        return $this->role === 'recruteur';
    }
    
    public function isCandidat()
    {
        return $this->role === 'candidat';
    }
    // ----------------------------------------------------------------
    // Relation entre les tables 
    // ----------------------------------------------------------------
    //un user à 1-n lettres de motivation (candidat)
    public function lettresMotivation()
    {
        return $this->hasMany(LettreMotivation::class);
    }
    //un user à 1-n cv (candidat)
    

    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }
        //un user à 1-n offres (candidat et receruteur) 

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }
    
}
