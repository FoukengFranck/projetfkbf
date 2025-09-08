@extends('entreprise.layouts.app')

@section('title', 'Dashboard Entreprise')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Tableau de bord — Entreprise</h1>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-5 ml-5">
      <div class="rounded-lg bg-white p-4 shadow">Candidatures Réçus <div class="text-2xl font-bold">24</div></div>
      <div class="rounded-lg bg-white p-4 shadow">Entretiens Programmé <div class="text-2xl font-bold">5</div></div>
      <div class="rounded-lg bg-white p-4 shadow">Offres <div class="text-2xl font-bold">42</div></div>
      <div class="rounded-lg bg-white p-4 shadow">Dernieres Connexion <div class="text-2xl font-bold">Aujourd'hui</div></div>
  </div>
@endsection
