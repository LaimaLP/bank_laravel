<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
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
    public function create()
    {
        $accountNumber = "LT" . rand(10 ** 17, 10 ** 18 - 1);
        $clients = Client::all();
        $balance = 0;
//cia yra kad accountss folderyje create blade rodo
        return view('accounts.create', [
            'clients' => $clients,
            'accountNumber'=>$accountNumber,
            'balance' => 0,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
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
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        $clients = Client::all();

        return view('account.edit', [
            'account' =>$account,
            'clients' => $clients,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());

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