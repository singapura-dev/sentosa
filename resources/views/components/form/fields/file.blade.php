<x-sentosa::form.fields.field :label="$self->getLabel()" :id="$self->getId()"
                              :attributes="$self->getAttributes('wrapper')">
    <input id="{{$self->getId()}}" name="{{$self->getName()}}" type="{{$self->getType()}}"
            {{$self->getAttributes()->merge(['class' => 'form-control'])}}
    >
</x-sentosa::form.fields.field>
