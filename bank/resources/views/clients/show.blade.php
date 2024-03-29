@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Client {{ $client->name }} {{ $client->surname }} data</h3>

                    <div class="card-body">
                        @if ($client->accounts()->count() > 0)
                            <div class="card-body">
                                <ul>
                                    <li> Has <b>{{ $client->accounts()->count() }}</b> active acounts.</li>
                                    <li> Total balance in <b>{{ $client->surname }}</b> accounts is
                                        <b>{{ number_format($client->accounts()->sum('balance'), 2,'.',',') }}€</b>.
                                    </li>
                                </ul>

                                <ul class="list-group list-group-flush">
                                    @foreach ($client->accounts as $account)
                                        <a class="list-group-item custom-account-list"
                                            href={{ route('accounts-show', $account) }}>{{ $account->accountNumber }} :
                                            <b>{{ number_format($account->balance, 2, '.', ',') }} € </b></a>
                                    @endforeach
                                </ul>
                              
                            </div>
                        @else
                            <div class="card-body">
                                <h4> Client doesn't have accounts.</h4>
                            </div>
                        @endif
                        </td>
                        <div class="d-flex">
                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1"><i
                            class="fa-solid fa-backward"></i> All clients</a>
                        <a href="{{ route('accounts-create', ['client_id'=>$client->id])}}" class="btn btn-primary m-1">Add new account</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', "Client's information")
