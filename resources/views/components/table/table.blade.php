@php
    $rows = $self->getRows();
@endphp
<div {{$self->getAttributes('wrapper')->merge(['class' => 'table-responsive'])}}>
    <table {{$self->getAttributes()->merge(['class' => 'table'])}}>
        <thead>
        @foreach($self->getColumns() as $column)
            <th>
                @if($column->getSortable())
                    <a href="{{$self->getSortLink($column->getField())}}"
                       class="d-flex justify-content-between align-items-center sort-link "
                       data-field="{{$column->getField()}}">
                        {{$column->getLabel() ?? $column->getField()}}
                        <i class="{{$self->getSortIcon($column->getField())}}"></i>
                    </a>
                @else
                    {{$column->getLabel() ?? $column->getField()}}
                @endif
            </th>
        @endforeach
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                @foreach($self->getColumns() as $column)
                    <td>
                        @php
                            $column->row($row);
                        @endphp
                        {!! render($column) !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
    @if(is_object($rows) && method_exists($rows, 'links'))
        <div {{$self->getAttributes('pagination')->merge(['class' => 'mt-3'])}}>
            {{$rows->appends(request()->except('page'))->links()}}
        </div>
    @endif
</div>
