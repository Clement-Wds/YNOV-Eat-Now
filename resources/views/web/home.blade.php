@extends('layout')

@section('content')

<h1>EAT NOW</h1>

<h3>Nos restaurants</h3>

<ul>
    @foreach($restaurant as $restaurants)
    <li>
        <h4>{{ $restaurants->name }}</h4>
        <p>ICI LOGO</p>
        <p>Adresse : {{ $restaurants->postal_address }} </p>
        <p>Mail : {{ $restaurants->postal_address }} </p>
    </li>
    @endforeach
</ul>
@endsection