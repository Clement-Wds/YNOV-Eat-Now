@extends('layoutResto')

@section('content')

<h1>Tableau de Bord</h1>

<h3>Mes Restaurants</h3>

<ul>
    @foreach ($restaurant as $restaurants)
        @if ($restaurants->user_id == $user->id)
            <div class="card text-center">
                <div class="card-header">
                    <p>LOGO</p>
                </div>
                <div class="card-body">
                <h5 class="card-title">{{ $restaurants->name }}</h5>
                <p class="card-text">{{ $restaurants->postal_address }}</p>
                <a href="{{ route('manage.Restaurant', ['id' => $restaurants -> id]) }}" class="btn btn-outline-primary" role="button">Gérer le restaurant</a>
                </div>
                <div class="card-footer text-muted">
                    <p>{{ $restaurants->mail_address }}</p>
                </div>
            </div>
            <br>
        @endif
    @endforeach
    
</ul>

@endsection