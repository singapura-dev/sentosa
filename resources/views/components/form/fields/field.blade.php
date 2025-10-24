@props([
    'label' => null,
    'id' => null,
    'attributes' => null,
])
<div {{$attributes}}>
    @if(!empty($label))
        <label class="form-label" for="{{$id}}">{{$label}}</label>
    @endif
    {{$slot}}
</div>
