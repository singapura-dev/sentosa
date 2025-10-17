<?php

namespace Sentosa\Components\Concerns;

/**
 * @method static color($color)
 * @method static size($size)
 * @method string getColor()
 * @method string getSize()
 * @method string getType()
 * @method string getShape()
 */
trait AsButton
{
    public mixed $size = null;
    public mixed $color = null;
    public mixed $type = null;
    public mixed $outline = null;
    public mixed $ghost = false;
    public mixed $shape = null;

    public function square(): static
    {
        $this->shape = 'square';
        return $this;
    }

    public function pill(): static
    {
        $this->shape = 'pill';
        return $this;
    }

    public function primary(): static
    {
        $this->color('primary');
        return $this;
    }

    public function secondary(): static
    {
        $this->color('secondary');
        return $this;
    }

    public function success(): static
    {
        $this->color('success');
        return $this;
    }

    public function danger(): static
    {
        $this->color('danger');
        return $this;
    }

    public function small(): static
    {
        return $this->size('sm');
    }

    public function medium(): static
    {
        return $this->size('md');
    }

    public function large(): static
    {
        return $this->size('lg');
    }

    public function ghost($value = true): static
    {
        $this->ghost = $value;
        return $this;
    }

    public function outline($value = true): static
    {
        $this->outline = $value;
        return $this;
    }

    public function renderingAsButton(): void
    {
        $this->class('btn');
        if (!empty($this->size)) {
            $this->class('btn-' . $this->getSize());
        }

        if (!empty($this->color)) {
            $this->class('btn-' . $this->getColor());
        }

        if (!empty($this->shape)) {
            $this->class('btn-' . $this->getShape());
        }

        if ($this->ghost) {
            $this->class('btn-ghost');
        }

        if ($this->outline) {
            $this->class('btn-outline');
        }

        if (!empty($this->tyoe)) {
            $this->withAttributes(['type' => $this->getType()]);
        }

    }
}
