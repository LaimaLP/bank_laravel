<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{

    public function index()
    {
        $accounts = Account::all();
        return view('client.index', [
            'accounts' => $accounts,
        ]);
    }


    public function create(Request $request)
    {
        // dd($request);
        $accountNumber = "LT" . rand(10 ** 17, 10 ** 18 - 1);
        $clients = Client::all();
        $balance = 0;
        $clientId = (int) $request->query('client_id', '');

        return view('accounts.create', [
            'clients' => $clients,
            'accountNumber' => $accountNumber,
            'balance' => $balance,
            'clientId' => $clientId,
        ]);
    }


    public function store(StoreAccountRequest $request)
    {


        Account::create($request->all());
        return redirect()->route('clients-index');
    }


    public function show(Account $account)
    {

        // dd($account->client->name);
        return view(
            'accounts.show',
            [
                'account' => $account,
            ]
        );
    }


    public function edit(Request $request, Account $account)
    {
        $action = $request->input('action');

        return view('accounts.edit', [
            'account' => $account,
            'action' => $action,
        ]);
    }
    public function transfer(UpdateAccountRequest $request)
    {

        $accounts = Account::all();
        $clients = Client::all();
        $action = "transfer";
        // dd($request);
        $account_id_from = (int) $request->query('account_id_from', '');
        $account_id_to = (int) $request->query('account_id_to', '');
        $confirmationNeeded = $request->query('confirmationNeeded', false);
        $amount = (int) $request->query('amount', '');

        return view('accounts.transfer', [
            'accounts' => $accounts,
            'clients' => $clients,
            'action' => $action,
            'account_id_from' => $account_id_from,
            'account_id_to' =>  $account_id_to,
            'confirmationNeeded' => $confirmationNeeded,
            'amount' => $amount,

        ]);
    }




    public function transferUpdate(UpdateAccountRequest $request)
    {
        // dd($request);

        $account_id_from = (int)$request->input('account_id_from');
        $account_id_to = (int)$request->input('account_id_to');
        $amount = (int)$request->input('amount');
        $accountFrom = Account::find($account_id_from);
        $accountTo = Account::find($account_id_to);
        $accountsData = ['account_id_from' => $account_id_from, 'account_id_to' => $account_id_to];

        if ($accountFrom->balance < 0) {
            return redirect()->route('accounts-transfer', $accountsData)->with('error', "Not enough balance. Balance already negative.");
        } elseif ($accountFrom->balance < $amount) {
            return redirect()->route('accounts-transfer',  $accountsData)->with('error', "Not enough balance. Max able transfer amount is $accountFrom->balance €.");
        } elseif ($amount < 0) {
            return redirect()->route('accounts-transfer',  $accountsData)->with('error', "Input must be positive integer.");
        }

        $accountFrom->balance -= $amount;
        $accountTo->balance += $amount;

        $accountFrom->save();
        $accountTo->save();

        return redirect()->route('clients-index')->with('ok', "{$amount}€ succesfully transferred from {$accountFrom->client->surname} to {$accountTo->client->surname}");
    }



    public function taxes()
    {

        $clients = Client::all();
    
    foreach ($clients as $client) {
        $accounts = $client->accounts()->get();
        
        if ($accounts->count() > 0) {
            $accountToTax = $accounts->random();
            
            $accountToTax->balance -= 5;
            $accountToTax->save();
        }
    }
        return redirect()->route('clients-index')->with('ok', "Taxes succesfully deducted from all clients.");
    }


    public function update(UpdateAccountRequest $request, Account $account)
    {
        $amount = (int)$request->input('amount');
        $action = $request->query('action');

        if ($action === "add") {
            $account->balance += $amount;
        } else if ($action === "withdraw") {


            if ($account->balance > 0 && $account->balance > $amount) {
                $account->balance -= $amount;
            } elseif ($account->balance < 0) {
                return redirect()->route('accounts-edit', ['account' => $account, 'action' => $action])->with('error', "Can't witdraw money from accounts with negative balance.");
            } elseif ($account->balance < $amount) {
                return redirect()->route('accounts-edit', ['account' => $account, 'action' => $action])->with('error', "Can't witdraw money. Max amount $account->balance .");
            }
        }



        $account->save();




        return redirect()->route('clients-index')->with('ok', "Operation completed successfully. Current {$account->client->name} balance {$account->balance}€.");
    }



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

        if ($account->balance > 0) {
            return redirect()->route('clients-delete')->with('ok', "Account can't be deleted. Balance {$account->balance}");
        }


        $account->delete();
        return redirect()->route('clients-index');
    }
}
