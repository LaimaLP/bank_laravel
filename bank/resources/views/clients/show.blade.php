@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Client {{$client->name}} {{$client->surname}}</h3>

                    <div class="card-body">
                        @if ($client->accounts()->count() > 0)
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($client->accounts as $account)

                                <a class="list-group-item" href={{ route('accounts-show', $account) }} >{{ $account->accountNumber }} : <b>{{ $account->balance }} € </b></a>


                                <p>  Total balance in {{$client->name}} {{$client->surname}} accounts: </p>
                                @endforeach
                            </ul>
                            <ul class="list-group-item">  
                                {{$account->balance}}  </ul>
                        </div>
                        @endif
                    </td>
               

                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">All clients</a>
                        <a href="{{route('accounts-transfer')}}" class="btn btn-primary m-1"> Transfer </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', "Client's information")
