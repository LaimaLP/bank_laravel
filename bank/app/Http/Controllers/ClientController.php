<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', [
            'clients' => $clients,
        ]);

    }

    public function filter()
    {
        return view('clients.index', [
            
            'clients' => Client::filter(request(['search']))->get()]);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        //sukuriam nauja modeli, mechanika
        Client::create($request->all()); //imam visus duomenis, nevaliduotus
        //po to keliaujam i mechanic index'a.
        return redirect()->route('clients-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view(
            'clients.show',
            [
                'client' => $client,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view(
            'clients.edit',
            [
                'client' => $client,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients-index');
    }

    public function delete(Client $client) //cia po kapotu susiranda ta id, skart grazina ta mechaniko modeli kuri reikia
    {

        return view(
            'clients.delete',
            [
                'client' => $client,
            ]
        );
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients-index');

    }
}
