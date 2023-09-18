<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Provider\StoreRequest;
use App\Http\Requests\Provider\UpdateRequest;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index(){
        
        $providers = Provider::get();
        return view('admin.provider.index', compact('providers'));
    }
    
    public function create(){
        return view('admin.provider.create');
    }
    
    public function store(StoreRequest $request){

        Provider::create($request->all());
        return redirect()->route('providers.index');

    }
    
    public function show(){
    
        return view('admin.provider.index', compact('providers'));

    }

    public function edit(){
        
        return view('admin.provider.index', compact('providers'));

    }

    public function update(UpdateRequest $request, Provider $provider){

        $provider->update($request->all());
        return redirect()->route('providers.index');

    }

    public function destroy(Provider $provider){
        $provider->delete();
        return redirect()->route('providers.index');

    }
}
