<?php

namespace Sentosa\Components\Concerns;

trait HasLabel
{
    protected mixed $label = null;

    public function label($value): static
    {
        $this->label = $value;
        return $this;
    }

    public function getLabel()
    {
        return $this->evaluate($this->label);
    }
}
