<?php

namespace Sentosa\Components\Concerns;

trait HasLink
{
    protected mixed $target = '_self';
    protected mixed $link = null;

    public function link($value): static
    {
        $this->link = $value;
        return $this;
    }

    public function getLink()
    {
        return $this->evaluate($this->link);
    }
}
