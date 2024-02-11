@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Client {{$client->name}} {{$client->surname}} data</h3>

                    <div class="card-body">
                        @if ($client->accounts()->count() > 0)
                        <div class="card-body">
                            <ul>
                            <li> Has <b>{{$client->accounts()->count()}}</b> active acounts.</li>
                            <li> Total balance in <b>{{$client->surname}}</b> accounts is <b>{{$client->accounts()->sum('balance')}}€</b>. </li>
       </ul>

                            <ul class="list-group list-group-flush">
                                @foreach ($client->accounts as $account)

                                <a class="list-group-item custom-account-list" href={{ route('accounts-show', $account) }} >{{ $account->accountNumber }} : <b>{{ $account->balance }} € </b></a>
                                @endforeach
                            </ul>
                            <ul class="list-group-item">  
                      </ul>
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
