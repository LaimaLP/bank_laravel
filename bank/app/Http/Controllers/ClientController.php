<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\PersonalNumberService;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $sorts = Client::getSorts();

        if ($request->query('sort', '')) {
            $sortBy = $request->query('sort', '');

            $_SESSION['clientSort'] =  $sortBy;
        } elseif (isset($_SESSION['clientSort'])) {
            $sortBy = $_SESSION['clientSort'];
        } else {
            $sortBy = "";
        }

        $perPageSelect = Client::getPerPageSelect();
        $perPage = (int)$request->query('per_page', 3);
        $s = $request->query('s', '');

        $clients = Client::query();


        switch ($sortBy) {
            case 'name_asc':
                $clients = $clients->orderBy('surname');
                break;
            case 'name_desc':
                $clients = $clients->orderByDesc('surname');
                break;
            case 'zero_balance':
                $clients = $clients->whereHas('accounts', function ($query) {
                    $query->where('balance', 0);
                });
                $zeroBalanceCount = $clients->count();
                break;
            case 'no_accounts':
                $clients = $clients->whereDoesntHave('accounts');
                $noAccountsCount = $clients->count();
                break;
            case 'new_client':
                $clients = $clients->orderByDesc('created_at');
                break;
            default:
                $clients = $clients->orderBy('surname');
                break;
        }



        if ($s) {
            $keywords = explode(' ', $s);
            if (count($keywords) > 1) {
                $clients = $clients->where(function ($query) use ($keywords) {
                    foreach (range(0, 1) as $index) {
                        $query->orWhere('name', 'like', '%' . $keywords[$index] . '%')
                            ->where('surname', 'like', '%' . $keywords[1 - $index] . '%');
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
                'noAccountsCount' => $noAccountsCount ?? "",
                'zeroBalanceCount' => $zeroBalanceCount ?? "",
            ]
        );
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $isPersonalNumberValid = (new PersonalNumberService($request->personalNumber))->validPersonalCode();

        if (!$isPersonalNumberValid) {
            return redirect()->back()->withInput()->withErrors(['personalNumber' => 'Personal number is invalid.']);
        } else if (Client::where('personalNumber', '=', $request->personalNumber)->exists()) {
            return redirect()->back()->withInput()->withErrors(['personalNumber' => 'Member with this personal code already exists.']);
        }

        Client::create($request->all());

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

    public function delete(Client $client)
    {

        return view(
            'clients.delete',
            [
                'client' => $client,
            ]
        );
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients-index')->with('info', 'Client deleted');
    }
}
