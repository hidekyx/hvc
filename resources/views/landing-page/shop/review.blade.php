@extends('landing-page.layout.app')

@section('content')
<section id="page-content">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <h1 class="text-center">Review</h1>
            </div>
            <div class="col-lg-12">
                @include('landing-page.layout.alert')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4" style="font-size: 24px;">Your Review</span>
                        <p class="text-muted" align="right" style="font-size: 20px;">{{ $transactionDetail->collection->name }}, {{ $transactionDetail->color }}, {{ $transactionDetail->size }} x{{ $transactionDetail->quantity }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ asset('/review-action/'.$transactionDetail->id_transaction_detail) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <span class="text-muted text-sm font-italic" style="font-size: 20px;">Receipt Number</span>
                                    <h4 class="mb-4" style="font-size: 20px;">{{ $transactionDetail->transaction->receipt }}</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <span class="text-muted text-sm font-italic" style="font-size: 20px;">Purchased at</span>
                                            <h5 class="mb-4" style="font-size: 20px;">{{ \Carbon\Carbon::parse($transactionDetail->transaction->packaging_at)->isoFormat('D MMMM Y')}}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="text-muted text-sm font-italic" style="font-size: 20px;">Delivered at</span>
                                            <h5 class="mb-4" style="font-size: 20px;">{{ \Carbon\Carbon::parse($transactionDetail->transaction->finished_at)->isoFormat('D MMMM Y')}}</h5>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="{{ asset('storage/collection/'.$transactionDetail->collection->img_1) }}" alt="Image Description" class="rounded img-fluid p-1" style="height: 100%;">
                                        </div>
                                        <div class="col-lg-7">
                                            <h4 class="mb-0" style="font-size: 24px;">{{ $transactionDetail->collection->name }}</h4>
                                            <p class="d-block mb-0" style="font-size: 20px;">Color: <b>{{ $transactionDetail->color }}</b></p>
                                            <p class="d-block mb-0" style="font-size: 20px;">Size: <b>{{ $transactionDetail->size }}</b></p>
                                            <p class="d-block" style="font-size: 20px;">Quantity: <b>{{ $transactionDetail->quantity }}</b></p>
                                            <small class="d-block mt-2 font-weight-bold" style="font-size: 20px;">Subtotal Price: <b class="text-success">Rp. {{ number_format($transactionDetail->collection->price * $transactionDetail->quantity) }}</b></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <p class="h4" style="font-size: 22px;">Write Review</p>
                                    <div class="form-group">
                                        <textarea name="review" class="form-control" placeholder="Your Review" style="width: 100%; min-height: 160px; font-size: 20px;" required></textarea>
                                    </div>
                                    <p class="h4">Rate</p>
                                    <div class="rate">
                                        <input type="radio" id="star5" name="rate" value="5" required>
                                        <label for="star5" title="5">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" required>
                                        <label for="star4" title="4">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" required>
                                        <label for="star3" title="3">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" required>
                                        <label for="star2" title="2">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" required>
                                        <label for="star1" title="1">1 star</label>
                                    </div>
                                    <p class="h4 mt-6">Upload Review Images</p>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="img_1" style="font-size: 18px;">Image #1</label>
                                                <input type="file" style="font-size: 18px;" class="form-control-file" id="img_1" name="img_1" accept="image/*" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="img_2" style="font-size: 18px;">Image #2</label>
                                                <input type="file" style="font-size: 18px;" class="form-control-file" id="img_2" name="img_2" accept="image/*">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="img_3" style="font-size: 18px;">Image #3</label>
                                                <input type="file" style="font-size: 18px;" class="form-control-file" id="img_3" name="img_3" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12 d-flex justify-content-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="font-size: 20px;">Submit Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection