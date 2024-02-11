@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card mt-5">
                    <h3 class="card-header">Ar you sure?</h3>
                    <div class="card-body">
                        @if ($account->balance > 0)
                            <p> <b>{{ $account->client->name }} {{ $account->client->surname }} </b> account <b>can't</b> be deleted.
                                <p> Account balance: <b>{{ $account->balance }} €</b> .</p>
                                <p> Empty account? </p>

                            <a href="{{ route('accounts-show',  $account) }}" class="btn btn-secondary m-1">Cancel</a>
                            <a href="{{ route('accounts-transfer') }}" class="btn btn-primary m-1">Tranfer</a>
                        @else
                            <form action="{{ route('accounts-destroy', $account) }}" method="post">
                                <p> Delete <b>{{ $account->client->name }} {{ $account->client->surname }}</b> account {{ $account->accountNumber }}. </p>
                                <p> Account balance: <b>{{ $account->balance }} €.</b> </p>

                                <button type="submit" class="btn btn-danger m-1">Delete</button>
                                <a href="{{ route('accounts-show', $account) }}" class="btn btn-secondary m-1">Cancel</a>
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
