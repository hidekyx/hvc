@extends('landing-page.layout.app')

@section('content')
<section style="background-color: #ffffff;">
    <div class="container text-center">
        <h1 class="mb-0">New Collection</h1>
        @if(count($collection))
        <div class="row mb-5">
            @foreach ($collection as $c)
            <div class="col-lg-4 mb-5">
                <img src="{{ asset('storage/collection/'.$c->img_1) }}" class="collection-image">
                <a href="{{ asset('/shop/'.$c->id_collection) }}">
                    <br><button type="button" class="btn btn-roundeded btn-dark mt-2" style="font-size: 20px;">Detail</button>
                </a>
                <h2 class="mt-2 mb-0" style="font-weight: 600;">{{ $c->name }}</h2>
                <p class="mt-0" style="font-size: 20px;">Rp. {{ number_format($c->price) }}</p>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center">
            <h4>No collections yet</h4>
        </div>
        @endif
        <div class="pagination-custom">
            {{ $collection->links() }}
        </div>
    </div>
</section>

<section>
    <div class="container text-center">
        <h1>Best Sellers</h1>
        @if(count($bestSellers))
        <div class="carousel" data-items="4" data-lightbox="gallery">
            @foreach ($bestSellers as $b)
            @if($b->collection)
            <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="{{ asset('/shop/'.$b->collection->id_collection) }}"><img src="{{ asset('storage/collection/'.$b->collection->img_1) }}" class="best-seller-image"></a>
                    </div>
                    <div class="portfolio-description">
                        <a href="{{ asset('/shop/'.$b->collection->id_collection) }}">
                            <h3>{{ $b->collection->name }}</h3>
                            <span style="font-size: 19px;">Rp. {{ number_format($b->collection->price) }} / Sold: {{ $b->total }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @else
        <div class="text-center">
            <h4>No sold items yet</h4>
        </div>
        @endif
    </div>
</section>

<section>
    <div class="container text-center">
        <h1 class="mb-0">What They Said</h1>
        <div class="row">
            @forelse($review as $r)
            <div class="col-lg-4">
                <div class="team-member" style="background-color: #a8a8a8; padding: 20px; border-radius: 10px; min-height: 60vh;">
                    <div class="team-image">
                    <a href="{{ $r->collection ? asset('/shop/'.$r->id_collection) : '#' }}"><img src="{{ asset('storage/review/'.$r->img_1) }}" class="review-image"></a>
                    </div>
                    <div class="team-desc">
                        <a href="{{ $r->collection ? asset('/shop/'.$r->id_collection) : '#' }}"><h2 class="text-black">{{ $r->collection->name ?? 'Collection deleted' }}</h2></a>
                        <div class="product-rate" style="color: #FFC300;">
                            @for($i=0; $i < $r->rate; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <span style="font-size: 17px;">-{{ $r->user->name ?? 'User deleted' }}-</span>
                        <p style="font-size: 20px">"{{ $r->review }}"</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center">
                <h4>No reviews yet</h4>
            </div>
            @endforelse
        </div>
    </div>
    </div>
</section>
@endsection