<{{$self->wrapper}} {{$self->getAttributes()}}>
@include('sentosa::components.partials.children',[
    'children' => $self->getChildren()
])
</{{$self->wrapper}}>
