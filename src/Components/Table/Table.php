<?php

namespace Sentosa\Components\Table;

use Sentosa\Components\Table\Columns\Column;
use Sentosa\Components\Table\Columns\TextColumn;
use Sentosa\Components\ViewComponent;

/**
 * @method static columns($columns)
 * @method static options($options)
 */
class Table extends ViewComponent
{
    public static string $view = 'sentosa::components.table.table';
    public mixed $columns = [];

    public mixed $rows = [];

    public mixed $options = [];

    protected function renderingTable()
    {
        if (is_string($this->rows)) {
            $this->rows = $this->rows::query();
        }

        if (is_object($this->rows) && method_exists($this->rows, 'get')) {
            if (request('sort_by')) {
                $this->rows->orderBy(request('sort_by'), request('sort_type', 'asc'));
            }
            $this->rows = $this->rows->get();
        }

        // build columns
        $columns = [];
        foreach ($this->getColumns() as $column) {
            $columns[] = $this->getColumn($column);
        }
        $this->columns = $columns;
    }

    public function getColumn($column, $row = null)
    {
        $type = $column['type'] ?? TextColumn::class;

        $default       = $this->options['columns_default'] ?? [];
        $column_define = array_merge($default, $column);
        /**
         * @var Column $type
         */
        return $type::make($column_define)->row($row);
    }

    public function getSortIcon($field)
    {
        $current_sort_by   = request()->get('sort_by');
        $current_sort_type = request()->get('sort_type');
        if ($current_sort_by == $field) {
            if ($current_sort_type == 'desc') {
                return 'ti ti-sort-descending';
            }
            return 'ti ti-sort-ascending';
        }
        return 'ti ti-arrows-sort';
    }

    public function getSortLink($field)
    {
        $current_sort_by   = request()->get('sort_by');
        $current_sort_type = request()->get('sort_type');
        if ($current_sort_by == $field) {
            if ($current_sort_type == 'desc') {
                return '?sort_by=' . $field . '&sort_type=asc';
            }
        }
        return '?sort_by=' . $field . '&sort_type=desc';
    }
}
