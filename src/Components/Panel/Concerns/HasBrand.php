<?php

namespace Sentosa\Components\Panel\Concerns;

use Illuminate\Contracts\Support\Htmlable;
trait HasBrand
{
    protected mixed $brandName = null;
    protected mixed $brandLogo = null;

    public function brandName($name): static
    {
        $this->brandName = $name;
        return $this;
    }

    public function getBrandName(): string|Htmlable
    {
        return $this->evaluate($this->brandName) ?? config('app.name');
    }

    public function brandLogo($value): static
    {
        $this->brandLogo = $value;
        return $this;
    }

    public function getBrandLogo(): string|Htmlable
    {
        return $this->evaluate($this->brandLogo);
    }
}
