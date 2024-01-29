@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Mechanikas {{$client->name}} {{$client->surname}}</h3>

                    <div class="card-body">
                       

                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">All clients</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', "Client's information")
