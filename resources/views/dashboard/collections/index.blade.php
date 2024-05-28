@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Collections Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active">Collections</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Collections Management</h5>
                        <a href="{{ asset('/dashboard/collections/create') }}">
                            <button type="button" class="btn btn-primary btn-sm text-white rounded-pill">
                                <b><i class="bi bi-plus-lg"></i> Add Collection</b>
                            </button>
                        </a>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name/Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Images</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
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
                                        <span class="text-secondary">{{ $d->category }}</span>
                                    </td>
                                    <td class="text-success">
                                        <b>Rp. {{ number_format($d->price) }}</b>
                                    </td>
                                    <td class="text-secondary">
                                        {{ $d->stock }}
                                    </td>
                                    <td class="text-secondary">
                                        {!! Str::limit($d->description, 40) !!}
                                    </td>
                                    <td class="text-secondary">
                                        @if(Storage::exists('public/collection/'.$d->img_1) && $d->img_1)
                                            <img src="{{ asset('storage/collection/'.$d->img_1) }}" style="max-height: 50px; max-width: 50px;">
                                        @endif

                                        @if(Storage::exists('public/collection/'.$d->img_2) && $d->img_2)
                                            <img src="{{ asset('storage/collection/'.$d->img_2) }}" style="max-height: 50px; max-width: 50px;">
                                        @endif

                                        @if(Storage::exists('public/collection/'.$d->img_3) && $d->img_3)
                                            <img src="{{ asset('storage/collection/'.$d->img_3) }}" style="max-height: 50px; max-width: 50px;">
                                        @endif

                                        @if(Storage::exists('public/collection/'.$d->img_4) && $d->img_4)
                                            <img src="{{ asset('storage/collection/'.$d->img_4) }}" style="max-height: 50px; max-width: 50px;">
                                        @endif
                                    </td>
                                    <td class="text-secondary">
                                        <b>{{ $d->size }}</b>
                                    </td>
                                    <td class="text-secondary">
                                        <b>{{ $d->color }}</b>
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/collections/edit/'.$d->id_collection) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#delete-{{ $d->id_collection }}">
                                            <b><i class="bi bi-trash"></i> </b>
                                        </button>
                                        <div class="modal fade" id="delete-{{ $d->id_collection }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete: <b>{{ $d->name }} (ID: {{ $d->id_collection }})</b><br>
                                                        @if(Storage::exists('public/collection/'.$d->img_1) && $d->img_1)
                                                            <img src="{{ asset('storage/collection/'.$d->img_1) }}" style="max-height: 120px; max-width: 120px;" class="mt-2">
                                                        @endif

                                                        @if(Storage::exists('public/collection/'.$d->img_2) && $d->img_2)
                                                            <img src="{{ asset('storage/collection/'.$d->img_2) }}" style="max-height: 120px; max-width: 120px;" class="mt-2">
                                                        @endif

                                                        @if(Storage::exists('public/collection/'.$d->img_3) && $d->img_3)
                                                            <img src="{{ asset('storage/collection/'.$d->img_3) }}" style="max-height: 120px; max-width: 120px;" class="mt-2">
                                                        @endif

                                                        @if(Storage::exists('public/collection/'.$d->img_4) && $d->img_4)
                                                            <img src="{{ asset('storage/collection/'.$d->img_4) }}" style="max-height: 120px; max-width: 120px;" class="mt-2">
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ asset('/dashboard/collections/delete/'.$d->id_collection) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Delete Collection</button>
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