@extends('base')
@section('title','Tous les biens')

@section('home')
@foreach ($produits as $product)
    @include('product.card');
@endforeach
  {{$produits->links()}}
@endsection