@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <h3 class="card-header">Add new client</h3>

                    <div class="card-body">
                        <form action="{{ route('clients-store') }}" method="post">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <small class="form-text text-muted">Add client name</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control">
                                <small class="form-text text-muted">Add client surname</small>
                            </div>
                            <div class="form-group mb-3">
                                <label>Personal Number</label>
                                <input type="text" name="personalNumber" class="form-control">
                                <small class="form-text text-muted">Add client personal number</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Add new client</button>
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