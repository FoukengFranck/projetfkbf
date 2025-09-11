<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();

        return match ($user->role) {
            'entreprise' => view('entreprise.dashboard'),
            'candidat'   => view('candidat.dashboard'),
            default      => view('dashboard'), // fallback si rôle null (ne devrait pas arriver)
        };
    }
}
