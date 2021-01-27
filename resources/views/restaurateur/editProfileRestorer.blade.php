@extends('layoutResto')

@section('content')

<h1>Modifier votre profil</h1>
<br>

<form action="/edit_profileRestorer" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Prénom</span>
        <input type="text" name="firstname" placeholder="{{ $user->firstname }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        @if($errors->has('firstname'))
            <p>{{ $errors->first('firstname') }}</p>
        @endif
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
        <input type="text" name="lastname" placeholder="{{ $user->lastname }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        @if($errors->has('lastname'))
            <p>{{ $errors->first('lastname') }}</p>
        @endif
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
        <input type="email" name="email" placeholder="{{ $user->email }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Addresse Postale</span>
        <input type="text" name="address" placeholder="{{ $user->address }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        @if($errors->has('address'))
            <p>{{ $errors->first('address') }}</p>
        @endif
    </div>
    
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Statut</span>
        <select id="inputStatus" name="status" class="form-select">
            <option selected>Restaurateur</option>
            <option>Client</option>
        </select>
        @if($errors->has('status'))
            <p>{{ $errors->first('status') }}</p>
        @endif
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enregistrer les Modifications</button>
        <a href="{{ url('/profile') }}" class="btn btn-secondary">Annuler</a>
    </div>
</form>

@endsection


