<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('created_at', 'desc')->get();
    
        return view('client.index', compact('clients'));
    }
    
    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        Client::create($request->all());
        return to_route('client.index');
    }

    public function edit(Client $client)
    {
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return to_route('client.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return to_route('client.index');
    }
}