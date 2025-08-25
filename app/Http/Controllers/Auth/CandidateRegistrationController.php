<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class CandidateRegistrationController extends Controller
{
    public function create()
    {
        return view('auth.inscription-candidat');
    }

    public function store(Request $request)
    {
        // On reçoit les compétences sous forme d'un tableau 'competences[]'
        $validated = $request->validate([
            'name'       => ['required','string','max:255'],
            'email'      => ['required','string','email','max:255','unique:users,email'],
            'telephone'  => ['required','regex:/^\+237\d{9}$/'], // +237 suivi de 9 chiffres
            'ville'      => ['required','string','max:255'],

            'competences'    => ['required','array','min:1'],
            'competences.*'  => ['string','max:50'],

            'cv'         => ['nullable','file','mimes:pdf,doc,docx','max:4096'],

            'niveau_etude'    => ['required', Rule::in([
                'CEP','BEPC','Probatoire','Baccalauréat',
                'Licence','Master','Doctorat','Autre'
            ])],
            'domaine_activite' => ['required', Rule::in([
                'Informatique','Finance','Commerce','Logistique','Santé','Éducation','Ingénierie','Autre'
            ])],

            'password'   => ['required','confirmed', Password::defaults()],
        ], [
            'telephone.regex' => 'Le numéro doit commencer par +237 et contenir 9 chiffres après.',
            'competences.required' => 'Ajoutez au moins une compétence.',
        ]);

        DB::transaction(function () use ($validated, $request) {
            // 1) Création du user (rôle décidé par la page)
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => 'candidat',
            ]);

            // 2) Upload CV si présent
            $cvPath = null;
            if ($request->hasFile('cv')) {
                // nécessite "php artisan storage:link"
                $cvPath = $request->file('cv')->store('cvs', 'public');
            }

            // 3) Création du profil candidat
            Candidat::create([
                'user_id'         => $user->id,
                'telephone'       => $validated['telephone'],
                'ville'           => $validated['ville'],
                'competences'     => array_values($validated['competences']),
                'cv_path'         => $cvPath,
                'niveau_etude'    => $validated['niveau_etude'],
                'domaine_activite'=> $validated['domaine_activite'],
            ]);

            event(new Registered($user));
            Auth::login($user);
        });

        return redirect()->route('dashboard')->with('success','Inscription candidat réussie.');
    }
}
