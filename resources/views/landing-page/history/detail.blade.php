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
                        <a href="{{ asset('storage/history/'.$history->img_1) }}" data-lightbox="image" title="{{ $history->name }}">
                            <img alt="Shop product image!" class="main-image" src="{{ asset('storage/history/'.$history->img_1) }}">
                        </a>
                        <div class="secondary-image-container">
                            <a href="{{ asset('storage/history/'.$history->img_2) }}" data-lightbox="image" title="{{ $history->name }}">
                                <img alt="Shop product image!" class="secondary-image" src="{{ asset('storage/history/'.$history->img_2) }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="product-description">
                        <div class="product-title">
                            <h1>{{ $history->name }}</h1>
                        </div>
                        <div class="seperator m-t-20 m-b-10"></div>
                        <div class="history-description">{!! $history->description !!}</div>
                    </div>
                    @if($history->quiz_enabled == TRUE && $question->isNotEmpty())
                    <a href="{{ asset('/quiz/'.$history->id_history) }}">
                        <button type="button" class="btn btn-roundeded btn-dark" style="font-size: 20px;">Quiz</button>
                    </a>
                    @endif
                </div>  
            </div>
        </div>
    </div>
</section>

<section class="p-t-0">
    <div class="container">
        <div class="heading-text heading-line text-left">
            <h4>Collections To Buy</h4>
        </div>
        <div class="row">
            @forelse($collection as $c)
            <div class="col-lg-3">
                <div class="widget-shop">
                    <div class="product w-100" style="border: 1px solid #bebebe; border-radius: 10px; padding: 10px; min-height: 30vh;">
                        <div class="text-center">
                            <img src="{{ asset('storage/collection/'.$c->img_1) }}" class="related-product-image mb-3"><br>
                        </div>
                        <a href="{{ asset('/shop/'.$c->id_collection) }}" style="font-size: 22px; font-weight: 600;">{{ $c->name }}</a>
                        <div class="product-price">
                            <ins style="font-size: 20px;">Rp. {{ number_format($c->price) }}</ins>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-12">
                <h4>No collections yet</h4>
            </div>
            @endforelse
        </div>
</section>
@endsection