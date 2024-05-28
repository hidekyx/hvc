@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Payment Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item">Payment Setting</li>
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
                        <h5 class="card-title mb-3 pb-0">Edit Payment</h5>
                        <form action="{{ asset('/dashboard/payment-setting/update/'.$data->id_payment) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-lg-2 col-form-label">Name</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="payment_type" class="col-lg-2 col-form-label">Payment Type</label>
                                <div class="col-lg-10">
                                    <select class="form-select" name="payment_type" id="payment_type" onchange="paymentType()" required>
                                        @if(Storage::exists('public/qris/'.$data->account_qris) && $data->account_qris)
                                            <option selected hidden value="payment_qris">Payment QRIS</option>
                                        @endif
                                        <option value="payment_normal">Payment Normal</option>
                                        <option value="payment_qris">Payment QRIS</option>
                                    </select>

                                    @push('scripts')
                                    <script type="text/javascript">
                                        function paymentType() {
                                            var payment_select = document.getElementById("payment_type");
                                            var payment_value = payment_select.options[payment_select.selectedIndex].value;
                                            if (payment_value == "payment_normal") {
                                                $('#payment_normal').fadeIn();
                                                $('#payment_qris').fadeOut();
                                                $('#account_holder').attr('required', 'True');
                                                $('#account_number').attr('required', 'True');
                                                $('#account_qris').removeClass('required').removeAttr('required');
                                                $('#preview').fadeOut();
                                            } else if (payment_value == "payment_qris") {
                                                $('#payment_qris').fadeIn();
                                                $('#payment_normal').fadeOut();
                                                $('#account_holder').removeClass('required').removeAttr('required');
                                                $('#account_number').removeClass('required').removeAttr('required');
                                                $('#account_qris').attr('required', 'True');
                                                $('#preview').fadeIn();
                                            }
                                        }

                                        paymentType();
                                    </script>
                                    @endpush
                                </div>
                            </div>

                            <div id="payment_normal" style="display: {{ $data->account_qris ? 'none' : 'block' }};">
                                <div class="row mb-3">
                                    <label for="account_holder" class="col-lg-2 col-form-label">Account Holder</label>
                                    <div class="col-lg-10">
                                        <input name="account_holder" type="text" class="form-control" id="account_holder" value="{{ $data->account_holder }}" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="account_number" class="col-lg-2 col-form-label">Account Number</label>
                                    <div class="col-lg-10">
                                        <input name="account_number" type="number" class="form-control" id="account_number" value="{{ $data->account_number }}" required>
                                    </div>
                                </div>
                            </div>

                            <div id="payment_qris" style="display: {{ $data->account_qris ? 'block' : 'none' }};">
                                <div class="row mb-3">
                                    <label for="account_qris" class="col-lg-2 col-form-label">QRIS Image</label>
                                    <div class="col-lg-10">
                                        <input class="form-control mb-2" id="account_qris" type="file" accept="image/*" name="account_qris" required>
                                        <img id="preview" src="{{ asset('storage/qris/'.$data->account_qris) }}" style="max-width: 400px; display: {{ $data->account_qris ? 'block' : 'none' }};">

                                        @push('scripts')
                                        <script type="text/javascript">
                                            $('input[id="account_qris"]').change(function(e) {
                                                var reader = new FileReader();
                                                reader.onload = function(e) {
                                                    document.getElementById('preview').src = e.target.result;
                                                    document.getElementById('preview').hidden = false;
                                                };
                                                reader.readAsDataURL(this.files[0]);
                                            });
                                        </script>
                                        @endpush
                                    </div>
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