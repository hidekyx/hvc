@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Courier Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item">Courier Setting</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Create New Courier</h5>
                        <form action="{{ asset('/dashboard/courier-setting/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-lg-2 col-form-label">Name</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-lg-2 col-form-label">Price</label>
                                <div class="col-lg-10">
                                    <input name="price" type="number" class="form-control" id="price" required>
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection