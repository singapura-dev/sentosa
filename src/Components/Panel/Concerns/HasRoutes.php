<?php

namespace Sentosa\Components\Panel\Concerns;

use Closure;
use Illuminate\Support\Str;
use Laravel\SerializableClosure\Serializers\Native;
use Sentosa\Http\Middleware\SetupPanel;
use Sentosa\Pages\Dashboard;

/**
 * @method static dashboard($dashboard)
 * @method static brandLogo($brandLogo)
 * @method static path($value)
 * @method static homeUrl($value)
 * @method string getHomeUrl($value)
 */
trait HasRoutes
{
    /**
     * @var array<Closure | Native>
     */
    public array $routes = [];

    /**
     * @var array<Closure | Native>
     */
    public array $authenticatedRoutes = [];

    public array $middleware = [];

    public array $authMiddleware = [];

    public mixed $path = '';

    public mixed $homeUrl = '';

    public mixed $dashboard = Dashboard::class;

    public array $domains = [];

    public function domains($domains): static
    {
        $domains       = is_array($domains) ? $domains : [$domains];
        $this->domains = [
            ...$this->domains,
            ...$domains,
        ];
        return $this;
    }

    public function routes(?Closure $routes): static
    {
        $this->routes[] = $routes;

        return $this;
    }

    public function authenticatedRoutes(?Closure $routes): static
    {
        $this->authenticatedRoutes[] = $routes;

        return $this;
    }

    public function route($name, ...$args)
    {
        if (Str::isUrl($name)) {
            return $name;
        }

        $route_name = $name;

        $as = $this->getId() . '.';

        if (!Str::startsWith($route_name, $as)) {
            $route_name = $as . $route_name;
        }

        return route($route_name, ...$args);
    }

    public function middleware($middleware): static
    {
        $middleware       = is_array($middleware) ? $middleware : [$middleware];
        $this->middleware = [
            ...$this->middleware,
            ...$middleware,
        ];

        return $this;
    }

    public function authMiddleware($middleware): static
    {
        $middleware           = is_array($middleware) ? $middleware : [$middleware];
        $this->authMiddleware = [
            ...$this->authMiddleware,
            ...$middleware,
        ];

        return $this;
    }

    public function getMiddleware(): array
    {
        return [
            SetupPanel::class . ":{$this->getId()}",
            ...config('sentosa.middlewares'),
            ...$this->middleware,
        ];
    }

    public function getAuthMiddleware(): array
    {
        return [
            ...config('sentosa.auth_middlewares'),
            ...$this->authMiddleware,
        ];
    }
}
