@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Ar you sure?</h3>

                    <div class="card-body">

                        @if ($client->accounts()->count() > 0)
                            <p> Client <b>{{ $client->name }} {{ $client->surname }}</b> has active accounts.


                            <ul class="list-group list-group-flush">
                                @foreach ($client->accounts as $account)
                                    <li class="list-group-item list-group-flush custom-account-list"><a
                                            href="{{ route('accounts-show', $account) }}"> Account number:
                                            {{ $account->accountNumber }} and balance: {{ $account->balance }} €</a></li>
                                @endforeach
                            </ul>

                        @endif

                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Go back</a>
                        @if ($client->accounts()->count() == 0 || !($client->accounts->where('balance', '!=', 0)->count() > 0))
                            <form action="{{ route('clients-destroy', $client) }}" method="post">
                                <button type="submit" class="btn btn-danger m-1">Delete</button>
                                @csrf
                                @method('delete')
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Confirm delete')
