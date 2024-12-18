@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users Management</h5>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name/Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $d)
                                <tr>
                                    <th scope="row">
                                        {{ $key+1 }}
                                    </th>
                                    <td>
                                        <b>{{ $d->name }}</b><br>
                                        <span class="text-secondary">{{ $d->email ?? '-' }}</span>
                                    </td>
                                    <td class="text-secondary">
                                        {{ $d->no_telp ?? '-' }}
                                    </td>
                                    <td class="text-secondary">
                                        @php
                                        $maxLength = 30;
                                        
                                        $address = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $d->address, 0, PREG_SPLIT_NO_EMPTY);
                                        echo $address_split = implode("<br>",$address);
                                        
                                        @endphp
                                    </td>
                                    <td class="text-secondary">
                                        <b>{{ $d->role }}</b>
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/users/password/'.$d->id_user) }}">
                                            <button type="button" class="btn btn-info btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-shield"></i> </b>
                                            </button>
                                        </a>

                                        <a href="{{ asset('/dashboard/users/edit/'.$d->id_user) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
                                        
                                        @if($d->role != "Admin")
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#delete-{{ $d->id_user }}">
                                            <b><i class="bi bi-trash"></i> </b>
                                        </button>
                                        @endif
                                        <div class="modal fade" id="delete-{{ $d->id_user }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete: <b>{{ $d->name }} (ID: {{ $d->id_user }})</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ asset('/dashboard/users/delete/'.$d->id_user) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Delete User</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection