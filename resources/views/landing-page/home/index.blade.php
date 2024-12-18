@extends('landing-page.layout.app')

@section('content')
<section style="background-color: #ffffff;">
    <div class="container">
        <div class="row">
            <div class="content col-lg-12">
                <div class="carousel testimonial testimonial-border" data-items="1" data-equalize-item=".testimonial-item">
                    <div class="testimonial-item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="home-text" style="font-size: 23px; line-height: 1.5;">
                                    {!! $content['home_text'] !!}
                                </div>
                            </div>
                            <div class="col-lg-6" style="display: flex; align-items: center; flex-wrap: wrap;">
                                <img src="{{ asset('storage/content/'.$content['home_logo']) }}" style="height: auto;">
                            </div>
                        </div>
                    </div>
                    @if(App\Models\Collection::getHighlight($content['home_highlight']))
                    <div class="testimonial-item">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="mb-3" style="font-size: 54px; font-weight: 800;">{{ App\Models\Collection::getHighlight($content['home_highlight'])->name }}</h1>
                                <p class="mb-5" style="font-size: 20px;">{{ App\Models\Collection::getHighlight($content['home_highlight'])->description }}</p>
                                <a href="{{ asset('/shop/'.$content['home_highlight']) }}"><button type="button" class="btn btn-outline btn-dark btn-roundeded" style="font-size: 20px;">View Colletion</button></a>
                            </div>
                            <div class="col-lg-6 preview-section">
                                <img class="image-preview-1" src="{{ asset('storage/collection/' . App\Models\Collection::getHighlight($content['home_highlight'])->img_1) }}" style="height: auto;">
                                @if(App\Models\Collection::getHighlight($content['home_highlight'])->img_2)
                                <img class="image-preview-2" src="{{ asset('storage/collection/' . App\Models\Collection::getHighlight($content['home_highlight'])->img_2) }}" style="height: auto;">
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<section class="fullscreen" style="background-color: #000000;">
    <div class="shape-divider" data-style="6" data-position="top" data-flip-vertical="true"></div>
    <div class="container">
        <h1 class="text-center text-white mb-5">OUR COLLECTION</h1>
        @if(count($collection))
        <div class="carousel team-members team-members-shadow" data-items="3">
            @foreach ($collection as $c)
            <div class="team-member" style="background-color: #313131; min-height: 70vh;">
                <div class="team-image">
                    <img src="{{ asset('storage/collection/'.$c->img_1) }}" class="collection-home-image">
                </div>
                <div class="team-desc">
                    <h2 class="text-light">{{ $c->name }}</h2>
                    <p class="text-muted" style="font-size: 20px">{{ Str::limit($c->description, 120) }}</p>
                    <div class="align-center">
                        <a href="{{ asset('/shop/'.$c->id_collection) }}"><button type="button" class="btn btn-roundeded btn-light btn-collection" style="font-size: 20px;">View Collection</button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center">
            <h4>No collections yet</h4>
        </div>
        @endif
    </div>
</section>
@endsection