<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidaturesController extends Controller
{
    public function index(Request $request)
    {
        $candidat = Auth::user()->candidat;

        $query = Candidature::with(['offre.entreprise'])
            ->where('candidat_id', $candidat->id);

        // Filtre par statut
        if ($request->filled('statut') && $request->statut !== 'all') {
            $query->where('statut', $request->statut);
        }

        // Recherche
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('offre', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            })->orWhereHas('offre.entreprise', function ($q) use ($search) {
                $q->where('nom_entreprise', 'like', "%{$search}%");
            });
        }

        // Tri
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        switch ($sortField) {
            case 'company':
                $query->join('offres', 'candidatures.offre_id', '=', 'offres.id')
                    ->join('entreprises', 'offres.entreprise_id', '=', 'entreprises.id')
                    ->orderBy('entreprises.nom_entreprise', $sortDirection)
                    ->select('candidatures.*');
                break;
            case 'status':
                $query->orderBy('statut', $sortDirection);
                break;
            default:
                $query->orderBy('created_at', $sortDirection);
        }

        $candidatures = $query->paginate(10);

        // Statistiques
        $stats = [
            'total' => Candidature::where('candidat_id', $candidat->id)->count(),
            'nouveau' => Candidature::where('candidat_id', $candidat->id)->where('statut', 'nouveau')->count(),
            'en_cours' => Candidature::where('candidat_id', $candidat->id)->where('statut', 'en-cours')->count(),
            'accepte' => Candidature::where('candidat_id', $candidat->id)->where('statut', 'accepte')->count(),
            'refuse' => Candidature::where('candidat_id', $candidat->id)->where('statut', 'refuse')->count(),
        ];

        if ($request->wantsJson()) {
            return response()->json([
                'candidatures' => $candidatures,
                'stats' => $stats
            ]);
        }

        return view('candidat.candidatures', compact('candidatures', 'stats'));
    }

    public function show($id)
    {
        $candidat = Auth::user()->candidat;

        $candidature = Candidature::with(['offre.entreprise', 'candidat.user'])
            ->where('candidat_id', $candidat->id)
            ->findOrFail($id);

        return response()->json($candidature);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'offre_id' => 'required|exists:offres,id',
            'lettre_motivation' => 'nullable|string|max:10000',
            'cv_path' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
        ]);

        $candidat = Auth::user()->candidat;

        // Vérifier si déjà candidaté
        $existante = Candidature::where('candidat_id', $candidat->id)
            ->where('offre_id', $validated['offre_id'])
            ->first();

        if ($existante) {
            return response()->json([
                'success' => false,
                'message' => 'Vous avez déjà postulé à cette offre.'
            ], 422);
        }

        // Gérer le CV
        $cvPath = $candidat->cv_path;

        if ($request->hasFile('cv_path')) {
            $cvPath = $request->file('cv_path')->store('cvs', 'public');
        }

        $candidature = Candidature::create([
            'candidat_id' => $candidat->id,
            'offre_id' => $validated['offre_id'],
            'lettre_motivation' => $validated['lettre_motivation'] ?? null,
            'cv_path' => $cvPath,
            'statut' => 'nouveau',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Candidature envoyée avec succès!',
            'candidature' => $candidature
        ]);
    }

    public function destroy($id)
    {
        $candidat = Auth::user()->candidat;

        $candidature = Candidature::where('id', $id)
            ->where('candidat_id', $candidat->id)
            ->where('statut', '!=', 'accepte') // Ne pas pouvoir supprimer si accepté
            ->firstOrFail();

        $candidature->delete();

        return response()->json([
            'success' => true,
            'message' => 'Candidature retirée avec succès.'
        ]);
    }
}
