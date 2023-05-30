@extends('auth.auth')

@section('title','Se Connecter')

@section('content')
    <h1>@yield('title')</h1>

    <form action="{{route('login')}}" method="post">
        @csrf
        @include('shared.input',['class'=>'col','label'=>'Adresse mail','name'=>'email','type'=>'email'])<br/>
        @include('shared.input',['class'=>'col','label'=>'Mot de Passe','name'=>'password','type'=>'password'])</br>
        <div>
          <button class="btn btn-primary">
             Se Connecter
          </button>
        </div>
    </form>
@endsection