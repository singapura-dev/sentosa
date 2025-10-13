<?php
namespace Sentosa\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Sentosa\PanelManager;

class SetupPanel
{
    public function handle(Request $request, Closure $next, string $id = null): mixed
    {
        $panel = panel($id);
        app(PanelManager::class)->setCurrentPanel($id);
        $panel->serving();
        return $next($request);
    }
}
