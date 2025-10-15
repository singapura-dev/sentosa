@php
    $id = $self->getId() ?? 'ag_grid_'.uniqid();
    $language_map = [
        'en' => 'AG_GRID_LOCALE_EN',
        'zh_CN' => 'AG_GRID_LOCALE_CN',
        'zh_TW' => 'AG_GRID_LOCALE_TW',
    ];
    $rows = $self->getRows();
    $columns = $self->getColumns();
    $options = $self->getOptions();
@endphp
<div id="{{$id}}" {{$self->getAttributes()}}></div>

@push('after_scripts')
    <script>
        (function () {
            let gridApi = agGrid.createGrid(document.querySelector('#{{$id}}'), {!! to_string($options) !!});
        })();
    </script>
@endpush
