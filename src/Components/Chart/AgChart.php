<?php


namespace Sentosa\Components\Chart;

use Closure;
use Sentosa\Components\UI\Ag;

/**
 * @method static options(array|Closure $options) Set options
 */
class AgChart extends Ag
{
    public mixed $view = 'sentosa::components.chart.ag_chart';

    public static array $LANG_MAPS = [
        'zh_CN' => 'agChartsLocale.AG_CHARTS_LOCALE_ZH_CN',
        'zh_TW' => 'agChartsLocale.AG_CHARTS_LOCALE_ZH_TW',
    ];

    public function getDefaultOptions(): array
    {
        $options = [
            'container' => '{!!document.getElementById(\'' . $this->getId() . '\')!!}',
        ];
        $locale  = $this->getLocaleText();
        if ($locale) {
            $options['locale'] = [
                'localeText' => $locale
            ];
        }
        return $options;
    }
}
