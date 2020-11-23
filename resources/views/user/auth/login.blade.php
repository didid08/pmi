<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Situs Resmi PMI Lhokseumawe">
        <meta name="author" content="Technosaber">
        <link rel="shortcut icon" href="{{ asset('img/fav.png') }}" />

        <!-- Title -->
        <title>PMI Lhokseumawe | User - Login</title>
        
        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/c5f8c2ba34.js" crossorigin="anonymous"></script>

        <!-- Master CSS -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}" />

    </head>

    <body class="authentication">

        <!-- Container start -->
        <div class="container">
            
            <form method="POST" action="{{ route('user.auth.login.process') }}">
                <div class="row justify-content-md-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="login-screen">
                            <div class="login-box">
                                <a href="{{ route('user.home.dashboard') }}" class="login-logo">
                                    <img src="{{ asset('img/pmi.png') }}" alt="PMI Lhokseumawe" />
                                </a>
                                <h4 style="margin-bottom: 0.7em;">User Area - Login</h4>
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" />
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password" />

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="actions mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember_pwd" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember_pwd">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="forgot-pwd">
                                    <a class="link" href="/"><i class="fa fa-lock"></i>&nbsp;&nbsp;Reset Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!-- Container end -->

    </body>
</html>