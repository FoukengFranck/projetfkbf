<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use Illuminate\Support\Facades\Auth;

class OffreController extends Controller
{
    public function store(Request $request)
    {
   

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
            'description' => $request->description, // ⚠️ nécessite un package pour purifier HTML
            'missions' => $request->missions,
            'skills' => $request->skills,
            'status' => 'published',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Offre publiée avec succès',
            'offer' => $offer,
        ]);

    }
}