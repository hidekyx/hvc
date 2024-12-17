@extends('landing-page.layout.app')

@section('content')
<section id="shop-cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('landing-page.layout.alert')
            </div>
            @if($transaction->isEmpty())
            <div class="col-lg-12">
                <h1 class="text-center">No transactions</h1>
            </div>
            @else
            <div class="col-lg-12">
                <h1 class="text-center mb-4">Transaction List</h1>
            </div>
            <div class="col-lg-12">
                <div class="shop-cart">
                    <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                        <table class="table table-hover" style="font-size: 20px;">
                            <thead>
                                <tr class="table-dark">
                                    <th class="cart-product-thumbnail">#</th>
                                    <th class="cart-product-date">Date</th>
                                    <th class="cart-product-product">Product</th>
                                    <th class="cart-product">Delivery</th>
                                    <th class="cart-product">Payment</th>
                                    <th class="cart-product">Status</th>
                                    <th class="cart-product">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction as $key => $t)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        Checkout: <span style="font-weight: 600;">{{ Carbon\Carbon::parse($t->created_at)->isoFormat('D MMMM Y - H:m') }}</span>
                                        @if($t->packaging_at)
                                        <hr>Paid: <span style="font-weight: 600;">{{ Carbon\Carbon::parse($t->packaging_at)->isoFormat('D MMMM Y - H:m') }}</span>
                                        @endif
                                        @if($t->finished_at)
                                        <br>Finished: <span style="font-weight: 600;">{{ Carbon\Carbon::parse($t->finished)->isoFormat('D MMMM Y - H:m') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($t->detail as $d)
                                            @if($t->status == "Finished")
                                                <a href="{{ asset('/review/'.$d->id_transaction_detail) }}"><button class="btn btn-warning mb-2 p-2" style="font-size: 14px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Click to review this item" data-bs-original-title="" title="">{{ $d->collection->name }}, {{ $d->color }}, {{ $d->size }} x{{ $d->quantity }} = Rp. {{ number_format($d->collection->price * $d->quantity) }}</button></a>
                                            @else
                                                <span class="badge bg-dark mb-2">{{ $d->collection->name }}, {{ $d->color }}, {{ $d->size }} x{{ $d->quantity }} = Rp. {{ number_format($d->collection->price * $d->quantity) }}</span>
                                            @endif
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $t->courier->name }} (Rp. {{ number_format($t->courier->price) }})
                                        @if($t->voucher && $t->voucher->category == "Gratis Ongkir")
                                        <br><span style="font-size: 16px;">Voucher ({{ $t->voucher->category }})<span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $t->payment->name }}
                                        <p class="mb-0" style="font-size: 24px; font-weight: 600;">Rp. {{ number_format($t->total) }}</p>
                                        @if($t->voucher && $t->voucher->category == "Diskon 5 Persen")
                                        <span style="font-size: 16px;">Voucher ({{ $t->voucher->category }})<span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($t->status == "Payment")
                                        <span class="badge bg-danger">{{ $t->status }}</span>
                                        @elseif($t->status == "Packaging")
                                        <span class="badge bg-warning">{{ $t->status }}</span>
                                        @elseif($t->status == "Delivering")
                                        <span class="badge bg-success">{{ $t->status }}</span>
                                        <br>Receipt: {{ $t->receipt }}
                                        @elseif($t->status == "Finished")
                                        <span class="badge bg-info">{{ $t->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($t->status == "Payment")
                                        <a href="{{ asset('/payment/'.$t->id_transaction) }}"><button type="button" class="btn btn-dark" style="font-size: 20px;">Pay</button></a>
                                        @elseif($t->status == "Delivering")
                                        <a href="{{ asset('/confirm-action/'.$t->id_transaction) }}"><button type="button" class="btn btn-dark" style="font-size: 20px;">Confirm</button></a>
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
            @endif
        </div>
    </div>
</section>
@endsection