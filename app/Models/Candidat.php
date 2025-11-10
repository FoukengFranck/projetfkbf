<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = [
        'user_id',
        'telephone',
        'ville',
        'competences',
        'cv_path',
        'niveau_etude',
        'domaine_activite',
    ];

    protected $casts = [
        'competences' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
