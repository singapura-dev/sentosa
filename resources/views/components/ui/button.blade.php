<{{$self->wrapper}} {{$self->getAttributes()}}>
@if($icon = $self->getIcon())
{!! render($icon) !!}
@endif
{!! render($self->getLabel()) !!}
</{{$self->wrapper}}>
