<?php

namespace Sentosa\Components\Table;

use Sentosa\Components\UI\Ag;

/**
 * @method static columns($columns)
 * @method static model($model)
 * @method static rows($rows)
 * @method array getColumns()
 */
class AgGrid extends Ag
{
    public mixed $view = 'sentosa::components.table.ag_grid';
    public static array $LANG_MAPS = [
        'zh_CN' => 'AG_GRID_LOCALE_CN',
        'zh_TW' => 'AG_GRID_LOCALE_TW',
    ];
    public mixed $columns = [];
    public mixed $rows = [];
    public mixed $model = null;

    public function getDefaultOptions(): array
    {
        return [
            'localeText' => $this->getLocaleText(),
            'columnDefs' => $this->getColumns(),
            'rowData'    => $this->getRows(),
        ];
    }

    public function getRows()
    {
        if (!empty($this->rows)) {
            return $this->evaluate($this->rows);
        }

        if (!empty($model = $this->model)) {
            if (is_string($model)) {
                $model = app($model)->query();
            }
            return $model->get();
        }

        return [];
    }
}
