<?php

namespace App\Http\Controllers\Candidat;

use Illuminate\Http\Request;
use App\Models\Offre;
use Illuminate\Support\Facades\Log;

class CandidatOffreController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        try {
            Log::info('CandidatOffre index called', ['params' => $request->all()]);

            $query = Offre::with('entreprise')
                ->published()
                ->latest('created_at');

            // Filtres (simplifiés, sans salaire pour test initial)
            if ($request->filled('departement')) {
                $query->where('departement', 'like', '%' . $request->departement . '%');
            }
            if ($request->filled('contract_type')) {
                $query->where('contract_type', $request->contract_type);
            }
            if ($request->filled('ville')) {
                $query->where('ville', 'like', '%' . $request->ville . '%');
            }
            // Salaire : version safe sans REGEXP (compatible MySQL <8)
            if ($request->filled('salary_min') && (int)$request->salary_min > 0) {
                $salaryMin = (int)$request->salary_min;
                $query->whereRaw(
                    'CAST(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(salary, " ", ""), "FCFA", ""), "/Mois", ""), "-", ""), ",", "") AS UNSIGNED) >= ?',
                    [$salaryMin]
                );
                Log::info('Salary filter applied', ['min' => $salaryMin]);
            }
            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%');
                });
            }

            // Tri (version safe pour salaire)
            $sort = $request->get('sort', 'date');
            switch ($sort) {
                case 'salary':
                    $query->orderByRaw(
                        'CAST(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(salary, " ", ""), "FCFA", ""), "/Mois", ""), "-", ""), ",", "") AS UNSIGNED) DESC'
                    );
                    break;
                case 'relevance':
                    $query->latest('created_at');
                    break;
                default:
                    $query->latest('created_at');
            }

            $offres = $query->paginate(6);

            Log::info('Offres fetched successfully', [
                'count' => $offres->count(),
                'total' => $offres->total(),
                'first_ids' => $offres->pluck('id')->toArray() // Debug: IDs des offres
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'offres' => $offres->items(),
                    'pagination' => [
                        'current_page' => $offres->currentPage(),
                        'last_page' => $offres->lastPage(),
                        'per_page' => $offres->perPage(),
                        'total' => $offres->total(),
                    ],
                    'stats' => [
                        'total_offres' => Offre::published()->count(),
                        'nouvelles_offres' => Offre::published()->where('created_at', '>', now()->subDays(7))->count(),
                        'entreprises' => Offre::published()->distinct('entreprise_id')->count('entreprise_id'),
                    ]
                ]);
            }

            return view('candidat.offres.index', compact('offres'));
        } catch (\Exception $e) {
            Log::error('Error in CandidatOffre index', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'params' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Erreur serveur: ' . $e->getMessage()], 500);
            }
            throw $e; // Pour afficher l'erreur en debug mode
        }
    }
}
