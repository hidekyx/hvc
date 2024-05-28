@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Payment Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item active">Payment Setting</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Settings</h5>
                        <a href="{{ asset('/dashboard/payment-setting/create') }}">
                            <button type="button" class="btn btn-primary btn-sm text-white rounded-pill">
                                <b><i class="bi bi-plus-lg"></i> Add Payment</b>
                            </button>
                        </a>
                        <hr>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Account Holder</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col">QRIS</th>
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
                                        {{ $d->account_holder ?? '-' }}
                                    </td>
                                    <td class="text-secondary">
                                        {{ $d->account_number ?? '-' }}
                                    </td>
                                    <td class="text-secondary">
                                        @if(Storage::exists('public/qris/'.$d->account_qris) && $d->account_qris)
                                            <img src="{{ asset('storage/qris/'.$d->account_qris) }}" style="max-width: 300px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/payment-setting/edit/'.$d->id_payment) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#delete-{{ $d->id_payment }}">
                                            <b><i class="bi bi-trash"></i> </b>
                                        </button>
                                        <div class="modal fade" id="delete-{{ $d->id_payment }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete: <b>{{ $d->name }} (ID: {{ $d->id_payment }})</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ asset('/dashboard/payment-setting/delete/'.$d->id_payment) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Delete Payment</button>
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