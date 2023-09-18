<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\Client\StoreRequest;
use App\Http\Requests\Client\UpdateRequest;

class ClientController extends Controller
{
    public function index(){
        
        $clients = Client::get();
        return view('admin.client.index', compact('clients'));
    }
    
    public function create(){
        return view('admin.client.create');
    }
    
    public function store(StoreRequest $request){

        Client::create($request->all());
        return redirect()->route('clients.index');

    }
    
    public function show(){
    
        return view('admin.client.index', compact('clients'));

    }

    public function edit(){
        
        return view('admin.client.index', compact('clients'));

    }

    public function update(UpdateRequest $request, Client $client){

        $client->update($request->all());
        return redirect()->route('clients.index');

    }

    public function destroy(Client $client){
        $client->delete();
        return redirect()->route('clients.index');

    }
}
