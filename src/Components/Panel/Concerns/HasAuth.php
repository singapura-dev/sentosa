<?php
namespace Sentosa\Components\Panel\Concerns;

trait HasAuth {
    protected string $guard = '';

    public function guard(string $name): static
    {
        $this->guard = $name;
        return $this;
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
