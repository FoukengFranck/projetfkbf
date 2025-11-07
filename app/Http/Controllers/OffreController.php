<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $offres = Offre::where('entreprise_id', $user->entreprise->id)
            ->latest('created_at')
            ->get();

        if ($request->expectsJson()) {
            return response()->json($offres);
        }

        return view('entreprise.offres.index', compact('offres'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $offre = Offre::where('id', $id)
            ->where('entreprise_id', $user->entreprise->id)
            ->firstOrFail();

        return response()->json($offre);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'contract_type' => 'required|string',
            'description' => 'required|string',
            'departement' => 'nullable|string|max:255',
            'departement_custom' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'missions' => 'nullable|array',
            'skills' => 'nullable|array',
        ]);

        $departement = $request->departement_custom ?: $request->departement;

        $user = Auth::user();
        $offer = Offre::create([
            'entreprise_id' => $user->entreprise->id,
            'user_id' => $user->id,
            'title' => $request->title,
            'contract_type' => $request->contract_type,
            'duration' => $request->contract_type === 'Stage' ? $request->duration : null,
            'start_date' => $request->start_date,
            'salary' => $request->salary,
            'education_level' => $request->education_level,
            'departement' => $departement,
            'ville' => $request->ville,
            'description' => $request->description,
            'missions' => $request->missions,
            'skills' => $request->skills,
            'status' => 'published',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Offre publiée avec succès',
            'offer' => $offer->fresh(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'contract_type' => 'required|string',
            'description' => 'required|string',
            'departement' => 'nullable|string|max:255',
            'departement_custom' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'missions' => 'nullable|array',
            'skills' => 'nullable|array',
        ]);

        $departement = $request->departement_custom ?: $request->departement;

        $user = Auth::user();
        $offre = Offre::where('id', $id)
            ->where('entreprise_id', $user->entreprise->id)
            ->firstOrFail();

        $offre->update([
            'title' => $request->title,
            'contract_type' => $request->contract_type,
            'duration' => $request->contract_type === 'Stage' ? $request->duration : null,
            'start_date' => $request->start_date,
            'salary' => $request->salary,
            'education_level' => $request->education_level,
            'departement' => $departement,
            'ville' => $request->ville,
            'description' => $request->description,
            'missions' => $request->missions,
            'skills' => $request->skills,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Offre modifiée avec succès',
            'offer' => $offre->fresh(),
        ]);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $offre = Offre::where('id', $id)
            ->where('entreprise_id', $user->entreprise->id)
            ->firstOrFail();

        $offre->delete();

        return response()->json([
            'success' => true,
            'message' => 'Offre supprimée avec succès',
        ]);
    }
}
