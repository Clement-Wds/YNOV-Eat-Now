@extends('layoutResto')

@section('content')

<h1>Modifier mon Mot de Passe</h1>

<form action="/change_passwordRestorer" method="POST" class="row g-3">

    {{ csrf_field() }}

    <div class="col-md-6">
        <label for="inputPassword" class="form-label">Mot de Passe</label>
        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mot de Passe">
        @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
    </div>

    <div class="col-md-6">
        <label for="inputPassword" class="form-label">Confirmation du Mot de Passe</label>
        <input type="password" name="password_confirmation" class="form-control" id="inputPassword" placeholder="Confirmation du Mot de Passe">
        @if($errors->has('password_confirmation'))
            <p>{{ $errors->first('password_confirmation') }}</p>
        @endif
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Valider</button>
        <a href="{{ url('/profile') }}" class="btn btn-secondary">Annuler</a>
    </div>

</form>

@endsection