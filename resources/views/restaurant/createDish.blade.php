@extends('layoutResto')

@section('content')

<h1>Créer un plat</h1>
<br>

<form action="{{ $restaurant->id }}/new_dish" method="POST" class="row g-3">
    {{ csrf_field() }}
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du plat</span>
        <input type="text" name="name" placeholder="Plat" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Prix</span>
        <input type="text" name="price" placeholder="0.00" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Photo du Plat</label>
        <input type="file" name="photo" class="form-control" id="inputGroupFile01">
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Créer le plat</button>
    </div>
</form>

@endsection