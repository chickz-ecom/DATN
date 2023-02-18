@extends('front/layout.master')


@section('title', 'Login')
    

@section('body')

        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb Section End -->

        <!-- Registry Section Begin -->
    
        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4" style="box-shadow: 1px 1px 10px rgba(0 0 0 /.7);">
                        <div class="login-form">
                            <h2 class="mt-2">Login</h2>
                            @if (session('notification'))
                                <h6 class="alert alert-warning" role="alert">
                                    {{ session('notification') }}
                                </h6>
                            @endif
                            @if (session('success'))
                            <h6 class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </h6>
                            @endif
                            @if (session('message'))
                            <h6 class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </h6>
                            @endif
                            <form action="" method="post">
                                @csrf
                                <div class="group-input">
                                    <label for="email">Email address *</label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Password *</label>
                                    <input type="password" name="password" id="pass">
                                </div>
                                <div class="group-input gi-check">
                                    <div class="gi-more">
                                        <label for="save-pass">
                                            Save password
                                            <input type="checkbox" name="" id="save-pass" name="remember">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="/account/forgetPassword" class="forget-pass">Forget your password?</a>
                                    </div>
                                </div>
                                <button type="submit" class="site-btn login-btn">Sign In</button>
                            </form>
                            <div class="switch-login mb-5">
                                <a href="/account/register" class="or-login">Or Create An Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registry Section End -->

        <!-- Partner Logo Section Begin -->
    
    @endsection