<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'user_id',
        'title',
        'contract_type',
        'duration',
        'start_date',
        'salary',
        'education_level',
        'departement',  // Nouveau
        'ville',        // Nouveau
        'description',
        'missions',
        'skills',
        'status',
    ];

    protected $casts = [
        'missions' => 'array',
        'skills' => 'array',
        'start_date' => 'date',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
