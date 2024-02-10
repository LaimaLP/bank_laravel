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
                        <i class="fa-solid fa-money-bill-transfer" style="color: rgb(19, 92, 19); margin-left:15px"></i> </h3>

                    <div class="card-body">
                        <form action="{{ route('accounts-update', [$account, 'action' => $action]) }}" method="post">

                            <div class="form-group mb-3">
                                <label>Client:</label>
                                <input type="text" name="name" class="form-control custom-input"
                                    value="{{ $account->client->name }} {{ $account->client->surname }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label>Account Number:</label>
                                <input type="text" name="surname" class="form-control custom-input"
                                    value="{{ $account->accountNumber }}" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Account Balance:</label>
                                <input type="text" name="balance" class="form-control custom-input" value="{{ $account->balance }} €"
                                    readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label>Amount €</label>
                                <input type="number" name="amount" class="form-control" placeholder="€">
                            </div>


                            @if ($action === 'add')
                                <button type="submit" class="btn btn-primary m-">Add Money</button>
                            @elseif ($action === 'withdraw')
                                <button type="submit" class="btn btn-primary m-">Withdraw Money</button>
                            @endif








                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                            @csrf
                            @method('put')
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Edit clients data')
