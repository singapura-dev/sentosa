<?php
namespace Sentosa\Components\Panel\Concerns;

trait HasAuth {
    protected ?string $guard = null;
    protected bool $hasLogin = true;
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
        return $this->loginUrl ?? route($this->getId().'.auth.login');
    }

    public function getGuard(): string
    {
        return  $this->guard ?: config('auth.defaults.guard');
    }

    public function disableLogin(): static
    {
        $this->hasLogin = false;
        return $this;
    }

    public function hasLogin():bool
    {
        return $this->hasLogin;
    }

    public function auth()
    {
        return auth()->guard($this->getGuard());
    }
}
