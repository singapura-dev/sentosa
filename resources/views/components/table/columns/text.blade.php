<{{$self->getWrapper()}} {{$self->getAttributes()}}>
@if($icon = $self->getIcon())
    {!! render($icon) !!}
@endif
{!! $self->getDisplayValue() !!}
</{{$self->getWrapper()}}>
