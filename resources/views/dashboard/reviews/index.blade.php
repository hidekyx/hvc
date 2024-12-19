@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Reviews Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active">Reviews</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reviews Management</h5>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Review</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Images</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $d)
                                <tr>
                                    <th scope="row">
                                        {{ $key+1 }}
                                    </th>
                                    <td>
                                        <span class="text-secondary">Reviewed: </span>{{ Carbon\Carbon::parse($d->created_at)->isoFormat('D MMMM Y - H:m') }}
                                    </td>
                                    <td class="text-bold" style="font-weight: 600;">
                                        @if($d->user)
                                        {{ $d->user->name }}
                                        @else
                                        User deleted
                                        @endif
                                    </td>
                                    <td class="text-bold" style="font-weight: 600;">
                                        @if($d->collection)
                                        <a href="{{ asset('/shop/'.$d->collection->id_collection) }}" target="_blank">{{ $d->collection->name }}</a>
                                        @else
                                        Collection deleted
                                        @endif
                                    </td>
                                    <td class="text-secondary">
                                        @php
                                        $maxLength = 30;

                                        $review = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $d->review, 0, PREG_SPLIT_NO_EMPTY);
                                        echo $review_split = implode("<br>",$review);

                                        @endphp
                                    </td>
                                    <td>
                                        <div class="text-warning">
                                            @for($i=0; $i < $d->rate; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor
                                        </div>
                                    </td>
                                    <td>
                                        @if(Storage::exists('public/review/'.$d->img_1) && $d->img_1)
                                        <img src="{{ asset('storage/review/'.$d->img_1) }}" style="max-width: 100px;">
                                        @else
                                        -
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