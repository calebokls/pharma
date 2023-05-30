<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')| administration </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    <style>
      @layer reset{
        button{
          all:unset
        }
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Agence</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          @php
              $route = request()->route()->getName();
          @endphp

          <div class="collaps navbar" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{route('admin.product.index')}}" @class(['nav-link', 'active' =>str_contains($route,'product')])>Gerer les produits</a>
                </li>
               
            </ul>
            <div class="ms-auto">
                @auth
                    <ul class="navbar nav-link">
                      <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                          @csrf
                          @method('delete')
                          <button class="nav-link btn btn-danger">Se déconnecter</button>
                        </form>
                      </li>
                    </ul>
                @endauth
            </div>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
       @include('shared.flash')
        @yield('content')
    </div>
</body>
</html>