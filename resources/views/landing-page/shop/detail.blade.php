@extends('landing-page.layout.app')

@section('content')
<section id="product-page" class="product-page p-b-0">
    <div class="container">
        <div class="product">
            <div class="row m-b-40">
                <div class="col-lg-12">
                    @include('landing-page.layout.alert')
                </div>
                <div class="col-lg-5">
                    <div class="product-image">
                        <div class="carousel dots-inside dots-dark arrows-visible" data-items="1" data-loop="true" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-autoplay="2500" data-lightbox="gallery">
                            <a href="{{ asset('storage/collection/'.$collection->img_1) }}" data-lightbox="image" title="{{ $collection->name }}">
                                <img alt="Shop product image!" src="{{ asset('storage/collection/'.$collection->img_1) }}">
                            </a>
                            @if($collection->img_2)
                            <a href="{{ asset('storage/collection/'.$collection->img_2) }}" data-lightbox="image" title="{{ $collection->name }}">
                                <img alt="Shop product image!" src="{{ asset('storage/collection/'.$collection->img_2) }}">
                            </a>
                            @endif
                            @if($collection->img_3)
                            <a href="{{ asset('storage/collection/'.$collection->img_3) }}" data-lightbox="image" title="{{ $collection->name }}">
                                <img alt="Shop product image!" src="{{ asset('storage/collection/'.$collection->img_3) }}">
                            </a>
                            @endif
                            @if($collection->img_4)
                            <a href="{{ asset('storage/collection/'.$collection->img_4) }}" data-lightbox="image" title="{{ $collection->name }}">
                                <img alt="Shop product image!" src="{{ asset('storage/collection/'.$collection->img_4) }}">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-description">
                        <div class="product-title">
                            <h3>{{ $collection->name }}</h3>
                        </div>
                        <div class="product-price">
                            <ins style="font-size: 22px;">Rp. {{ number_format($collection->price) }}</ins>
                        </div>
                        <div class="product-rate">
                            @for($i=0; $i < $averageRate; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <div class="product-reviews"><a href="#" style="font-size: 18px;">{{ $review->count() }} customer reviews</a>
                        </div>
                        <div class="seperator m-b-10"></div>
                        <p style="font-size: 28px;" class="mb-0">Avaibility:
                            @if($collection->stock > 0)
                            <span class="text-success" style="font-size: 24px;"><i class="icon-check"></i>In Stock</span>
                            @else
                            <span class="text-danger" style="font-size: 24px;"><i class="icon-x"></i>Out of stock</span>
                            @endif
                        </p>
                        <p style="font-size: 20px;">Hurry up! only {{ $collection->stock }} product left in stock</p>
                        <div class="seperator m-t-20 m-b-10"></div>
                    </div>
                    <form action="{{ asset('/add-to-cart/'.$collection->id_collection) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <h6 style="font-size: 20px;">Size</h6>
                                <ul class="product-size">
                                    @foreach($collection->size as $s)
                                    <li>
                                        <label>
                                            <input class="form-control" type="radio" value="{{ $s }}" name="size" required><span>{{ $s }}</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h6 style="font-size: 20px;">Color</h6>
                                <label class="sr-only">Color</label>
                                <select class="form-select" name="color" style="font-size: 20px;" required>
                                    @foreach($collection->color as $c)
                                    <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <h6 style="font-size: 20px;">Select quantity</h6>
                                <div class="cart-product-quantity">
                                    <div class="quantity m-l-5">
                                        <input type="button" class="minus" value="-">
                                        <input type="number" class="qty" value="1" min="1" max="{{ $collection->stock }}" name="quantity" required>
                                        <input type="button" class="plus" value="+">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h6 style="font-size: 20px;">Buy</h6>
                                @if($collection->stock < 1)
                                <button class="btn btn-dark disabled" style="font-size: 20px;">Out of stock</button>
                                @else
                                <button type="submit" class="btn btn-dark" style="font-size: 20px;">Add to cart</button>
                                @endif
                            </div>
                            <div class="col-lg-12 mt-5">
                                <h6 class="pb-0" style="font-size: 20px; margin-bottom: -10px;">Category: {{ $collection->category }}</h6>
                                <div class="seperator mt-0 mb-0"></div>
                                <h6 class="me-3" style="font-size: 20px; display: inline;">Share:</h6>
                                <a href="#" target="_blank"><img src="{{ asset('images/tiktok-logo-black.png') }}" style="height: 30px;" class="me-3"></a>
                                <a href="#" target="_blank"><img src="{{ asset('images/whatsapp-logo-black.png') }}" style="height: 30px;" class="me-3"></a>
                                <a href="#" target="_blank"><img src="{{ asset('images/instagram-logo-black.png') }}" style="height: 30px;"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tabs tabs-folder">
                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" style="font-size: 20px;" id="home-tab" data-bs-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="false">
                            <i class="fa fa-align-justify"></i>Description
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" style="font-size: 20px;" data-bs-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">
                            <i class="fa fa-star"></i>Reviews
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent3">
                    <div class="tab-pane fade active show" id="home3" role="tabpanel" aria-labelledby="home-tab">
                        <p style="font-size: 18px;">{{ $collection->description }}</p>
                    </div>
                    <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="comments" id="comments">
                            <div class="comment_number" style="font-size: 20px;">
                                Reviews <span>({{ $review->count() }})</span>
                            </div>
                            @foreach($review as $r)
                            <hr class="my-4">
                            <div class="comment-list">
                                <div class="comment pb-0" id="comment-1">
                                    @if(Storage::exists('public/avatar/'.$r->user->avatar) && $r->user->avatar)
                                    <div class="image">
                                        <img src="{{ asset('storage/avatar/'.$r->user->avatar) }}" class="avatar">
                                    </div>
                                    @endif
                                    <div class="text">
                                        <div class="product-rate">
                                            @for($i=0; $i < $r->rate; $i++)
                                            <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <h5 class="name" style="font-size: 20px;">{{ $r->user->name }}</h5>
                                        <span class="comment_date" style="font-size: 18px;">Reviewed at {{ Carbon\Carbon::parse($r->created_at)->isoFormat('D MMMM Y - H:m') }}</span>
                                        <div class="text_holder">
                                            <p style="font-size: 18px;">{{ $r->review }}</p>
                                        </div>
                                        <a href="{{ asset('storage/review/'.$r->img_1) }}" data-lightbox="image" title="Review" class="me-3">
                                            <img src="{{ asset('storage/review/'.$r->img_1) }}" class="review-user-image">
                                        </a>
                                        @if(Storage::exists('public/review/'.$r->img_2) && $r->img_2)
                                            <a href="{{ asset('storage/review/'.$r->img_2) }}" data-lightbox="image" title="Review" class="me-3">
                                                <img src="{{ asset('storage/review/'.$r->img_2) }}" class="review-user-image">
                                            </a>
                                        @endif
                                        @if(Storage::exists('public/review/'.$r->img_3) && $r->img_3)
                                            <a href="{{ asset('storage/review/'.$r->img_3) }}" data-lightbox="image" title="Review">
                                                <img src="{{ asset('storage/review/'.$r->img_3) }}" class="review-user-image">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-t-0">
    <div class="container">
        <div class="heading-text heading-line text-left">
            <h4>Related Product</h4>
        </div>
        <div class="row">
            @foreach($related as $r)
            <div class="col-lg-3">
                <div class="widget-shop">
                    <div class="product w-100 mb-3" style="border: 1px solid #bebebe; border-radius: 10px; padding: 10px; min-height: 30vh;">
                        <div class="text-center">
                            <img src="{{ asset('storage/collection/'.$r->img_1) }}" class="related-product-image mb-3"><br>
                        </div>
                        <a href="{{ asset('/shop/'.$r->id_collection) }}" style="font-size: 22px; font-weight: 600;">{{ $r->name }}</a>
                        <div class="product-price">
                            <ins style="font-size: 20px;">Rp. {{ number_format($r->price) }}</ins>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const minusButton = document.querySelector('.minus');
        const plusButton = document.querySelector('.plus');
        const qtyInput = document.querySelector('.qty');

        minusButton.addEventListener('click', () => {
            let currentValue = parseInt(qtyInput.value);
            if (currentValue > parseInt(qtyInput.min)) {
                qtyInput.value = currentValue - 1;
            }
        });

        plusButton.addEventListener('click', () => {
            let currentValue = parseInt(qtyInput.value);
            if (currentValue < parseInt(qtyInput.max)) {
                qtyInput.value = currentValue + 1;
            }
        });

        qtyInput.addEventListener('input', () => {
            let currentValue = parseInt(qtyInput.value);
            if (currentValue < parseInt(qtyInput.min)) {
                qtyInput.value = qtyInput.min;
            } else if (currentValue > parseInt(qtyInput.max)) {
                qtyInput.value = qtyInput.max;
            }
        });
    });
</script>
@endpush