<?php

namespace Sentosa\Components\Concerns;

use LogicException;

trait HasId
{
    protected string $id;

    public function id(string $id): static
    {
        if (isset($this->id)) {
            throw new LogicException("The component has already been registered with the ID [{$this->id}].");
        }

        $this->id = $id;
        return $this;
    }

    public function getId(): string
    {
        if (! isset($this->id)) {
            return 'default';
        }

        return $this->id;
    }
}
