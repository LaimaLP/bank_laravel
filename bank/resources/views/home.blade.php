@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1> Future BANK statistics <i class="fa-solid fa-magnifying-glass-chart"> :</i></h1>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            {{-- <caption>List of users</caption> --}}
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Info</th>
                                    <th scope="col">Statistics</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>In <b>Future bank</b> are active accounts:</td>
                                    <td>{{ $accountsCount }} unit</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Clients count:</td>
                                    <td>{{ $clientsCount }} unit</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>The maximum balance in client's account: </td>
                                    <td>{{ number_format($accountWithMaxBalance->balance, 2, '.', ',') }} €</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Bank's total balance: </td>
                                    <td>{{ number_format($totalBalance, 2, '.', ',') }} €</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>The average balance in accounts is: </td>
                                    <td>{{ number_format($balanceAverage, 2, '.', ',') }} €</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Accounts with
                                        zero balance: </td>
                                    <td>{{ $accountsWithZeroBalance }} unit</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Accounts with negative
                                        balance: </td>
                                    <td>{{ $accountsWithNegativeBalanceCount }} unit</td>
                                </tr>
                            </tbody>
                        </table>

                        <div>
                            <h4>Top 3 clients </h4>
                            <p>
                                @foreach ($topThreeClient as $topClient)
                                    {{ $topClient->client->name }}  {{ $topClient->client->surname }}. Balance: {{ number_format($topClient->balance, 2, '.', ',')  }} €.  <br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Bank Statistics')
