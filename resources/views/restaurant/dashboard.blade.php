@extends('layoutResto')

@section('content')

<h1>Tableau de Bord</h1>

<h3>Mes Restaurants</h3>

<ul>
    @foreach ($restaurant as $restaurants)
        @if ($restaurants->user_id == $user->id)
            <li>
                <h4>{{ $restaurants->name }}</h4>
                <p>ICI LOGO</p>
                <p>Adresse : {{ $restaurants->postal_address }} </p>
                <p>Mail : {{ $restaurants->postal_address }} </p>
                <a class="btn btn-outline-primary" href="{{ route('manage.Restaurant', ['id' => $restaurants -> id]) }}" role="button">Gérer le Restaurant</a>
            </li>
            <br>
        @endif
    @endforeach
    
</ul>

@endsection