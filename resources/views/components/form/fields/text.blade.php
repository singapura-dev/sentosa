<x-sentosa::form.fields.field :label="$self->getLabel()" :id="$self->getId()"
                              :attributes="$self->getAttributes('wrapper')">
    <input id="{{$self->getId()}}" name="{{$self->getName()}}" type="{{$self->getType()}}"
           placeholder="{{$self->getPlaceholder()}}"
           value="{{$self->getValue()}}"
            {{$self->getAttributes()->merge(['class' => 'form-control'])}}
    >
</x-sentosa::form.fields.field>
