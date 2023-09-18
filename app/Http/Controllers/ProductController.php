<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index(){
        
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    
    public function create(){
        $categories = Category::get();
        $providers = Provider::get();
        return view('admin.product.create',compact('categories','providers'));
    }
    
    public function store(StoreRequest $request){

        Product::create($request->all());
        return redirect()->route('products.index');

    }
    
    public function show(){
    
        return view('admin.product.index', compact('products'));

    }

    public function edit(){
        
        return view('admin.product.index', compact('products','categories','providers'));

    }

    public function update(UpdateRequest $request, Product $product){

        $product->update($request->all());
        return redirect()->route('products.index');

    }

    public function destroy(Product $product){
        $product->delete();
        return redirect()->route('products.index');

    }
}
