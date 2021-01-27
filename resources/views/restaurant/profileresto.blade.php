@extends('layout')

@section('content')


<img src="{{ $restaurant->logo }}" class="rounded mx-auto d-block" height="100">
<h1>{{ $restaurant->name }}</h1>




<style>
.row{
    text-align: center;
    float:left;
    padding: 1rem;
  }
  .card{
    height: auto;
  }
  h5{
    height: 3rem;
  }
  h1{
      text-align: center;
  } 
</style>

@foreach($dish as $dishs)
    @if($dishs->restaurant_id == $restaurant->id)
        <div class="container">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img src="https://cdn.pixabay.com/photo/2015/02/18/12/17/coffee-640647_1280.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dishs->name }}</h5>
                        <p class="card-text">{{ $dishs->price }}€</p>
                        <a href="#" class="btn btn-primary">Commander</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach




@endsection