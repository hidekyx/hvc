@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Courier Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item active">Courier Setting</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Courier Settings</h5>
                        <a href="{{ asset('/dashboard/courier-setting/create') }}">
                            <button type="button" class="btn btn-primary btn-sm text-white rounded-pill">
                                <b><i class="bi bi-plus-lg"></i> Add Courier</b>
                            </button>
                        </a>
                        <hr>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
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
                                        <b>{{ $d->name }}</b>
                                    </td>
                                    <td class="text-secondary">
                                        Rp. {{ number_format($d->price) }}
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/courier-setting/edit/'.$d->id_courier) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#delete-{{ $d->id_courier }}">
                                            <b><i class="bi bi-trash"></i> </b>
                                        </button>
                                        <div class="modal fade" id="delete-{{ $d->id_courier }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete: <b>{{ $d->name }} (ID: {{ $d->id_courier }})</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ asset('/dashboard/courier-setting/delete/'.$d->id_courier) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Delete Courier</button>
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