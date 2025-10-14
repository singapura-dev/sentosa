<?php

namespace Sentosa\Components\Concerns;

trait Makeable
{
    public static function make(...$parameters): static
    {
        return new static(...$parameters);
    }
}
