<?php

namespace Sentosa\Components\Panel\Concerns;

use Illuminate\Contracts\Support\Htmlable;

trait HasBrand
{
    protected mixed $brandName = null;

    public function brandName($name): static
    {
        $this->brandName = $name;
        return $this;
    }

    public function getBrandName(): string|Htmlable
    {
        return $this->evaluate($this->brandName) ?? config('app.name');
    }
}
