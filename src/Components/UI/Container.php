<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\ViewComponent;

class Container extends ViewComponent
{
    use HasChildren;

    public static string $view = 'sentosa::components.ui.container';
    public mixed $wrapper = 'div';

    public function flex(): static
    {
        return $this->class('d-flex');
    }
}
