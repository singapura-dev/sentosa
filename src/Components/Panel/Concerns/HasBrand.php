<?php

namespace Sentosa\Components\Panel\Concerns;

use Illuminate\Contracts\Support\Htmlable;

trait HasBrand
{
    public mixed $brandName = null;
    public mixed $brandLogo = null;

    public function getBrandName(): string|Htmlable
    {
        return $this->evaluate($this->brandName) ?? config('app.name');
    }
}
