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
    <title>Picbug - Login</title>
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
                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                                <div class="checkbox">
{{--                                    <label>--}}
{{--                                <input type="checkbox"> Remember Me--}}
{{--                            </label>--}}
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>

                                <div class="mt-3">
                                    @include('shared.notification.error')
                                </div>


                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="/register"> Sign Up Here</a></p>
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
