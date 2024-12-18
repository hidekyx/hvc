@extends('landing-page.layout.app')

@section('content')
<section style="background-color: #ffffff; min-height: 45vh">
    <div class="container text-center">
        <h1 class="mb-0">{{ $category }} Histories</h1>
        @if(count($history))
        <div class="row mb-5">
            @foreach ($history as $h)
            <div class="col-lg-4 mb-5">
                <img src="{{ asset('storage/history/'.$h->img_1) }}" class="collection-image">
                <h2 class="mt-2 mb-0" style="font-weight: 600;">{{ $h->name }}</h2>
                <a href="{{ asset('/history/'.strtolower($category).'/detail/'.$h->id_history) }}"><button type="button" class="btn btn-roundeded btn-dark" style="font-size: 20px;">Read</button></a>
            </div>
            @endforeach
        </div>
        <div class="pagination-custom">
            {{ $history->links() }}
        </div>
        @else
        <div class="text-center">
            <h4>No histories yet</h4>
        </div>
        @endif
    </div>
</section>
@endsection