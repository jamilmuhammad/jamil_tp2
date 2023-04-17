<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="jamilmuhammad" content="">

    <title>Muhammad Jamil_TP 2</title>

    <link rel="icon" href="{{ asset('img/logo_icon.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('scss/sb-admin-2.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
    <section class="login-page">

    <!-- Begin Page Content -->
        <div class="container-fluid login-warp">
            <div class="row justify-content-center align-items-center pt-xl-5 mt-lg-0">

                <div class="col-md-6 login-left" style="z-index: 1">
                    <div class="login-title text-center mx-auto">
                        <h2 style="color: #101010;">Log In</h2>
                        <hr class="my-2" style="width: 180px; border: 3px solid #D8160E; border-radius: 5px; height: 0px;">
                        <p style="font-size: 14px; color: #101010;"><strong>Stay logged in to access more features</strong></p>
                    </div>

                    <form class="login-form mx-auto pt-3" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        @if(session()->has('message'))
                        <div class="card border-left-warning shadow mb-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <h3 class="h6 mb-0 text-primary"><strong>{{ session()->get('message') }}</strong></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-times fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="exampleInputEmail1"><strong>Email</strong></label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small>{{ $errors->first('email') }}</small>
                        </div>

                        <div class="form-group pt-3">
                            <label for="exampleInputPassword1"><strong>Password</strong></label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Password" name="password" required autocomplete="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <div class="checkbox checkbox-primary">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                    <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                </div>
                            </div>
                            <div>
                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}"><small class="form-text" style="color: #101010;"><strong>Forgot your password?</strong></small></a>
                            @endif --}}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block login-button">LOGIN</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="login-image">
                        <img src="{{ asset('img/login/image4.png') }}" alt="Login page">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        
         <!-- background -->
        <div class="bg bg-1"><img src="{{ asset('img/login/bg1.png') }}" alt=""></div>

    </section>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    @yield('script')

</body>

</html>