@extends('layoutResto')

@section('content')

<h1>Votre Panier</h1>

<div class="card text-center">
    <div class="card-header">
        Commandes
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach($orders as $order)
                @if($order->user_id == $user->id)
                    <li class="list-group-item"> {{ $order->dish_name }} | {{ $order->dish_price }} € | <b>{{ $order->restaurant_name }}</b> </li>
                @endif
            @endforeach
            
        </ul>
        <a href="{{ url('/validate_order') }}" class="btn btn-primary">VALIDER LA COMMANDE</a>
    </div>
</div>

@endsection