<?php


namespace Sentosa\Components\Concerns;

trait Copyable
{
    public mixed $copyable = false;

    public function copyable($copyable = true): static
    {
        $this->copyable = $copyable;
        return $this;
    }

    public function renderingCopyable()
    {
        if ($this->getCopyable()) {
            $this->withAttributes(['data-copyable' => $this->getValue()]);
        }
    }
}
