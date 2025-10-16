<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\HasId;
use Sentosa\Components\ViewComponent;

abstract class Ag extends ViewComponent
{
    use HasId;

    public array $assets = [
        'https://cdn.jsdelivr.net/npm/ag-grid-enterprise@34.2.0/dist/ag-grid-enterprise.min.js',
        'https://cdn.jsdelivr.net/npm/@ag-grid-community/locale@34.2.0/dist/umd/@ag-grid-community/locale.min.js',
        'https://cdn.jsdelivr.net/npm/ag-charts-enterprise@12.2.0/dist/umd/ag-charts-enterprise.min.js',
        'https://cdn.jsdelivr.net/npm/ag-charts-locale@12.2.0/dist/umd/ag-charts-locale.min.js',
        '<script>agGrid.LicenseManager.setLicenseKey("[v3][RELEASE][0102]_NDg2Njc4MzY3MDgzNw==16d78ca762fb5d2ff740aed081e2af7b");</script>',
        '<script>agGrid.ModuleRegistry.registerModules([ agGrid.ClientSideRowModelModule, agGrid.IntegratedChartsModule.with(agCharts.AgChartsEnterpriseModule) ]);</script>',
    ];
    public mixed $locale = null;
    public mixed $options = [];

    public function getLocaleText(): ?string
    {
        if (!empty($this->locale)) {
            return $this->evaluate($this->locale);
        }
        $locale = static::$LANG_MAPS[app()->getLocale()] ?? null;
        if(empty($locale)) {
            return null;
        }
        return "{!!" . $locale . "!!}";
    }

    public function getOptions(): array
    {
        return array_merge(
            $this->getDefaultOptions(),
            $this->evaluate($this->options)
        );
    }

    public function getDefaultOptions():array
    {
        return [
            'localeText' => $this->getLocaleText(),
        ];
    }
}
