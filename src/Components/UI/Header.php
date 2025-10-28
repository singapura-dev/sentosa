<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\ViewComponent;

class Header extends ViewComponent
{
    public mixed $view = 'sentosa::components.ui.header';

    public mixed $title = '';
    public mixed $subtitle = '';
    public mixed $right = null;

}
