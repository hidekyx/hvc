@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Users Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Change Password</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Edit Password</h5>
                        <form action="{{ asset('/dashboard/users/password-change/'.$data->id_user) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="password" class="col-lg-2 col-form-label">New Password</label>
                                <div class="col-lg-10">
                                    <input name="password" type="password" class="form-control" id="password" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-lg-2 col-form-label">Retype Password</label>
                                <div class="col-lg-10">
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
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