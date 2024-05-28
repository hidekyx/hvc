@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Page Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item active">Page Setting</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Page Settings</h5>
                        <hr>
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Key</th>
                                    <th scope="col">Value</th>
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
                                        <b>{{ Str::title(str_replace('_', ' ', $d->key)) }}</b>
                                    </td>
                                    <td class="text-secondary">
                                        {!! Str::limit($d->value) !!}
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/page-setting/edit/'.$d->key) }}">
                                            <button type="button" class="btn btn-warning text-white btn-sm rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
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