<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index',[
            'produits'=>Product::orderBy('created_at','desc')->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.product.form',[
            'product'=>new Product()
         ]);
    }

   

    /**
     * Display the specified resource.
     */
    public function store(ProductFormRequest $request)
    {
        $product = new Product();
        $product = Product::create($this->extractData($product,$request));
        return to_route('admin.product.index')->with('success','Produit ajouter avec succèss');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.form',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {
       
        $product->update($this->extractData($product,$request));
        return to_route('admin.product.index')->with('success','Produit modifier avec succèss');
    }

    private function extractData(Product $product , ProductFormRequest $request):array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if($image === null || $image->getError())
        {
             return $data;
        }
        if($product->image)
        {
            Storage::disk('public')->delete($product->image);
        }
        $data['image']= $image->store('product','public');
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.product.index')->with('success','Le produit a été supprimer avec success');
    }
}
