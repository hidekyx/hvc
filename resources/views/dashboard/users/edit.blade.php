@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Edit User</h5>
                        <form action="{{ asset('/dashboard/users/update/'.$data->id_user) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-lg-2 col-form-label">Name</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-lg-2 col-form-label">Email</label>
                                <div class="col-lg-10">
                                    <input name="email" type="email" class="form-control" id="email" value="{{ $data->email }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_telp" class="col-lg-2 col-form-label">Phone Number</label>
                                <div class="col-lg-10">
                                    <input name="no_telp" type="number" class="form-control" id="no_telp" value="{{ $data->no_telp }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-lg-2 col-form-label">Address</label>
                                <div class="col-lg-10">
                                    <textarea name="address" class="form-control" id="address" rows="4" required>{{ $data->address }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="address" class="col-lg-2 col-form-label">Role</label>
                                <div class="col-lg-10">
                                    <select class="form-select" name="role" required>
                                        <option selected hidden value="{{ $data->role }}">{{ $data->role }}</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Customer">Customer</option>
                                    </select>
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