<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\ViewComponent;

class Button extends ViewComponent
{
    public static string $view = 'sentosa::components.ui.button';
    public mixed $label = '';

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
