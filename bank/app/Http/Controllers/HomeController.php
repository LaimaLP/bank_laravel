<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Account;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $accountsCount = Account::count();
        $clientsCount = Client::count();
        $totalBalance = Account::sum('balance');
        $balanceAverage = Account::avg('balance');

        $accountWithMaxBalance = Account::select('id', 'balance')->orderBy('balance', 'desc' )->first();

        $accountsWithZeroBalance = Account::where('balance', 0)->count();
        $accountsWithNegativeBalanceCount = Account::where('balance', '<', 0)->count();

        return view('home', [
            'accountsCount' => $accountsCount,
            'clientsCount' => $clientsCount,
            'accountWithMaxBalance' => $accountWithMaxBalance,
            'totalBalance'=>$totalBalance,
            'balanceAverage'=>$balanceAverage,
            'accountsWithZeroBalance'=> $accountsWithZeroBalance,
            'accountsWithNegativeBalanceCount'=> $accountsWithNegativeBalanceCount,
        ]);

        
      
    }
}
