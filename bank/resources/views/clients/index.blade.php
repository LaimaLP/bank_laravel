@extends('layouts.app')
@inject('role', 'App\Services\RolesService')
@inject('code', 'App\Services\PersonalNumberService')

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

                <div class="card mt-5 client-list">
                    <h3 class="card-header">All clients</h3>


                    <form action="{{ route('clients-index') }}">
                        <div class="container ">
                            <div class="row">
                                <div class="col-3 ">
                                    <div class="form-group mb-3 ">
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
                                        <label class="m-2">Client's per page</label>
                                        <select class="form-select mt-2" name="per_page">
                                            @foreach ($perPageSelect as $perPageKey => $perPageValue)
                                                <option value="{{ $perPageKey }}"
                                                    @if ($perPage == $perPageKey) selected @endif>
                                                    {{ $perPageValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group mb-2">
                                        <label class="m-2">Search by</label>
                                        <input type="text" name="s" class="form-control mt-2"
                                            placeholder="Name, surname" />
                                    </div>
                                </div>
                                <div class="col-3 ">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-5">Sort</button>
                                        <a href="{{ route('clients-index') }}"
                                            class="btn btn-secondary mt-5 ms-2">Default</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                    <div class="card-body p-4 ">
                        <table class="table ">
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
                                        <td class="align-middle">{{ $client->name }}</td>
                                        <td class="align-middle">{{ $client->surname }}</td>
                                        <td class="align-middle">{{ $client->personalNumber }}</td>
                                        <td>
                                            @if ($client->accounts()->count() > 0)
                                                {{-- cia duoda kolekcija su visai truckais. o jei uzdesime (), pasiimam priklausomybe ir joje paskaiciuoti. Duomenu bazes uzklausos countas ...  --}}
                                                <ul class="list-group list-group-flush custom-account-list">
                                                    @foreach ($client->accounts as $account)
                                                        <a style="text-decoration:none"
                                                            href={{ route('accounts-show', $account) }}>
                                                            <li class="list-group-item custom-account-list">
                                                                {{ $account->accountNumber }}</li>
                                                        </a>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <ul class="list-group list-group-flush custom-account-list">
                                                    <li class="list-group-item"> No accounts</li>
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($client->accounts()->count() > 0)
                                                {{-- cia duoda kolekcija su visai truckais. o jei uzdesime (), pasiimam priklausomybe ir joje paskaiciuoti. Duomenu bazes uzklausos countas ...  --}}
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($client->accounts as $account)
                                                        <li class="list-group-item"> {{ $account->balance }} € </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <ul class="list-group list-group-flush custom-account-list">
                                                    <li class="list-group-item"> - </li>
                                                </ul>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($role->show('admin'))
                                                <a class="btn btn-success m-1" href={{ route('clients-edit', $client) }}
                                                    title="Edit"><i class="fa-solid fa-file-pen"></i></a>
                                            @endif
                                            <a class="btn btn-primary m-1" href={{ route('clients-show', $client) }}
                                                style="color:white"><i class="fa-solid fa-circle-info"></i></a>
                                            @if ($role->show('admin'))
                                                <a class="btn btn-danger m-1"
                                                    href={{ route('clients-delete', $client) }}><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No Clients to show</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        @if ($role->show('admin'))
                        <div class="d-flex">
                            <a href="{{ route('clients-create') }}" class="btn btn-success mx-3">Add new client</a>
                            <form action="{{ route('accounts-taxes') }}" method="post">
                                <button type="submit" class="btn btn-danger">Taxes <i
                                        class="fa-solid fa-hand-holding-dollar"></i></button>
                                @csrf
                                @method('put')
                            </form>
                        </div>
                        @endif
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
