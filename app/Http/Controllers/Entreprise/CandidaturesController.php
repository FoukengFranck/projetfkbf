<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidaturesController extends Controller
{
    public function index(Request $request)
    {
        $entreprise = Auth::user()->entreprise;

        $query = Candidature::with(['candidat.user', 'offre'])
            ->whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            });

        // Filtres
        if ($request->filled('statut') && $request->statut !== 'all') {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('offre_id')) {
            $query->where('offre_id', $request->offre_id);
        }

        $candidatures = $query->orderBy('created_at', 'desc')->paginate(10);

        // Statistiques
        $stats = [
            'total' => Candidature::whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            })->count(),
            'nouveau' => Candidature::whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            })->where('statut', 'nouveau')->count(),
            'en_cours' => Candidature::whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            })->where('statut', 'en-cours')->count(),
            'accepte' => Candidature::whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            })->where('statut', 'accepte')->count(),
        ];

        // Liste des offres pour le filtre
        $offres = Offre::where('entreprise_id', $entreprise->id)->get();

        if ($request->wantsJson()) {
            return response()->json([
                'candidatures' => $candidatures,
                'stats' => $stats,
                'offres' => $offres
            ]);
        }

        return view('entreprise.candidatures', compact('candidatures', 'stats', 'offres'));
    }

    public function updateStatut(Request $request, $id)
    {
        $validated = $request->validate([
            'statut' => 'required|in:nouveau,en-cours,accepte,refuse'
        ]);

        $entreprise = Auth::user()->entreprise;

        $candidature = Candidature::whereHas('offre', function ($q) use ($entreprise) {
            $q->where('entreprise_id', $entreprise->id);
        })->findOrFail($id);

        $candidature->update(['statut' => $validated['statut']]);

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès.'
        ]);
    }

    public function show($id)
    {
        $entreprise = Auth::user()->entreprise;

        $candidature = Candidature::with(['candidat.user', 'offre'])
            ->whereHas('offre', function ($q) use ($entreprise) {
                $q->where('entreprise_id', $entreprise->id);
            })
            ->findOrFail($id);

        return response()->json($candidature);
    }
}
