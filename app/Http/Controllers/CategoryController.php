<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index(){
        
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    
    public function create(){
        return view('admin.category.create');
    }
    
    public function store(StoreRequest $request){

        Category::create($request->all());
        return redirect()->route('categories.index');

    }
    
    public function show(){
    
        return view('admin.category.index', compact('categories'));

    }

    public function edit(){
        
        return view('admin.category.index', compact('categories'));

    }

    public function update(UpdateRequest $request, Category $category){

        $category->update($request->all());
        return redirect()->route('categories.index');

    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');

    }
}
