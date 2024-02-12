@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center p-3"><b> Money transfer</b> <i class="fa-solid fa-money-bill-transfer"
                            style="color: rgb(19, 92, 19); margin-left:15px"></i></h3>

                    <div class="card-body " style="font-size:20px; font-weight:bold">
                        <form action="{{ route('accounts-transferUp') }}" method="post" my-form>
                            <div class="form-group mb-3">
                                <label>Transfer FROM</label>
                                <select class="form-select" name="account_id_from"
                                    style="font-size:20px;color: rgb(21, 21, 142)">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}" style="font-size:20px;"
                                            @if (old('account_id_from', $account_id_from ? $account_id_from : 0) == $account->id) selected @endif>
                                            {{ $account->client->name }}
                                            {{ $account->client->surname }} |
                                            {{ $account->accountNumber }} |
                                            {{ $account->balance }} €
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Transfer TO</label>
                                <select class="form-select" name="account_id_to"
                                    style="font-size:20px;color: rgb(21, 59, 23)">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}" style="font-size:20px;"
                                            @if (old('account_id_to', $account_id_to ? $account_id_to : 0) == $account->id) selected @endif>
                                            {{ $account->client->name }}
                                            {{ $account->client->surname }} | {{ $account->accountNumber }} |
                                            {{ $account->balance }} € </option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Add amount, €</label>
                            <input type="number" name="amount" id="transfer-amount" style="font-size:20px;" class="form-control"
                                placeholder="€">

                            <button transfer-form-btn type="button" class="btn btn-primary mt-3 ">Transfer</button>
                            @csrf
                            @method('put')
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <div class="modal" id="transfer-modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Are you sure?</h5>
                                <button type="submit" class="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <p> Operation more than {{$amount}} euros need confirmation. </p>
                        </div>
                        <div class="modal-footer">
                 
                                <button type="submit" data-close class="btn btn-secondary">Ne</button>
                                <button type="submit" data-destroy class="btn btn-primary">Transfer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
@section('title', 'Transfer')
