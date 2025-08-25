<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class EntrepriseRegistrationController extends Controller
{
    public function create()
    {
        return view('auth.inscription-entreprise');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_entreprise'       => ['required','string','max:255'],
            'identifiant_unique'   => ['required','string','max:255','unique:entreprises,identifiant_unique'],
            'secteur_activite'     => ['required','string','max:255'], // peut valoir "Autre"
            'secteur_personnalise' => ['nullable','string','max:255','required_if:secteur_activite,Autre'],

            'adresse' => ['required','string','max:255'],
            'region'  => ['required','string','max:255'],
            'ville'   => ['required','string','max:255'],
            'quartier'=> ['nullable','string','max:255'],

            'email_professionnel' => ['required','email','max:255','unique:entreprises,email_professionnel','unique:users,email'],
            'site_web'            => ['nullable','url','max:255'],

            'nom_responsable'       => ['required','string','max:255'],
            'fonction_responsable'  => ['required','string','max:255'],
            'telephone_responsable' => ['required','string','max:20'],
            'email_responsable'     => ['required','email','max:255'],

            'nombre_employes'       => ['required','string','max:50'],
            'description'           => ['nullable','string'],

            'password' => ['required','confirmed', Password::defaults()],
        ], [
            'secteur_personnalise.required_if' => 'Veuillez préciser le secteur si vous choisissez "Autre".',
        ]);

        DB::transaction(function () use ($validated) {
            // Résoudre la valeur finale du secteur
            $secteur = $validated['secteur_activite'] === 'Autre'
                ? $validated['secteur_personnalise']
                : $validated['secteur_activite'];

            // 1) Créer l'utilisateur (login via email_professionnel)
            $user = User::create([
                'name'     => $validated['nom_entreprise'], // ou $validated['nom_responsable']
                'email'    => $validated['email_professionnel'],
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
                'role'     => 'entreprise',
            ]);

            // 2) Créer l'entreprise liée
            Entreprise::create([
                'user_id'              => $user->id,
                'nom_entreprise'       => $validated['nom_entreprise'],
                'identifiant_unique'   => $validated['identifiant_unique'],
                'secteur_activite'     => $secteur,
                'adresse'              => $validated['adresse'],
                'region'               => $validated['region'],
                'ville'                => $validated['ville'],
                'quartier'             => $validated['quartier'] ?? null,
                'email_professionnel'  => $validated['email_professionnel'],
                'site_web'             => $validated['site_web'] ?? null,
                'nom_responsable'      => $validated['nom_responsable'],
                'fonction_responsable' => $validated['fonction_responsable'],
                'telephone_responsable'=> $validated['telephone_responsable'],
                'email_responsable'    => $validated['email_responsable'],
                'nombre_employes'      => $validated['nombre_employes'],
                'description'          => $validated['description'] ?? null,
            ]);

            event(new Registered($user));
            Auth::login($user);
        });

        return redirect()->route('dashboard')->with('success','Compte entreprise créé.');
    }
}