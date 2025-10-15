<?php

namespace Sentosa\Components\Table;

use Sentosa\Components\Concerns\HasId;
use Sentosa\Components\ViewComponent;

class AgGrid extends ViewComponent
{
    public static string $view = 'sentosa::components.table.ag_grid';

    use HasId;

    public array $assets = [
        'https://cdn.jsdelivr.net/npm/ag-grid-enterprise@34.2.0/dist/ag-grid-enterprise.min.js',
        'https://cdn.jsdelivr.net/npm/@ag-grid-community/locale@34.2.0/dist/umd/@ag-grid-community/locale.min.js',
        '<script>agGrid.LicenseManager.setLicenseKey("[v3][RELEASE][0102]_NDg2Njc4MzY3MDgzNw==16d78ca762fb5d2ff740aed081e2af7b");</script>',
    ];
    public static array $LANG_MAPS = [
        'en'    => 'AG_GRID_LOCALE_EN',
        'zh_CN' => 'AG_GRID_LOCALE_CN',
        'zh_TW' => 'AG_GRID_LOCALE_TW',
    ];
    public mixed $options = [];
    public mixed $columns = [];
    public mixed $rows = [];

    public function columns($columns):static
    {
        $this->columns = $columns;
        return $this;
    }

    public function rows($rows):static
    {
        $this->rows = $rows;
        return $this;
    }

    public function getOptions(): array
    {
        if (!empty($this->options)) {
            $default_options = $this->evaluate($this->options);
        } else {
            $default_options = [];
        }

        return array_merge([
            'localeText' => $this->getLocaleText(),
            'columnDefs' => $this->getColumns(),
            'rowData'    => $this->getRows(),
        ], $default_options);
    }

    public function getRows()
    {
        return $this->evaluate($this->rows);
    }

    public function getColumns()
    {
        return $this->evaluate($this->columns);
    }

    public function getLocaleText(): string|array
    {
        if (!empty($this->locale)) {
            return $this->evaluate($this->locale);
        }
        $locale = static::$LANG_MAPS[app()->getLocale()] ?? 'AG_GRID_LOCALE_EN';
        return "{!!" . $locale . "!!}";
    }
}
