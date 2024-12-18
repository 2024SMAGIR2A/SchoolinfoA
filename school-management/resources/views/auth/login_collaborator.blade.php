<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $comapny = \App\Models\Company::first();
    @endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SchoolMG | Connexion</title>
    <link rel="icon" href="{{ !empty($comapny->logo) ? url('images/companies/logos/'.$comapny->logo): url('images/companies/logo_default_image.jpg') }}" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="
                {{ route('login') }}
                 " class="h1"><b> SchoolMG </b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Connexion</p>
        
                <form method="POST" action="
                {{ route('collaborator.login') }}
                 ">
                @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            {{-- <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                Remember Me
                                </label>
                            </div> --}}
                        </div><!-- /.col -->
                        
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        </div><!-- /.col -->
                        
                    </div>
                </form>
        
                <div class="social-auth-links text-center mt-2 mb-3">
                
                </div><!-- /.social-auth-links -->
        
                <p class="mb-1">
                    <a href="
                    {{--  {{ route('collaborator.password.request') }}  --}}
                     ">J'ai oublié mon mot de passe</a>
                </p>
                
                
                </div><!-- /.card-body -->
            </div><!-- /.card -->
    </div><!-- /.login-box -->
    

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
