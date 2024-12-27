@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Vouchers Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active">Vouchers</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vouchers Management</h5>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">History Quiz</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $d)
                                <tr>
                                    <th scope="row">
                                        {{ $key+1 }}
                                    </th>
                                    <td class="text-bold" style="font-weight: 600;">
                                        @if($d->user)
                                        {{ $d->user->name }}
                                        @else
                                        User deleted
                                        @endif
                                    </td>
                                    <td style="font-weight: 600;">
                                        @if($d->history)
                                        {{ $d->history->name }}
                                        @else
                                        History deleted
                                        @endif
                                    </td>
                                    <td style="font-weight: 600;">{{ $d->category }}</td>
                                    <td style="font-weight: 600;">
                                        @if($d->status == "Used")
                                        <span class="badge bg-success">{{ $d->status }}</span>
                                        @elseif($d->status == "Unused")
                                        <span class="badge bg-info">{{ $d->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-secondary">Received: </span>{{ Carbon\Carbon::parse($d->created_at)->isoFormat('D MMMM Y - H:m') }}
                                        @if($d->status == "Used")
                                        <br>
                                        <span class="text-secondary">Used: </span>{{ Carbon\Carbon::parse($d->updated_at)->isoFormat('D MMMM Y - H:m') }}
                                        @endif
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