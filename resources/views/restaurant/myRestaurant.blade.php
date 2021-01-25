@extends('layoutResto')

@section('content')

<h1>Mon Restaurant</h1>

<h2>{{ $restaurant->name }}</h2>
<p>ICI LOGO</p>
<p>{{ $restaurant->postal_address }}</p>
<p>{{ $restaurant->mail_address }}</p>

<h3>Mes plats</h3>

<p>LISTE DES PLATS</p>

@endsection