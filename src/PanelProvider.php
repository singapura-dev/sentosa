<?php

namespace Sentosa;

use Illuminate\Support\ServiceProvider;
use Sentosa\Components\Panel\Panel;

abstract class PanelProvider extends ServiceProvider
{
    public function register(): void
    {
        app()->resolving(
            PanelManager::class,
            fn($manager) => $manager->registerPanel($this->panel(Panel::make())),
        );
    }

    abstract public function panel(Panel $panel): Panel;
}
