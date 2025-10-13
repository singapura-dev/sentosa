<?php
namespace Sentosa\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetupPanel
{
    public function handle(Request $request, Closure $next, string $id = null): mixed
    {
        $panel = panel($id);
        $panel->serving();
        return $next($request);
    }
}
