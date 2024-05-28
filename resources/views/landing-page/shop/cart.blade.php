@extends('landing-page.layout.app')

@section('content')
<section id="shop-cart">
    <div class="container">
        <form action="{{ asset('/checkout') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('landing-page.layout.alert')
                </div>
                @if($cart->isEmpty())
                <div class="col-lg-12">
                    <h1 class="text-center">No items in cart</h1>
                </div>
                @else
                <div class="col-lg-8">
                    <div class="shop-cart">
                        <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                            <table class="table table-hover" style="font-size: 20px;">
                                <thead>
                                    <tr class="table-dark">
                                        <th class="cart-product-thumbnail">Product</th>
                                        <th class="cart-product-thumbnail"></th>
                                        <th class="cart-product-price">Price</th>
                                        <th class="cart-product-quantity">Quantity</th>
                                        <th class="cart-product-subtotal">Subtotal</th>
                                        <th class="cart-product-remove"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $c)
                                    <tr>
                                        <td class="cart-product-thumbnail">
                                            <a href="{{ asset('/shop/'.$c->id_collection) }}">
                                                <img src="{{ asset('storage/collection/'.$c->collection->img_1) }}">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="cart-product-thumbnail-name">
                                                <p class="mb-0" style="font-size: 24px; font-weight: 600;">{{ $c->collection->name }}</p>
                                                <p class="mb-0 text-muted" style="font-size: 20px;">Color: {{ $c->color }}</p>
                                                <p class="text-muted" style="font-size: 20px;">Size: {{ $c->size }}</p>
                                            </div>
                                        </td>
                                        <td class="cart-product-price">
                                            <span class="amount">Rp. {{ number_format($c->collection->price) }}</span>
                                        </td>
                                        <td class="cart-product-quantity">
                                            <div class="quantity">
                                                <input type="button" class="minus" data-id="{{ $c->id_cart }}" data-price="{{ $c->collection->price }}" value="-">
                                                <input type="number" class="qty" id="qty-{{ $c->id_cart }}" value="{{ $c->quantity }}" min="1" max="{{ $c->collection->stock }}" name="quantity[{{ $c->id_cart }}]" required>
                                                <input type="button" class="plus" data-id="{{ $c->id_cart }}" data-price="{{ $c->collection->price }}" value="+">
                                            </div>
                                            <span>Max: {{ $c->collection->stock }}</span>
                                        </td>
                                        <td class="cart-product-subtotal">
                                            <span id="subtotal-{{ $c->id_cart }}" class="amount">Rp. {{ number_format($c->quantity * $c->collection->price) }}</span>
                                        </td>
                                        <td class="cart-product-remove">
                                            <a href="{{ asset('/cancel/'.$c->id_cart) }}" style="border: 1px solid #000; border-radius: 100%;"><i class="fa fa-times text-dark" style="font-size: 10px; padding: 8px;"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                        <table class="table text-center" style="font-size: 20px;">
                            <thead>
                                <tr class="table-dark">
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <textarea style="font-size: 20px;" class="form-control" id="address" rows="3" name="address" required>{{ Auth::user()->address }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Choose Delivery Options</h4>
                                        <select name="id_courier" id="delivery-options" class="form-select" style="font-size: 20px;" required>
                                            <option selected disabled hidden>Select Courier</option>
                                            @foreach($courier as $c)
                                            <option data-courier-price="{{ $c->price }}" value="{{ $c->id_courier }}">{{ $c->name }} - Rp. {{ number_format($c->price) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                        <table class="table" style="font-size: 20px;">
                            <thead>
                                <tr class="table-dark">
                                    <th colspan="2" class="text-center">Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <select name="id_payment" id="payment-options" class="form-select" style="font-size: 20px;" required>
                                            <option selected disabled hidden>Select Payment</option>
                                            @foreach($payment as $p)
                                            <option data-account-holder="{{ $p->account_holder }}" data-account-number="{{ $p->account_number }}" data-qris="{{ $p->account_qris }}" value="{{ $p->id_payment }}">{{ $p->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left">Account Holder</td>
                                    <td id="account-holder">-</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Account Number</td>
                                    <td id="account-number">-</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <img id="account-qris" style="width: 100%;" src="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table table-sm table-striped table-responsive" style="border: 1px solid #dedede;">
                        <table class="table" style="font-size: 20px;">
                            <thead>
                                <tr class="table-dark">
                                    <th colspan="2" class="text-center">Checkout</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Delivery Cost</td>
                                    <td id="delivery-cost">Rp. -</td>
                                </tr>
                                <tr>
                                    <td>Product Cost</td>
                                    <td id="product-cost" data-product-cost="0">Rp. -</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td id="total-cost">Rp. -</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <button type="submit" id="checkout-button" class="btn btn-dark" style="font-size: 20px;">Proceed to Checkout</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const updateSubtotalAndTotal = () => {
            let productCost = 0;

            document.querySelectorAll('.cart-product-subtotal .amount').forEach(element => {
                let text = element.textContent;
                let value = text.replace(/[Rp.,\s]/g, '');
                let subtotal = parseFloat(value);
                productCost += subtotal;
            });

            $('#product-cost').data('product-cost', productCost);
            $('#product-cost').text('Rp. ' + productCost.toLocaleString('en-US'));
            calculateTotalCost();
        };

        const calculateTotalCost = () => {
            let deliveryCost = parseFloat($('#delivery-options').find(':selected').data('courier-price')) || 0;
            let productCost = parseFloat($('#product-cost').data('product-cost')) || 0;
            let totalCost = deliveryCost + productCost;
            $('#total-cost').text('Rp. ' + totalCost.toLocaleString('en-US'));
        };

        document.querySelectorAll('.minus, .plus').forEach(button => {
            button.addEventListener('click', () => {
                let id = button.getAttribute('data-id');
                let price = parseFloat(button.getAttribute('data-price'));
                let qtyInput = document.getElementById('qty-' + id);
                let subtotal = document.getElementById('subtotal-' + id);

                let currentValue = parseInt(qtyInput.value);
                if (button.classList.contains('minus') && currentValue > parseInt(qtyInput.min)) {
                    qtyInput.value = currentValue - 1;
                }
                if (button.classList.contains('plus') && currentValue < parseInt(qtyInput.max)) {
                    qtyInput.value = currentValue + 1;
                }

                subtotal.textContent = 'Rp. ' + (parseInt(qtyInput.value) * price).toLocaleString('en-US');
                updateSubtotalAndTotal();
            });
        });

        document.querySelectorAll('.qty').forEach(qtyInput => {
            qtyInput.addEventListener('input', () => {
                let id = qtyInput.id.split('-')[1];
                let price = parseFloat(document.querySelector('.plus[data-id="' + id + '"]').getAttribute('data-price'));
                let subtotal = document.getElementById('subtotal-' + id);

                let currentValue = parseInt(qtyInput.value);
                if (currentValue < parseInt(qtyInput.min)) {
                    qtyInput.value = qtyInput.min;
                } else if (currentValue > parseInt(qtyInput.max)) {
                    qtyInput.value = qtyInput.max;
                }

                subtotal.textContent = 'Rp. ' + (parseInt(qtyInput.value) * price).toLocaleString('en-US');
                updateSubtotalAndTotal();
            });
        });

        $('#delivery-options').change(function() {
            let deliveryCost = parseFloat($(this).find(':selected').data('courier-price'));
            $('#delivery-cost').text('Rp. ' + deliveryCost.toLocaleString('en-US'));
            calculateTotalCost();
        });

        $('#payment-options').change(function() {
            let accountHolder = $(this).find(':selected').data('account-holder');
            let accountNumber = $(this).find(':selected').data('account-number');
            let accountQris = $(this).find(':selected').data('qris');

            $('#account-holder').text(accountHolder ? accountHolder : '-');
            $('#account-number').text(accountNumber ? accountNumber : '-');
            if (accountQris) {
                $('#account-qris').attr('src', '{{ asset("storage/qris") }}/' + accountQris).show();
            } else {
                $('#account-qris').hide();
            }
        });

        updateSubtotalAndTotal();
    });
</script>
@endpush