@extends('landing-page.layout.app')

@section('content')
<section style="background-color: #ffffff;">
    <div class="container">
        <form action="{{ asset('/profile-update/'.Auth::id()) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="content col-lg-12">
                    <h1 class="text-center">Profile</h1>
                </div>
                <div class="col-lg-12">
                    @include('landing-page.layout.alert')
                </div>
                <div class="col-lg-4 text-center">
                    @if(Storage::exists('public/avatar/'.Auth::user()->avatar) && Auth::user()->avatar)
                    <img src="{{ asset('storage/avatar/'.Auth::user()->avatar) }}" class="img-fluid mb-4" style="height: 200px; width: 200px; object-fit: cover; border-radius: 100%;">
                    @else
                    -
                    @endif
                    <div class="form-group" style="font-size: 20px;">
                        <label for="avatar" class="mb-2 text-center" style="font-size: 20px;">Upload Avatar</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar" accept="image/*">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="email" style="font-size: 20px;">Email address</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Email" required style="font-size: 18px;">
                            <span class="input-group-text"><i class="icon-mail"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" style="font-size: 20px;">Full name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name" required style="font-size: 18px;">
                                    <span class="input-group-text"><i class="icon-user-check"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="no_telp" style="font-size: 20px;">Phone number</label>
                                <div class="input-group">
                                    <input type="numeric" class="form-control" name="no_telp" value="{{ Auth::user()->no_telp }}" placeholder="Phone number" required style="font-size: 18px;">
                                    <span class="input-group-text"><i class="icon-phone"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" style="font-size: 20px;">Address</label>
                        <div class="input-group">
                            <textarea class="form-control" name="address" placeholder="Address" required style="font-size: 18px;">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                    <div class="mt-4"><button type="submit" class="btn btn-dark btn-block" style="font-size: 20px;">Save Changes</button></div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection