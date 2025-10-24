@php
    $method = $self->getMethod();
@endphp
<form action="{{$self->getAction()}}" method="{{$method != 'get' ?'post':'get'}}" {{$self->getAttributes()}}>
    @if($method != 'get')
        @method($method)
        @csrf
    @endif
    @include('sentosa::components.partials.children', [
        'children' => $self->getChildren(),
    ])
</form>
