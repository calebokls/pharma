@extends('admin.admin')
@section('title',$product->exists ? "Modification":"Nouveau Produit")
@section('content')
@yield('title','Ajout d\'un nouveau produit')

   <form method="post" action="{{route($product->exists ? 'admin.product.update': 
   'admin.product.store',['product' => $product])}}" enctype="multipart/form-data">
     @csrf
     @method($product->exists ? 'put': 'post')
        @include('shared.input',['type'=>'file' ,'class'=>'col','label'=>'Image du Produit','name'=>'image'])
        @include('shared.input',['class'=>'col','label'=>'nom du produit','name'=>'name','value'=>$product->name])
        @include('shared.input',['class'=>'col','type'=>'integer','label'=>'Prix du produit','name'=>'price', 'value'=>$product->price])</br>
    <div class="col-md-12">
      @include('shared.input',['type'=>'textarea','label'=>'Description','name'=>'description','value'=>$product->description])
    </div></br>
    <div>
      <button class="btn btn-primary form-control" type="submit">
        @if ($product->exists)
             Modifier
             @else
             Ajouter
        @endif
      </button>
    </div>
   </form> 
@endsection