<?php

namespace Sentosa\Pages;

use Sentosa\Components\UI\Button;
use Sentosa\Page;

class Dashboard extends Page
{
    public function content()
    {
        return Button::make()->label('This is a button');
    }
}
