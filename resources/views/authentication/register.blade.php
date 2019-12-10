<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Picbug - Register</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('shared.authentication.style')



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('panel/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="/register">
                        @csrf

                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input id="name" type="text" class="form-control" placeholder="User Name" name="name" value="{{ old('name') }}">
                        </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation">
                                </div>
                                    {{-- <div class="checkbox">
                                        <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                                    </div> --}}
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>

                                    <div class="mt-3">
                                        @include('shared.notification.error')
                                    </div>

                                    <div class="social-login-content">
                                        <div class="social-button">
                                            <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                                            <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                                        </div>
                                    </div>
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="#"> Sign in</a></p>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('shared.authentication.script')
    @include('shared.notification.alert')
    
</body>

</html>
