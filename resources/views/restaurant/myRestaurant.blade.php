@extends('layoutResto')

@section('content')

<h1>Mon Restaurant</h1>

<div class="container">
  <div class="row">

    <!-- Informations du restaurant -->
    <div class="col-sm-1 col-md-5">

      <div class="card" style="width: 18rem;">

        <img src="{{ $restaurant->logo }}" class="card-img-top" alt="...">
          
        <div class="card-body">
          <h5 class="card-title">{{ $restaurant->name }}</h5>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ $restaurant->postal_address }}</li>
          <li class="list-group-item">{{ $restaurant->mail_address }}</li>
        </ul>

        <div class="card-body">
          <a href="{{ route('edit.Restaurant', ['id' => $restaurant->id]) }}" class="btn btn-primary">Modifier</a>
          <a href="{{ route('create.Dish', ['id' => $restaurant->id]) }}" class="btn btn-secondary">Créer un plat</a>
        </div>

      </div>
    </div>

    <!-- Liste des plats -->
    <div class="col-sm-1 col-md-7">
      <h3>Mes plats</h3>
      @foreach($dish as $dishs)
        @if($dishs->restaurant_id == $restaurant->id)

        <div class="card" style="width: 18rem;">

          <img src="{{ $dishs->photo }}" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ $dishs->name }}</h5>
            <p class="card-text">{{ $dishs->price }}€</p>
            <a href="{{ route('edit.Dish', ['id' => $dishs -> id]) }}" class="btn btn-primary">Modifier</a>
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Supprimer</button>
            <!-- Message de confirmation de suppression -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un plat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer définitivement le plat : {{ $dishs->name }}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                    <a href="{{ route('delete.Dish', ['id' => $dishs -> id]) }}" class="btn btn-danger">OUI SUPPRIMER</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>

        @endif
      @endforeach

    </div>

  </div>
  
</div>

@endsection