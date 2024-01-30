@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Add money</h3>

                    <div class="card-body">
                        <form action="{{ route('clients-update', $client) }}" method="post">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$client->name}}">
                                <small class="form-text text-muted">Client Name</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control" value="{{$client->surname}}">
                                <small class="form-text text-muted">Client surname</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Personal Code</label>
                                <input type="text" name="surname" class="form-control" value="{{$client->accountNumber}}" readonly>
                                <small class="form-text text-muted">Read Only</small>
                            </div>
                            <button type="submit" class="btn btn-primary m-">Save</button>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                            @csrf 
                            @method('put')
                            {{-- jei sito neuzrasome forma siuncia i 419 --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Edit clients data')
