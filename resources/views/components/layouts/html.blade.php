<!doctype html>
<html {{$htmlAttributes??''}}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ??''}}</title>
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_BEFORE_STYLE),
    ])
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_STYLE),
    ])
    @include('sentosa::components.partials.children', [
        'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_AFTER_STYLE),
    ])
</head>
<body>
{{$slot}}
@include('sentosa::components.partials.children', [
    'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_BEFORE_SCRIPT),
])
@include('sentosa::components.partials.children', [
    'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_SCRIPT),
])
@include('sentosa::components.partials.children', [
    'children' => panel()->getChildren(\Sentosa\Components\Panel\Panel::CHILDREN_POSITION_AFTER_SCRIPT),
])
</body>
</html>
