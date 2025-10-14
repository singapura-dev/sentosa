<?php

namespace Sentosa\Components\UI;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Sentosa\Components\ViewComponent;

class Button extends ViewComponent
{
    public static string $view = 'sentosa::components.ui.button';
    public string|Htmlable|Closure $label = '';

    public function label($value):static
    {
        $this->label = $value;
        return $this;
    }

    public function getLabel()
    {
        return $this->evaluate($this->label);
    }
}
