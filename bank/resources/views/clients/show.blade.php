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
                            {{-- cia duoda kolekcija su visai truckais. o jei uzdesime (), pasiimam priklausomybe ir joje paskaiciuoti. Duomenu bazes uzklausos countas ...  --}}
                            <ul class="list-group list-group-flush">
                                @foreach ($client->accounts as $account)
                                <a class="list-group-item" href={{ route('accounts-show', $account) }} >{{ $account->accountNumber }} : <b>{{ $account->balance }} € </b></a>
                                @endforeach
                            </ul>
                            <ul class="list-group-item"> Total balance in {{$client->name}} {{$client->surname}} accounts:  </ul>
                        </div>
                        @endif
                    </td>
               

                        <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">All clients</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', "Client's information")
