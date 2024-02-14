@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Edit clients data</h3>

                    <div class="card-body">
                        <form action="{{ route('clients-update', $client) }}" method="post">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name', $client->name)}}">
                                <small class="form-text text-muted">Add new name</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control" value="{{old('surname', $client->surname)}}">
                                <small class="form-text text-muted">Add new surname</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Personal Code</label>
                                <input type="text" class="form-control" value="{{old('personalNumber', $client->personalNumber)}}" readonly>
                                <small class="form-text text-muted">Read Only</small>
                            </div>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                            <button type="submit" class="btn btn-success m-1">Save</button>
                            <a href="{{ route('accounts-create', ['client_id'=>$client->id])}}" class="btn btn-primary m-1">Add new account</a>
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
