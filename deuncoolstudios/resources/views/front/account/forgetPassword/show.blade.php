@extends('front/layout.master')


@section('title', 'Reset Password')
    

@section('body')
    
        <!-- Breadcrumb Section Begin  -->

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="/"><i class="fa fa-home"></i>Home</a>
                            <span>Register</span>
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
                            <h2 class="mt-2">Reset Password</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="p-0 m-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('error'))
                                <h6 class="alert alert-danger">{{ session('error') }}</h6>
                            @endif
                            <form action="account/resetPassword" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}" id="">
                                <div class="group-input">
                                    <label for="email">Email address *</label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="group-input">
                                    <label for="pass">New Password *</label>
                                    <input type="password" name="password" id="pass">
                                </div>
                                <div class="group-input">
                                    <label for="con-pass">Comfirm Password *</label>
                                    <input type="password" name="password_confirmation" id="con-pass">
                                </div>
                                <button type="submit" class="site-btn register-btn mb-5">Reset Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Registry Section End -->
    
@endsection