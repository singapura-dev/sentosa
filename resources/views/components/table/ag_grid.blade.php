@php
    $id = $self->getId();
    $rows = $self->getRows();
    $columns = $self->getColumns();
    $options = $self->getOptions();
@endphp
<div id="{{$id}}" {{$self->getAttributes()}}></div>

@push('after_scripts')
    <script>
        (function () {
            agGrid.createGrid(document.querySelector('#{{$id}}'), {!! to_string($options) !!});
        })();
    </script>
@endpush
