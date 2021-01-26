@extends('layoutResto')

@section('content')

<h1>{{ $restaurant->name }}</h1>

<ul>
    @foreach($dish as $dishs)
        @if($dishs->restaurant_id == $restaurant->id)
            <div class="card" style="width: 18rem;">
                <img src="https://cdn.pixabay.com/photo/2015/02/18/12/17/coffee-640647_1280.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $dishs->name }}</h5>
                    <p class="card-text">{{ $dishs->price }}€</p>
                    <a href="#" class="btn btn-primary">Commander</a>
                </div>
            </div>
        @endif
    @endforeach
</ul>

@endsection