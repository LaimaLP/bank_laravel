@extends('layouts.app')


@section('content')




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                {{-- <div class="col-md-7">
                    <form action="{{route('clients-filter')}}">
                        <div style="display: flex; flex-direction:row; gap:5px">
                            <input type="text" name="search" class="form-control" placeholder="Search FutureBank..." />
                            <div class="absolute top-2 right-2">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}

                <div class="card mt-5">
                    <h3 class="card-header">All clients</h3>


                    <form action="{{route('clients-index')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label class="m-2">Sort by</label>
                                        <select class="form-select mt-2" name="sort">
                                            @foreach ($sorts as $sortKey => $sortValue)
                                                <option value="{{ $sortKey }}"
                                                    @if ($sortBy == $sortKey) selected @endif>
                                                    {{ $sortValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 ">
                                    <div class="form-group mb-2">
                                        <label class="m-2">Puslapyje rezultatų</label>
                                        <select class="form-select mt-2" name="per_page">
                                            @foreach ($perPageSelect as $perPageKey => $perPageValue)
                                                <option value="{{ $perPageKey }}"
                                                    @if ($perPage == $perPageKey) selected @endif>
                                                    {{ $perPageValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 mt-2">
                                    <div class="form-group mb-2">
                                        <label class="m-2">Search by</label>
                                        <input type="text" name="s" class="form-control" placeholder="Name, surname" />
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-5">Sort</button>
                                        <a href="{{ route('clients-index') }}"
                                            class="btn btn-secondary mt-5 ms-2">Default</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Personal code</th>
                                    <th>Account Number</th>
                                    <th>Account Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($clients as $client)
                                {{-- //forechinam kolekcija --}}
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->surname }}</td>
                                    <td>{{ $client->personalNumber }}</td>
                                    <td>
                                        @if ($client->accounts()->count() > 0)
                                        <div class="card-body">
                                            {{-- cia duoda kolekcija su visai truckais. o jei uzdesime (), pasiimam priklausomybe ir joje paskaiciuoti. Duomenu bazes uzklausos countas ...  --}}
                                            <ul class="list-group list-group-flush">
                                                @foreach ($client->accounts as $account)
                                                <a style="text-decoration:none" href={{ route('accounts-show', $account) }} > <li class="list-group-item">{{ $account->accountNumber }}</li> </a>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($client->accounts()->count() > 0)
                                        <div class="card-body">
                                            {{-- cia duoda kolekcija su visai truckais. o jei uzdesime (), pasiimam priklausomybe ir joje paskaiciuoti. Duomenu bazes uzklausos countas ...  --}}
                                            <ul class="list-group list-group-flush">
                                                @foreach ($client->accounts as $account)
                                                <li class="list-group-item"> {{ $account->balance }} € </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                      
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success m-1" href={{ route('clients-edit', $client) }}>Edit</a>
                                        <a class="btn btn-danger m-1" href={{ route('clients-show', $client) }}>Show</a>
                                        <a class="btn btn-secondary m-1" href={{ route('clients-delete', $client) }}>Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No Clients to show</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            <a href="{{ route('clients-create') }}" class="btn btn-success">Pridėti</a>
                        </div>
                    </div>
                </div>

                @if ($perPage)
                <div class="mt-3">
                    {{ $clients->links() }}
                </div>
            @endif




            </div>
        </div>
    </div>
@endsection
@section('title', 'All Clients')
