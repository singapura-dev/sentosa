<img src="{{$self->getValue()}}" {{$self->getAttributes()}}
@if($width = $self->getWidth()) width="{{$width}}" @endif
@if($height = $self->getHeight()) height="{{$height}}" @endif
>
