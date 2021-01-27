@extends('layout')

@section('content')

<h1>Mon Compte</h1>

<div class="card" style="width: 35rem;">
    <div class="card-body">
        <h5 class="card-title">Bonjour {{ $user->firstname }} {{ $user->lastname }}</h5>
        <p class="card-text">Voici votre magnifique profil !</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Pour vous contacter, juste au cas où ! Votre email : <b>{{ $user->email }}</b></li>
        <li class="list-group-item">Pour que vos commande ne soient pas perdues dans l'espace, voici votre adresse : <b>{{ $user->address }}</b></li>
        <li class="list-group-item">Pour pouvoir manger et vous régaler ! Votre solde : <b>{{ $user->balance }}€</b></li>
        <li class="list-group-item">Pour ne pas être un inconnu aux yeux des robots ! Votre statut sur la plateforme : <b>{{ $user->status }}</b></li>
    </ul>
    <div class="card-footer text-muted">
        Membre depuis {{ $user->created_at }}
      </div>
    <div class="card-body">
      <a href="{{ url('/edit_profile') }}" class="btn btn-primary">Modifier</a>
      <a href="{{ url('/change_password') }}" class="btn btn-secondary">Modifier mon mot de passe</a>
      <a href="#" class="btn btn-danger">Supprimer mon compte</a>
    </div>
  </div>

@endsection