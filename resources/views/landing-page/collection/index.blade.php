@extends('landing-page.layout.app')

@section('content')
<section style="background-color: #ffffff;">
    <div class="container text-center">
        <h1>{{ $category }} Collections</h1>
        <div class="row mb-5">
            @foreach ($collection as $c)
            <div class="col-lg-4 mb-5">
                <img src="{{ asset('storage/collection/'.$c->img_1) }}" class="collection-image">
                <h2 class="mt-2 mb-0" style="font-weight: 600;">{{ $c->name }}</h2>
                <p class="mt-0" style="font-size: 20px;">Rp. {{ number_format($c->price) }}</p>
                <a href="{{ asset('/shop/'.$c->id_collection) }}"><button type="button" class="btn btn-roundeded btn-dark" style="font-size: 20px;">Detail</button></a>
            </div>
            @endforeach
        </div>
        <div class="pagination-custom">
            {{ $collection->links() }}
        </div>
    </div>
</section>

<section>
    <div class="container text-center">
        <h1 class="mb-5">What They Said</h1>
        <div class="row">
            @forelse($review as $r)
            <div class="col-lg-4">
                <div class="team-member" style="background-color: #a8a8a8; padding: 20px; border-radius: 10px;">
                    <div class="team-image">
                    <a href="{{ asset('/shop/'.$r->id_collection) }}"><img src="{{ asset('storage/review/'.$r->img_1) }}" class="review-image"></a>
                    </div>
                    <div class="team-desc">
                        <a href="{{ asset('/shop/'.$r->id_collection) }}"><h2 class="text-black">{{ $r->collection->name }}</h2></a>
                        <div class="product-rate" style="color: #FFC300;">
                            @for($i=0; $i < $r->rate; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                        <span style="font-size: 17px;">-{{ $r->user->name }}-</span>
                        <p style="font-size: 20px">"{{ $r->review }}"</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>No Review Yet</h2>
            </div>
            @endforelse
        </div>
    </div>
    </div>
</section>
@endsection