@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header text-center p-3">
                        @if ($action === 'add')
                            Add money
                        @elseif ($action === 'withdraw')
                            Withdraw money
                        @endif
                        <i class="fa-solid fa-money-bill-transfer" style="color: rgb(19, 92, 19); margin-left:15px"></i>
                    </h3>
                    <div class="card-body align-center">
                        <form action="{{ route('accounts-update', [$account, 'action' => $action]) }}" form-edit-money
                            method="post">
                            <h5 class="p-2"> Client name: <b>{{ $account->client->name }} {{ $account->client->surname }}
                                </b></h5>
                            <h5 class="p-2"> Account number: <b>{{ $account->accountNumber }}</b></h5>
                            <h5 class="p-2"> Account balance: <b>{{ $account->balance }} €</b></h5>
                            <div class="form-group mb-3">
                                <h5 class="p-2 pb-0">Amount € </h5>
                                <input type="number" name="amount" class="form-control" placeholder="€" id="edit-amount">
                            </div>
                            @if ($action === 'add')
                                <button type="button" edit-form-submit class="btn btn-primary m-">Add Money</button>
                            @elseif ($action === 'withdraw')
                                <button type="button" edit-form-submit class="btn btn-primary m-">Withdraw Money</button>
                            @endif
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('accounts.confirm')

    </div>

@endsection
@section('title', 'Edit clients data')
