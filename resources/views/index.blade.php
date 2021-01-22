@extends('layout')

@section('content')
<h1>Liste des emails utilisateurs</h1>
<br>
<ul>
    @foreach($user as $users)
    <li>
        <a href="mailto:{{ $users->user_email }}"> {{ $users->user_email }} </a>
    </li>
    @endforeach
</ul>
@endsection