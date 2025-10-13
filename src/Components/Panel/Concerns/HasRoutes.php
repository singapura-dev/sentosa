<?php

namespace Sentosa\Components\Panel\Concerns;

use Sentosa\Http\Middleware\SetupPanel;

trait HasRoutes
{
    protected array $middleware = [];
    protected string $path = '';
    protected array $domains = [];

    public function path($path): static
    {
        $this->path = $path;
        return $this;
    }

    public function domains($domains):static
    {
        $domains = is_array($domains) ? $domains : [$domains];
        $this->domains = [
            ...$this->domains,
            ...$domains,
        ];
        return $this;
    }

    public function getDomains():array
    {
        return $this->domains;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function middleware($middleware): static
    {
        $middleware = is_array($middleware) ? $middleware : [$middleware];
        $this->middleware = [
            ...$this->middleware,
            ...$middleware,
        ];

        return $this;
    }

    public function getMiddleware(): array
    {
        return [
            SetupPanel::class.":{$this->getId()}",
            ...$this->middleware,
        ];
    }
}
