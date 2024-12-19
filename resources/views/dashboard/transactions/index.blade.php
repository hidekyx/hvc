@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Transactions Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item active">Transactions</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Transactions Management</h5>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Datetime</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Proof</th>
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
                                        <span class="text-secondary">Checkout: </span>{{ Carbon\Carbon::parse($d->created_at)->isoFormat('D MMMM Y - H:mm') }}

                                        @if($d->packaging_at)
                                        <br><span class="text-secondary">Paid: </span>{{ Carbon\Carbon::parse($d->packaging_at)->isoFormat('D MMMM Y - H:mm') }}
                                        @endif

                                        @if($d->delivering_at)
                                        <br><span class="text-secondary">Deliver: </span>{{ Carbon\Carbon::parse($d->delivering_at)->isoFormat('D MMMM Y - H:mm') }}
                                        @endif

                                        @if($d->finished_at)
                                        <br><span class="text-secondary">Confirm: </span>{{ Carbon\Carbon::parse($d->finished_at)->isoFormat('D MMMM Y - H:mm') }}
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($d->detail as $detail)
                                        @if($detail->collection)
                                        <span class="badge bg-dark">{{ $detail->collection->name }}, {{ $detail->color }}, {{ $detail->size }} x{{ $detail->quantity }} = Rp. {{ number_format($detail->collection->price * $detail->quantity) }}</span>
                                        <br>
                                        @else
                                        <span class="badge bg-dark">Collection deleted</span>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="text-dark">
                                        @if($d->courier)
                                        {{ $d->courier->name }} (Rp. {{ number_format($d->courier->price) }})
                                        @else
                                        Courier deleted
                                        @endif
                                    </td>
                                    <td class="text-secondary">
                                        @if($d->user)
                                        Name: {{ $d->user->name }}<hr>
                                        @php
                                        $maxLength = 30;
                                        
                                        $address = preg_split("/.{0,{$maxLength}}\K(?:\s+|$)/s", $d->address, 0, PREG_SPLIT_NO_EMPTY);
                                        echo $address_split = implode("<br>",$address);
                                        
                                        @endphp
                                        @else
                                        User deleted
                                        @endif
                                    </td>
                                    <td class="text-bold">
                                        @if($d->payment)
                                        {{ $d->payment->name }}
                                        @else
                                        Payment method deleted
                                        @endif
                                        <p class="text-primary"><b>Rp. {{ number_format($d->total) }}</b></p>
                                    </td>
                                    <td style="font-weight: 600;">
                                        @if($d->status == "Payment")
                                        <span class="badge bg-danger">{{ $d->status }}</span>
                                        @elseif($d->status == "Packaging")
                                        <span class="badge bg-warning">{{ $d->status }}</span>
                                        @elseif($d->status == "Delivering")
                                        <span class="badge bg-success">{{ $d->status }}</span>
                                        <br>Receipt: {{ $d->receipt }}
                                        @elseif($d->status == "Finished")
                                        <span class="badge bg-info">{{ $d->status }}</span>
                                        @elseif($d->status == "Canceled")
                                        <span class="badge bg-dark">{{ $d->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Storage::exists('public/proof/'.$d->proof) && $d->proof)
                                            <img src="{{ asset('storage/proof/'.$d->proof) }}" style="max-width: 100px;">
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @if($d->status == "Packaging")
                                        <a href="{{ asset('/dashboard/transactions/deliver/'.$d->id_transaction) }}">
                                            <button type="button" class="btn btn-success btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-box"></i> Deliver</b>
                                            </button>
                                        </a>
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