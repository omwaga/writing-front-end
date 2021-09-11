<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }

        .btn-primary {
            background-color: #337ab7;
            border-color: #2e6da4;
            border-radius: 8px;
            padding: 8px 16px;
            margin-top:  8px;
        }

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <form method="POST" action="{{ route('captcha.submit') }}" id="demo-form" name="demo-form">
            @csrf
            <div class="g-recaptcha" data-sitekey="{{config('app.site_key')}}"></div>

            <button class="g-recaptcha btn btn-primary"
                    type="submit">Submit</button>
        </form>
        @if(Session::has('payload'))
            <div class="mt-3 alert alert-primary" role="alert">
                <h5>{{ Session::get('payload')}}</h5>
            </div>
            {{ Session::forget('payload') }}
        @endif
    </div>
</div>
</body>
</html>
