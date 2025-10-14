<?php

use Sentosa\Components\Panel\Panel;
use Sentosa\Components\UI\Button;
use Sentosa\Http\Controllers\AuthController;
use Sentosa\PanelManager;

foreach (app(PanelManager::class)->getPanels() as $panel) {
    /**
     * @var Sentosa\Components\Panel\Panel $panel
     */
    $domains = $panel->getDomains();
    foreach ((empty($domains) ? [null] : $domains) as $domain) {
        Route::prefix($panel->getPath())
            ->domain($domain)
            ->name($panel->getId() . '.')
            ->middleware($panel->getMiddleware())
            ->group(function () use ($panel) {
                foreach ($panel->getRoutes() as $routes) {
                    $routes($panel);
                }

                if ($panel->hasLogin()) {
                    Route::name('auth.')->group(function () {
                        Route::get('login', [AuthController::class, 'login'])->name('login');
                        Route::post('login', [AuthController::class, 'postLogin'])->name('login.post');
                    });
                }

                Route::middleware($panel->getAuthMiddleware())
                    ->group(function () use ($panel) {
                        foreach ($panel->getAuthenticatedRoutes() as $routes) {
                            $routes($panel);
                        }

                        if ($panel->hasLogin()) {
                            Route::get('logout', function () {
                                panel()->auth()->logout();
                                return back();
                            })->name('auth.logout');
                        }

                        Route::get('/', function () {
                            return panel()
                                ->children('Title', Panel::CHILDREN_POSITION_HEADER)
                                ->children('This is home, can edit by set panel()->homeUrl($your_home_url)')
                                ->children(Button::make()->label("Click")->class('btn btn-primary'))
                                ->render();
                        })->name('home');
                    });
            });
    }
}
