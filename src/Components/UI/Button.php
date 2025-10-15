<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\ViewComponent;

class Button extends ViewComponent
{
    use HasChildren;

    public static string $view = 'sentosa::components.ui.button';
    public mixed $label = '';
    public mixed $wrapper = 'button';

    public function label($value): static
    {
        return $this->children($value);
    }
}
