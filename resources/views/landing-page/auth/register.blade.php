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
                            <h6 class="h3 mb-1" style="font-size: 40px;">Register</h6>
                        </div><span class="clearfix"></span>

                        @include('landing-page.layout.alert')
                        
                        <form class="form-validate" autocomplete="on" method="post" action="{{ asset('/register-action') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" style="font-size: 20px;">Email address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <span class="input-group-text"><i class="icon-mail"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="name" style="font-size: 20px;">Full name</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" placeholder="Name" required>
                                            <span class="input-group-text"><i class="icon-user-check"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="no_telp" style="font-size: 20px;">Phone number</label>
                                        <div class="input-group">
                                            <input type="numeric" class="form-control" name="no_telp" placeholder="Phone number" required>
                                            <span class="input-group-text"><i class="icon-phone"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" style="font-size: 20px;">Password</label>
                                <div class="input-group show-hide-password">
                                    <input class="form-control" name="password" placeholder="Password" type="password" required>
                                    <span class="input-group-text"><i class="icon-eye-off" aria-hidden="true" style="cursor: pointer;"></i></span>
                                </div>
                            </div>
                            <div class="mt-4"><button type="submit" class="btn btn-dark btn-block" style="font-size: 20px;">Register</button></div>
                        </form>
                        <div class="mt-4 text-left" style="font-size: 20px;">
                            <small>Have an account?</small> <a href="{{ asset('/login') }}" class="small fw-bold">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection