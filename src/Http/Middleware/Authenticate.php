<?php
namespace Sentosa\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards): void
    {
        $guard = panel()->auth();

        if (! $guard->check()) {
            $this->unauthenticated($request, $guards);
        }

        $this->auth->shouldUse(panel()->getGuard());
    }

    protected function redirectTo($request): ?string
    {
        return panel()->getLoginUrl();
    }
}
