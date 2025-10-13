<?php

use Sentosa\Http\Controllers\AuthController;
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
            ->name($panel->getId().'.')
            ->middleware($panel->getMiddleware())
        ->group(function () use ($panel) {
            foreach ($panel->getRoutes() as $routes) {
                $routes($panel);
            }

            Route::get('login', [AuthController::class,'login'])->name('login');
            Route::post('login', [AuthController::class,'postLogin'])->name('login.post');

            Route::middleware($panel->getAuthMiddleware())
                ->group(function () use ($panel) {
                    foreach ($panel->getAuthenticatedRoutes() as $routes) {
                        $routes($panel);
                    }

                    Route::get('logout', function () {
                        panel()->auth()->logout();
                        return back();
                    })->name('logout');

                    Route::get('/', function () {
                        return "Hello " . panel()->auth()->user()->name . '<a href="/logout">logout</a>';
                    })->name('home');
                });
        });
    }
}
