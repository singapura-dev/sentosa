@stack('before_html')
<!doctype html>
<html {{$htmlAttributes??''}}>
<head>
    @stack('head_meta')
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('before_styles')
    @stack('styles')
    @stack('after_styles')
</head>
<body {{$bodyAttributes??''}}>
@stack('before_body')
{{$slot}}
@stack('after_body')
@stack('before_scripts')
@stack('scripts')
@stack('after_scripts')
</body>
</html>
@stack('after_html')
