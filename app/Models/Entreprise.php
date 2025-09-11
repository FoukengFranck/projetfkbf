<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    protected $fillable = [
        'user_id',
        'nom_entreprise',
        'identifiant_unique',
        'secteur_activite',
        'adresse',
        'region',
        'ville',
        'quartier',
        'email_professionnel',
        'site_web',
        'nom_responsable',
        'fonction_responsable',
        'telephone_responsable',
        'email_responsable',
        'nombre_employes',
        'description',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offres() 
    {
        return $this->hasMany(Offre::class);
    }
}
