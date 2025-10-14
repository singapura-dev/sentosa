<?php

namespace Sentosa\Components\Panel\Concerns;

use Closure;
use Illuminate\Support\Str;
use Laravel\SerializableClosure\Serializers\Native;
use Sentosa\Http\Middleware\SetupPanel;

trait HasRoutes
{
    /**
     * @var array<Closure | Native>
     */
    protected array $routes = [];

    /**
     * @var array<Closure | Native>
     */
    protected array $authenticatedRoutes = [];

    protected array $middleware = [];
    protected array $authMiddleware = [];
    protected string $path = '';

    protected string|Closure $homeUrl = '';
    protected array $domains = [];

    public function path($path): static
    {
        $this->path = $path;
        return $this;
    }

    public function homeUrl($url):static
    {
        $this->homeUrl = $url;
        return $this;
    }

    public function getHomeUrl():string
    {
        return $this->evaluate($this->homeUrl);
    }

    public function domains($domains): static
    {
        $domains       = is_array($domains) ? $domains : [$domains];
        $this->domains = [
            ...$this->domains,
            ...$domains,
        ];
        return $this;
    }

    public function getDomains(): array
    {
        return $this->domains;
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

    /**
     * @return array<Closure | Native>
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function route($name,...$args)
    {
        if (Str::isUrl($name)) {
            return $name;
        }

        $route_name = $name;

        $as = $this->getId(). '.';

        if (!Str::startsWith($route_name, $as)) {
            $route_name = $as . $route_name;
        }

        return route($route_name, ...$args);
    }

    /**
     * @return array<Closure | Native>
     */
    public function getAuthenticatedRoutes(): array
    {
        return $this->authenticatedRoutes;
    }

    public function getPath(): string
    {
        return $this->path;
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
