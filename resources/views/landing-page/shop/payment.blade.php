@extends('landing-page.layout.app')

@section('content')
<section id="shop-cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('landing-page.layout.alert')
            </div>
            <div class="col-lg-12">
                <h1 class="text-center mb-4">Payment Process</h1>
            </div>
            <div class="col-lg-12">
                <div class="shop-cart">
                    <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                        <table class="table table-hover" style="font-size: 20px;">
                            <thead>
                                <tr class="table-dark">
                                    <th class="cart-product-product">Product</th>
                                    <th class="cart-product">Delivery</th>
                                    <th class="cart-product">Payment</th>
                                    <th class="cart-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach($transaction->detail as $d)
                                        {{ $d->collection->name }}, {{ $d->color }}, {{ $d->size }} x{{ $d->quantity }} = Rp. {{ number_format($d->collection->price * $d->quantity) }}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($transaction->courier)
                                        {{ $transaction->courier->name }} (Rp. {{ number_format($transaction->courier->price) }})
                                        @else
                                        Courier deleted
                                        @endif
                                        @if($transaction->voucher && $transaction->voucher->category == "Gratis Ongkir")
                                        <br><span style="font-size: 16px;">Voucher ({{ $transaction->voucher->category }})<span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaction->payment)
                                        {{ $transaction->payment->name }}
                                        @else
                                        Payment method deleted
                                        @endif
                                    </td>
                                    <td>
                                        <p class="mb-0" style="font-size: 24px; font-weight: 600;">Rp. {{ number_format($transaction->total) }}</p>
                                        @if($transaction->voucher && $transaction->voucher->category == "Diskon 5 Persen")
                                        <span style="font-size: 16px;">Voucher ({{ $transaction->voucher->category }})<span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if($transaction->payment)
                    <p style="font-size: 20px;" class="text-right">Please proceed your payment to this destination:</p>
                    <p style="font-size: 24px; font-weight: 600; line-height: 1;" class="mb-0">{{ $transaction->payment->name }}</p>
                    @if(Storage::exists('public/qris/'.$transaction->payment->account_qris) && $transaction->payment->account_qris)
                        <img src="{{ asset('storage/qris/'.$transaction->payment->account_qris) }}" style="max-width: 350px;">
                    @else
                        <p style="font-size: 24px;">{{ $transaction->payment->account_number }} ({{ $transaction->payment->account_holder }})</p>
                    @endif
                @else
                    <p style="font-size: 20px;" class="text-right">Payment method is deleted, please reorder again</p>
                @endif
            </div>
            <div class="col-lg-6" style="text-align: right;">
                @if($transaction->payment)
                <form action="{{ asset('/payment-action/'.$transaction->id_transaction) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="proof" class="mb-5" style="font-size: 24px;">Proof of transaction:</label>
                        <input type="file" class="btn btn-outline btn-dark form-control-file" id="proof" name="proof" style="font-size: 20px;" accept="image/*" required>
                    </div>
                    <button class="btn btn-primary" style="font-size: 20px;">Confirm</button>
                </form>
                @else
                <a href="{{ asset('/cancel-action/'.$transaction->id_transaction) }}"><button type="button" class="btn btn-danger" style="font-size: 20px;">Cancel Order</button></a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection