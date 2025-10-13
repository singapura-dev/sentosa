<?php

use Sentosa\PanelManager;

foreach (app(PanelManager::class)->getPanels() as $panel)
{
    /**
     * @var Sentosa\Components\Panel\Panel $panel
     */
    $domains = $panel->getDomains();
    foreach ((empty($domains) ? [null] : $domains) as $domain) {
        Route::prefix($panel->getPath())
            ->domain($domain)
            ->middleware($panel->getMiddleware())
        ->group(function () use ($panel) {
            Route::get('login', function () {
                return 'Login :' . panel()->getId();
            });
        });
    }
}
