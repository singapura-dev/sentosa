@foreach($children as $chilld)
    {!! render($chilld, $context ?? []) !!}
@endforeach
