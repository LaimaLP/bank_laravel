@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Ar you sure?</h3>

                    <div class="card-body">
                        <form action="{{route('clients-destroy', $client)}}" method="post">
                            <p> Delete {{$client->name}} {{$client->surname}} account</p>
                            
                            <button type="submit" class="btn btn-danger m-1">Delete</button>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                            @csrf 
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Patvirtinti atleidima')
