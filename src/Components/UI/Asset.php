<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\ViewComponent;

class Asset extends ViewComponent
{
    use HasChildren;
    public static string $view = 'sentosa::components.ui.asset';
    public string $wrapper = '';
    public bool $closable = true;
}
