<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $sorts = Client::getSorts();
        $sortBy = $request->query('sort', '');
        $perPageSelect = Client::getPerPageSelect();
        $perPage = (int)$request->query('per_page', 3);
        $s = $request->query('s', '');

        $clients = Client::query();


        $clients = match ($sortBy) {
            'name_asc' => $clients->orderBy('surname'),
            'name_desc' => $clients->orderByDesc('surname'),
            default => $clients->orderBy('surname'),
        };

        if ($s) {
            $keywords = explode(' ', $s);
            if (count($keywords) > 1) {
                $clients = $clients->where(function ($query) use ($keywords) {
                    foreach (range(0, 1) as $index) {
                        $query->orWhere('name', 'like', '%'.$keywords[$index].'%')
                        ->where('surname', 'like', '%'.$keywords[1 - $index].'%');
                    }
                });
            } else {
                $clients = $clients
                    ->where('name', 'like', "%{$s}%")
                    ->orWhere('surname', 'like', "%{$s}%");
            }
        }

        if ($perPage > 0) {
            $clients = $clients->paginate($perPage)->withQueryString(); //pridedam kad sektu query, einant per puslapius zinotu pagal ka buvo sortinta, persikrovus psl
        } else {
            $clients = $clients->get();
        };

        return view(
            'clients.index',
            [
                'clients' => $clients,
                'sorts' => $sorts,
                'sortBy' => $sortBy,
                'perPageSelect' => $perPageSelect,
                'perPage' => $perPage,
            ]
        );
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        //sukuriam nauja modeli, mechanika
        Client::create($request->all()); //imam visus duomenis, nevaliduotus
        //po to keliaujam i mechanic index'a.
        return redirect()->route('clients-index')->with('ok', 'Client added');
    }


    public function show(Client $client)
    {

    
        return view(
            'clients.show',
            [
                'client' => $client,
            ]
        );
    }


    public function edit(Client $client)
    {
        return view(
            'clients.edit',
            [
                'client' => $client,
            ]
        );
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients-index')->with('info', 'Client data edited');
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

        return redirect()->route('clients-index')->with('info', 'Client deleted');
    }
}
