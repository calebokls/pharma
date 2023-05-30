@extends('admin.admin')
@section('content')
   <div class="d-flex justify-content-between align-item-center">
    <h1> Tout vos produits </h1>
    <a href="{{route('admin.product.create')}}" class="btn btn-primary">Ajouter un produit</a>
   </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>{{$produit->name}}</td>
                    <td>{{number_format($produit->price,thousands_separator: ' ')}}</td>
                    <td>
                        <div class="d-flex gap-2 m-100 justify-content-end">
                            <a href="{{route('admin.product.edit',$produit)}}" class="btn btn-primary">Modifier</a>
                            <form action="{{route('admin.product.destroy',$produit)}}" method="post">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
        {{$produits->links()}}
    </table>
@endsection