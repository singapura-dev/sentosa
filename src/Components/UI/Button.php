<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\AsButton;
use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\Concerns\HasIcon;
use Sentosa\Components\Concerns\HasLabel;
use Sentosa\Components\ViewComponent;

class Button extends ViewComponent
{
    use AsButton;
    use HasChildren;
    use HasLabel;
    use HasIcon;

    public static string $view = 'sentosa::components.ui.button';
    public mixed $wrapper = 'button';
}
