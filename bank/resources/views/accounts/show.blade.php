@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header"> {{ $account->client->name}} {{ $account->client->surname }} account</h3> 
                 
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Account Number</label>
                            <input type="text" name="surname" class="form-control"
                                value="{{ $account->accountNumber }}"readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label>Account Balance</label>
                            <input type="text" name="surname" class="form-control"
                                value="{{ $account->balance }} € "readonly>
                        </div>
                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1"> <i
                            class="fa-solid fa-backward"></i> All clients</a>
                        <a href="{{ route('accounts-edit', ['account' => $account, 'action' => 'add']) }}"
                            class="btn btn-success m-1">Add money</a>
                        <a href="{{ route('accounts-edit', ['account' => $account, 'action' => 'withdraw']) }}"
                            class="btn btn-primary m-1">Withdraw money</a>
                        <a href="{{ route('accounts-delete', $account) }}" class="btn btn-danger m-1"> <i
                            class="fa-solid fa-trash-can"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', "Client's information")
