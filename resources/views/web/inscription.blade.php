@extends('layout')

@section('content')

<h1>Inscription</h1>

<form action="/inscription" method="POST" class="row g-3">

    {{ csrf_field() }} 
    <!-- Lastname -->
    <div class="col-md-6">
        <label for="inputLastname" class="form-label">Nom</label>
        <input type="text" name="lastname" class="form-control" id="inputLastname" placeholder="DUPONT">
        @if($errors->has('lastname'))
            <p>{{ $errors->first('lastname') }}</p>
        @endif
    </div>

    <!-- Firstname -->
    <div class="col-md-6">
        <label for="inputFirstname" class="form-label">Prénom</label>
        <input type="text" name="firstname" class="form-control" id="inputFirstname" placeholder="Jean">
        @if($errors->has('firstname'))
            <p>{{ $errors->first('firstname') }}</p>
        @endif
    </div>

    <!-- Email -->
    <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="exemple@mail.com">
        @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
    </div>

    <!-- Password -->
    <div class="col-md-6">
        <label for="inputPassword" class="form-label">Mot de Passe</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="8 caractères minimum">
        @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
    </div>

    <!-- Postal address -->
    <div class="col-12">
        <label for="inputAddress" class="form-label">Addresse Postale</label>
        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1, Rue de Rivoli 75001 PARIS">
        @if($errors->has('address'))
            <p>{{ $errors->first('address') }}</p>
        @endif
    </div>

    <!-- Status -->
    <div class="col-md-4">
        <label for="inputStatus" class="form-label">Statut</label>
        <select id="inputStatus" name="status" class="form-select">
            <option selected>Client</option>
            <option>Restaurant</option>
            <!-- Afficher un message expliquant que l'utiisateur sera ammené à créer un compte restaurant -->
        </select>
        @if($errors->has('status'))
            <p>{{ $errors->first('status') }}</p>
        @endif
    </div>

    <!-- Submit -->
    <div class="col-12">
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </div>

</form>

@endsection