@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header">Transfer</h3>

                    <div class="card-body">
                        <form action="{{ route('clients-store') }}" method="post">

                            <div class="form-group mb-3">
                                <label>Transfer FROM</label>
                                <select class="form-select" name="client_id">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                    <option value="{{--{{$client->id}}--}}">{{$account->client->name}} {{$account->client->surname}} | {{$account->accountNumber}} | {{$account->balance}} € </option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Choose client for account</small>
                            </div>






                            <div class="form-group mb-3">
                                <label>Transfer TO</label>
                                <select class="form-select" name="client_id">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($accounts as $account)
                                    <option value="{{--{{$client->id}}--}}">{{$account->client->name}} {{$account->client->surname}} | {{$account->accountNumber}} | {{$account->balance}} € </option>

                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Choose client for account</small>
                            </div>





                            <button type="submit" class="btn btn-primary">Transfer</button>
                            @csrf 
                            {{-- jei sito neuzrasome forma siuncia i 419 --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Transfer')
