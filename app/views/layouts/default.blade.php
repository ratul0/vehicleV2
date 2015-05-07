<!doctype html >
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>Cars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/bootstrap-reset.css') }}
    {{ HTML::style('fonts/font-awesome/css/font-awesome.css') }}
    @yield('style')
    {{ HTML::script('js/jquery.js') }}
    @yield('script')

</head>
<body>
<div class="container">
@yield('content')
</div>
</body>
</html>