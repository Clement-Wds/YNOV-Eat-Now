@extends('layout')

@section('content')

<h1>Votre Panier</h1>

<div class="card text-center">
    <div class="card-header">
        Commandes
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach($orders as $order)
                @if($restaurant->id == $order->restaurant_id)
                    @if($dish->id == $order->dish_id)
                        <li class="list-group-item">{{ $dish->name }} | {{ $dish->price }} | {{ $order->delivery_time }} | <b>{{ $restaurant->name }}</b></li>
                    @endif
                @endif
            @endforeach
            
        </ul>
        <a href="#" class="btn btn-primary">VALIDER LA COMMANDE</a>
    </div>
  </div>

@endsection