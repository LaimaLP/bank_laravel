@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h3 class="card-header">Add account</h3>

                    <div class="card-body">
                        <form action="{{ route('accounts-store', ['balance'=> $balance]) }}" method="post">
                            

                            <div class="form-group mb-3">
                                <label>New Account Number</label>
                                <input type="text" name="accountNumber" class="form-control" value="{{$accountNumber}}" readonly>
                                <small class="form-text text-muted">ReadOnly</small>
                            </div>

                            <div class="form-group mb-3">
                                <label>Client</label>
                                <select class="form-select" name="client_id">
                                    <option selected value="0"><b>Choose Client</b></option>
                                    @foreach ($clients as $client)
                                    <option value="{{$client->id}}"
                                        @if (old('client_id', $clientId ? $clientId : 0) == $client->id) selected @endif>
                                        
                                        
                                        
                                        
                                        {{$client->name}} {{$client->surname}}</option>
                                    @endforeach
                                </select>
                                <small class="form-text text-muted">Choose client for account</small>
                            </div>





                            <button type="submit" class="btn btn-primary">Save</button>
                            @csrf 
                            {{-- jei sito neuzrasome forma siuncia i 419 --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Add new client')
