<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('site.Reset password') }}</title>
</head>
<body>

    <h1>{{__('site.Go to the link below to reset your password')}}: </h1>
    <a href="{{route('password.reset',['token'=>$token])}}">{{ __('site.Reset password') }}</a>
</body>
</html>
