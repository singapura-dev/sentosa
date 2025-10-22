<?php

namespace Sentosa\Components\Panel\Concerns;

/**
 * @method static guard($guard)
 */
trait HasAuth
{
    public ?string $guard = null;
    protected bool $hasLogin = true;
    protected ?string $loginUrl = null;

    public function loginUrl($url): static
    {
        $this->loginUrl = $url;
        return $this;
    }

    public function getLoginUrl(): string
    {
        return $this->loginUrl ?? route($this->getId() . '.auth.login');
    }

    public function disableLogin(): static
    {
        $this->hasLogin = false;
        return $this;
    }

    public function hasLogin(): bool
    {
        return $this->hasLogin;
    }

    public function auth()
    {
        return auth()->guard($this->getGuard());
    }

    public function getGuard(): string
    {
        return $this->guard ?: config('auth.defaults.guard');
    }
}
