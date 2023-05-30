<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeachFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(SeachFormRequest $request)
    {
        $produits  = Product::query()->orderby('created_at','desc');
        
        if($name = $request->validated('name'))
        {
            $produits = $produits->where('name','like',"%{$name}%");
        }
       
        // dd($produits);
         
        return view('home',[
            'produits'=>$produits->paginate(16)
        ]);
    }
}
