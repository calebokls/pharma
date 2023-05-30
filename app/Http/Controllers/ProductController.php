<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $query = Product::orderby('created_at','desc');
        return view('home');
    }

    public function show(string $slug, Product $product)
    {
        $expendedSlug = $product->getSlug();
       if($slug != $expendedSlug)
       {
        return to_route('product.show',['product'=>$product, 'slug'=>$product->getSlug()]);
       }
       return view('product.show',[
        'product'=>$product
       ]);
    }
}
