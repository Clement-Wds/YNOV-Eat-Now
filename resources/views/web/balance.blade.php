@extends('layout')

@section('content')

<h1>Mon Solde</h1>
<br>

<div class="card" style="width: 30rem;">
    <div class="card-body">
        <h5 class="card-title">Bonjour {{ $user->firstname }} {{ $user->lastname }}</h5>
        <p class="card-text">Votre solde actuel est de : {{ $user->balance }}€</p>
        <p class="card-text">Vous pouvez réapprovisionner votre solde ci-dessous en toute sécurité !</p>
        <form class="row gy-2 gx-3 align-items-center">
            <div class="col-auto">
                <div class="input-group">
                    <div class="input-group-text">🔒</div>
                    <input type="text" class="form-control" id="autoSizingInputGroup" placeholder="Mot de Passe">
                </div>
            </div>
            <div class="col-auto">
                <select class="form-select" id="autoSizingSelect">
                    <option value="5" selected>5€</option>
                    <option value="10">10€</option>
                    <option value="25">25€</option>
                    <option value="50">50€</option>
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">PAYER</button>
            </div>
        </form>
    </div>
  </div>



@endsection