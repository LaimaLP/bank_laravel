@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">   <h1> BANK statistics: </h1></div>
                    <div class="card-body">
                       <p>Pirmas puslapis. (patenkame po prisijungimo) Pirmajame puslapyje turi būti rodoma banko statistika: klientų skaičius, klientų sąskaitų skaičius, bendra laikoma suma, didžiausia suma vienoje sąskaitoje, vidutinė sąskaitų suma, sąskaitų su 0 likučių kiekis, sąskaitų su minusiniu likučiu kiekis. </p>
                        <p>
                            In Future bank are {{$accountsCount}} accounts. And {{$clientsCount}} clients.
                        </p>
                        <h4> The maximum balance is {{$accountWithMaxBalance->balance}} euros. {{$accountWithMaxBalance->id}} </h4>
                        <h4> Bank's total balance: {{$totalBalance}} euros</h4>
                        <h4> The average balance in accounts  is: {{$balanceAverage}}</h4>
                        <h4> In the FutureBank are {{$accountsWithZeroBalance}} accounts with zero balance</h4>
                        <h4>And {{$accountsWithNegativeBalanceCount}} accounts with negative balance.</h4>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>

  

@endsection
