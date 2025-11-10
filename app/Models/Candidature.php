<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $fillable = [
        'candidat_id',
        'offre_id',
        'lettre_motivation',
        'cv_path',
        'statut',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relations
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
