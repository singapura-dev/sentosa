<?php
namespace Sentosa;

use Illuminate\Support\ServiceProvider;

class SentosaServiceProvider extends ServiceProvider
{
    public function register():void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'sentosa');

        $this->app->scoped(PanelManager::class, function() {
            return new PanelManager();
        });
    }

    public function boot():void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sentosa');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
