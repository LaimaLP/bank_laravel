<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('client.index', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $accountNumber = "LT" . rand(10 ** 17, 10 ** 18 - 1);
        $clients = Client::all();
        $balance = 0;

        //cia yra kad accountss folderyje create blade rodo
        return view('accounts.create', [
            'clients' => $clients,
            'accountNumber' => $accountNumber,
            'balance' => $balance,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        
        // 'request' => 'balance' = 0;
        // $request->query('balance', 0);
        
        // dd($request);
        Account::create($request->all()); //imam visus duomenis, nevaliduotus
        //po to keliaujam i mechanic index'a.
        return redirect()->route('clients-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return view(
            'accounts.show',
            [
                'account' => $account,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Account $account)
    {
        $action = $request->input('action');

        return view('accounts.edit', [
            'account' => $account,
            'action' => $action,
        ]);
    }
    public function transfer()
    {

        $accounts = Account::all();
        $clients = Client::all();
        $action = "transfer";

        return view('accounts.transfer', [
            'accounts' => $accounts,
            'clients' => $clients,
            'action' => $action,
        ]);
    }


    public function transferUpdate(UpdateAccountRequest $request)
    {
        $accountIdFrom = (int)$request->input('account_id_from');
        $accountIdTo = (int)$request->input('account_id_to');
        $amount = (int)$request->input('amount');

        $accountFrom = Account::find($accountIdFrom);
        $accountTo = Account::find($accountIdTo);
        // dump($accountFrom);
        // dd($accountTo);

        $accountFrom->balance -= $amount;
        $accountTo->balance += $amount;

        $accountFrom->save();
        $accountTo->save();

        return redirect()->route('clients-index');
    }


    public function update(UpdateAccountRequest $request, Account $account)
    {
        $amount = (int)$request->input('amount');
        $action = $request->query('action');

        if ($action === "add") {
            $account->balance += $amount;
        } else if ($action === "withdraw") {
            $account->balance -= $amount;
        }

        $account->save();




        return redirect()->route('clients-index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function delete(Account $account)
    {
        return view(
            'accounts.delete',
            [
                'account' => $account,
            ]
        );
    }
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('clients-index');
    }
}
