<?php
namespace Sentosa\Components\Panel\Concerns;

trait HasAuth {
    protected string $guard = '';
    protected ?string $loginUrl = null;

    public function guard(string $name): static
    {
        $this->guard = $name;
        return $this;
    }

    public function loginUrl($url): static
    {
        $this->loginUrl = $url;
        return $this;
    }

    public function getLoginUrl(): string
    {
        return $this->loginUrl ?? route($this->getId().'.login');
    }

    public function getGuard(): string
    {
        return $this->evaluate($this->guard) ?? config('auth.defaults.guard');
    }

    public function auth()
    {
        return auth()->guard($this->getGuard());
    }
}
