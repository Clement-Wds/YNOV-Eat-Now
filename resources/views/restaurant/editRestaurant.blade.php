@extends('layoutResto')

@section('content')

<h1>Modifier votre Restaurant</h1>
<br>

<form action="{{ $restaurant->id }}/send" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du Restaurant</span>
        <input type="text" name="name" placeholder="{{ $restaurant->name }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($errors->has('name'))
        <p>{{ $errors->first('name') }}</p>
    @endif

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Adresse Postale</span>
        <input type="text" name="postal_address" placeholder="{{ $restaurant->postal_address }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($errors->has('postal_address'))
        <p>{{ $errors->first('postal_address') }}</p>
    @endif

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Adresse Mail</span>
        <input type="text" name="mail_address" placeholder="{{ $restaurant->mail_address }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($errors->has('mail_address'))
        <p>{{ $errors->first('mail_addres') }}</p>
    @endif

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Logo du Restaurant</label>
        <input type="file" name="logo" class="form-control" id="inputGroupFile01">
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enregistrer le restaurant</button>
    </div>
</form>

@endsection