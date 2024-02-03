@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header">Transfer</h3>

                    <div class="card-body">
                        <form action="{{ route('accounts-transferUp') }}" method="post">
                            <div class="form-group mb-3">
                                <label>Transfer FROM</label>
                                <select class="form-select" name="account_id_from">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->client->name }}
                                            {{ $account->client->surname }} | {{ $account->accountNumber }} |
                                            {{ $account->balance }} € </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Transfer TO</label>
                                <select class="form-select" name="account_id_to">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">{{ $account->client->name }}
                                            {{ $account->client->surname }} | {{ $account->accountNumber }} |
                                            {{ $account->balance }} € </option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Add amount, €</label>
                            <input type="number" name="amount" class="form-control" placeholder="€">

                            <button type="submit" class="btn btn-primary">Transfer</button>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Transfer')
