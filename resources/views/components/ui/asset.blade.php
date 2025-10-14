<{{$self->wrapper}} {{$self->getAttributes()}} @if($self->closable)>
@include('sentosa::components.partials.children', [
    'children' => $self->getChildren(),
])
@else
/>
@endif

@if($self->closable)
    </{{$self->wrapper}}>
@endif
