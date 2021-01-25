@extends('layout')

@section('content')

<h1>EAT NOW</h1>

<h3>Nos restaurants</h3>

<ul>
    @foreach($restaurant as $restaurants)
    <div class="card" style="width: 18rem;">
        <img src="https://cdn.pixabay.com/photo/2015/08/19/02/27/restaurant-895428_1280.png" class="card-img-top" alt="logo">
        <div class="card-body">
          <h5 class="card-title">{{ $restaurants->name }}</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $restaurants->postal_address }}</li>
            <li class="list-group-item">{{ $restaurants->postal_address }}</li>
          </ul>
          <a href="#" class="btn btn-primary">Voir les Plats</a>
        </div>
    </div>
    <br>
    @endforeach
</ul>
@endsection