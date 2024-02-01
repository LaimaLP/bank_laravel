@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Ar you sure?</h3>

                    <div class="card-body">
                        @if ($client->accounts()->count() > 0)
                            <p> Client {{ $client->name }} {{ $client->surname }} has active accounts.
                            <ul class="list-group list-group-flush">
                                @foreach ($client->accounts as $account)
                                    <li class="list-group-item"><a
                                            href="{{ route('accounts-show', $account) }}">{{ $account->accountNumber }}
                                            {{ $account->balance }}</a></li>
                                @endforeach
                            </ul>
                            <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                        @else
                            <form action="{{ route('clients-destroy', $client) }}" method="post">
                                <p> Delete {{ $client->name }} {{ $client->surname }} client</p>

                                <button type="submit" class="btn btn-danger m-1">Delete</button>
                                <a href="{{ route('clients-index') }}" class="btn btn-secondary m-1">Cancel</a>
                                @csrf
                                @method('delete')
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Confirm delete')
