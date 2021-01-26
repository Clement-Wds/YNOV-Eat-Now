@extends('layoutResto')

@section('content')

<h1>Mon Restaurant</h1>

<div class="container">
    <div class="row">
        <!-- Informations du restaurant -->
        <div class="col-sm-1 col-md-5">
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2015/08/19/02/27/restaurant-895428_1280.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $restaurant->name }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{ $restaurant->postal_address }}</li>
                  <li class="list-group-item">{{ $restaurant->mail_address }}</li>
                </ul>
                <div class="card-body">
                  <a href="{{ route('create.Dish', ['id' => $restaurant->id]) }}" class="btn btn-primary">Créer un plat</a>
                </div>
              </div>
        </div>
         <!-- Liste des plats -->
        <div class="col-sm-1 col-md-7">
            <h3>Mes plats</h3>
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2015/02/18/12/17/coffee-640647_1280.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">NOM DU PLATS</h5>
                  <p class="card-text">La description de votre délicieux plats</p>
                  <a href="#" class="btn btn-primary">Consulter ou Modifier</a>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection