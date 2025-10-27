<?php

namespace Sentosa\Pages;

use App\Models\ActivateCode;
use Sentosa\Components\UI\Button;
use Sentosa\Page;

class Dashboard extends Page
{
    public function content()
    {
        return Button::make()->label('This is a button');
    }
}
