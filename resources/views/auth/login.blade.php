@extends('frontend.master')
@section('content')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="/backend/app-assets/images/pages/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            @if(Session::has('message'))
                             <p class="alert alert-info">
                             {{Session::get('message')}}
                             </p>

                            @endif
                            <hr>
                        <hr>
                                <h2 class="card-title font-weight-bold mb-1">Welcome to Oreland library management system! 👋</h2>
                                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                           
                         
                               
                             <form class="auth-login-form mt-2" action="{{isset($guard)? url($guard.'/login') : route('login') }}" method="POST">
                                @csrf
                              
                               
                                    <div class="form-group">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                        
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between">
                                            <label for="login-password">Password</label><a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                                             @if (Route::has('password.request'))
                   
                                          </a>
                                           @endif
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" required autocomplete="current-password" tabindex="2" />
                                          
                                            

                                            <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="remember_me" name="remember"  type="checkbox" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                            
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                             </form>
                                
                                <p class="text-center mt-2"><span>New on our platform?</span><a href="page-auth-register-v2.html"><span>&nbsp;Create an account</span></a></p>
                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-facebook" href="javascript:void(0)"><i data-feather="facebook"></i></a><a class="btn btn-twitter white" href="javascript:void(0)"><i data-feather="twitter"></i></a><a class="btn btn-google" href="javascript:void(0)"><i data-feather="mail"></i></a><a class="btn btn-github" href="javascript:void(0)"><i data-feather="github"></i></a></div>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
@endsection
