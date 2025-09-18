<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Cet email n’existe pas.']);
        }

        $otp = rand(100000, 999999);

        PasswordReset::updateOrCreate(
            ['email' => $request->email],
            [
                'otp_code' => $otp,
                'expires_at' => Carbon::now()->addMinutes(2),
                'used' => false
            ]
        );

        Mail::to($request->email)->send(new OtpMail($otp));

        return redirect()->route('password.verifyOtpForm', ['email' => $request->email])
            ->with('success', 'Un code a été envoyé à votre email.');
    }

    public function showOtpForm($email)
    {
        return view('auth.verify-otp', compact('email'));
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $record = PasswordReset::where('email', $request->email)
            ->where('otp_code', $request->otp)
            ->where('used', false)
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Code invalide.']);
        }

        if (Carbon::now()->gt($record->expires_at)) {
            return back()->withErrors(['otp' => 'Code expiré.']);
        }

        // Marquer comme utilisé
        $record->update(['used' => true]);

        // Stocker l'email vérifié en session (permet d'ouvrir la page reset sans param)
        session(['password_reset_verified_email' => $request->email]);

        // Rediriger **sans** passer le param pour utiliser la session côté showResetForm
        return redirect()->route('password.resetForm')
            ->with('success', 'Code validé, vous pouvez réinitialiser votre mot de passe.');
    }

    public function showResetForm($email = null)
    {
        // 1) priorité : param $email si fourni
        // 2) sinon utiliser la session (mise par verifyOtp)
        // 3) sinon fallback à request query (ex: ?email=...)
        $email = $email ?? session('password_reset_verified_email') ?? request()->query('email');

        if (! $email) {
         // Pas d'email -> on redirige vers la page "forgot" en expliquant
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Email requis pour réinitialiser le mot de passe.']);
        }

        // Vérifier que l'email correspond à un utilisateur existant
        $user = User::where('email', $email)->first();
        if (! $user) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // Passe toujours l'email à la vue
        return view('auth.reset-password', compact('email'));
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Mot de passe réinitialisé avec succès.');
    }
}

