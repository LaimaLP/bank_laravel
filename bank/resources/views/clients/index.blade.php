@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <h3 class="card-header">All clients</h3>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Personal code</th>
                                <th>Account Number</th>
                                <th>Action</th>
                            </tr>
                            @forelse ($clients as $client)
                                {{-- //forechinam kolekcija --}}
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->surname }}</td>
                                    <td>{{ $client->personalNumber }}</td>
                                    <td>{{ $client->accountNumber }}</td>
                                    <td>
                                        <a class="btn btn-success m-1"
                                            href={{ route('clients-edit', $client) }}>Edit</a>
                                        <a class="btn btn-danger m-1"
                                            href={{ route('clients-show', $client) }}>Show</a>
                                        <a class="btn btn-secondary m-1"
                                            href={{ route('clients-delete', $client) }}>Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No Clients to show
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                        <div>
                            <a href="{{ route('clients-create') }}" class="btn btn-success">Pridėti</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'All Clients')
