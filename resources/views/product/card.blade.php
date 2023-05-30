
<!-- product -->
<div class="product">
    <div class="product-img">
        @if ($product->image)
        <img style="width:100%;height:250px; objet-fit:cover" src="{{$product->imageUrl()}}" alt="{{$product->name}}">
        @endif
        
    </div>
    <div class="product-body">
        <h3 class="product-name"><a href="{{route('product.show',['slug'=>$product->getSlug(), 'product'=>$product])}}">{{$product->name}}</a></h3>
        {{-- <h4 class="product-price"> {{number_format($product->price, thousands_separator:' ')}} FCFA</h4> --}}
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <div class="product-btns">
            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i></button>
            <button class="add-to-compare"><i class="fa fa-exchange"></i></button>
            <button class="quick-view"> <a href="{{route('product.show',['slug'=>$product->getSlug(),'product'=>$product])}}"><i class="fa fa-eye"></i><span class="tooltipp">voir</span></button></a>
        </div>
    </div>
</div>
<!-- /product -->