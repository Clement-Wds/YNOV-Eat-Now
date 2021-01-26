@extends('layout')

@section('content')

<h1>Enregistrer votre restaurant</h1>
<br>

<form action="/new_restaurant" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du Restaurant</span>
        <input type="text" name="name" placeholder="Restaurant" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Adresse Postale</span>
        <input type="text" name="postal_address" placeholder="1, Rue de Rivoli 75001 PARIS" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Adresse Mail</span>
        <input type="text" name="mail_address" placeholder="restaurant@mail.com" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Logo du Restaurant</label>
        <input type="file" name="logo" class="form-control" id="inputGroupFile01">
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enregistrer le restaurant</button>
    </div>
</form>

@endsection