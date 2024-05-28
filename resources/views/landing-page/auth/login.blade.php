@extends('landing-page.layout.app')

@section('auth')
<section class="pt-5 pb-5" data-bg-image="{{ asset('images/login-bg.png') }}">
    <div class="container-fluid d-flex flex-column">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6 col-lg-4 col-xl-3 mx-auto">
                <div class="card" style="background-color: rgb(255, 255, 255, 0.8);">
                    <div class="card-body py-5 px-sm-5">
                        <div class="mb-5 text-left">
                            <p class="text-dark mb-0" style="font-size: 20px;">Welcome to <img src="{{ asset('images/hvc.png') }}" style="height: 30px;"></p>
                            <h6 class="h3 mb-1" style="font-size: 40px;">Login</h6>
                        </div><span class="clearfix"></span>

                        @include('landing-page.layout.alert')
                        
                        <form class="form-validate" autocomplete="on" method="post" action="{{ asset('/login-action') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" style="font-size: 20px;">Email address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                                    <span class="input-group-text"><i class="icon-mail"></i></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" style="font-size: 20px;">Password</label>
                                <div class="input-group show-hide-password">
                                    <input class="form-control" name="password" placeholder="Enter password" type="password" required>
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                </div>
                            </div>
                            <div class="mt-4"><button type="submit" class="btn btn-dark btn-block" style="font-size: 20px;">Login</button></div>
                        </form>
                        <div class="mt-4 text-left" style="font-size: 20px;">
                            <small>Not registered?</small> <a href="{{ asset('/register') }}" class="small fw-bold">Create account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection