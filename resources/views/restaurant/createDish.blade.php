@extends('layoutResto')

@section('content')

<h1>Créer un plat</h1>
<br>

<div class="card">
    <h5 class="card-header">Votre plat</h5>
    <div class="card-body">
      <form action="/new_dish" method="POST" class="row g-3">
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nom du plat">
        <input type="float" mae="price" class="form-control" id="exampleFormControlInput1" placeholder="prix (0.00)">
        <input class="form-control" type="file" id="formFile" name="photo">
        <button class="btn btn-primary" type="submit">Envoyer le plat</button>
      </form>
    </div>
  </div>

@endsection