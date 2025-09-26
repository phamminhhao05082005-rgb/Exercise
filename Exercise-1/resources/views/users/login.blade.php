@extends('layouts.app')

@section('content')
<main class="main-content mt-0">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <!-- Form đăng nhập -->
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Enter your username and password to sign in</p>
                            </div>
                            <div class="card-body">
                                @if(session('error'))
                                    <div class="text-danger mb-3">{{ session('error') }}</div>
                                @endif
                                @if(isset($success))
                                    <div class="text-success font-weight-bold mb-3">{{ $success }}</div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" role="form">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign In</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="{{ route('login') }}" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Background hình ảnh Argon -->
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                            <span class="mask bg-gradient-primary opacity-6"></span>
                            <h4 class="mt-5 text-white font-weight-bolder position-relative">"Attention is the new currency"</h4>
                            <p class="text-white position-relative">The more effortless the writing looks, the more effort the writer actually put into the process.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>
@endsection
