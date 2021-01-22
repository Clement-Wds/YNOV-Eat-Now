@extends('layout')

@section('content')

<h1>Connexion</h1>

<form action="/connexion" method="POST" class="row g-3">

    {{ csrf_field() }} 

    <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email de connexion">
        @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
    </div>

    <div class="col-md-6">
        <label for="inputPassword" class="form-label">Mot de Passe</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mot de Passe">
        @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Se Connecter</button>
    </div>

</form>

@endsection