@extends('layoutResto')

@section('content')

<h1>Modifier un plat</h1>
<br>

<form action="{{ $dish->id }}/send" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du plat</span>
        <input type="text" name="name" placeholder="{{ $dish->name }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($errors->has('name'))
        <p>{{ $errors->first('name') }}</p>
    @endif

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Prix</span>
        <input type="text" name="price" placeholder="{{ $dish->price }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>
    @if($errors->has('price'))
        <p>{{ $errors->first('price') }}</p>
    @endif

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Photo du Plat</label>
        <input type="file" name="photo" class="form-control" id="inputGroupFile01">
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Modifier le plat</button>
    </div>
</form>

@endsection