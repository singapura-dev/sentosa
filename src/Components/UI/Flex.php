<?php

namespace Sentosa\Components\UI;

/**
 * @method static gap($gap)
 * @method bool getColumn()
 */
class Flex extends Container
{
    public mixed $gap = null;
    public mixed $column = false;

    public function column($column = true): static
    {
        $this->column = $column;
        return $this;
    }

    public function renderingFlex(): void
    {
        $this->class('d-flex');

        if (!empty($gap = $this->getGap())) {
            $this->class('gap-' . $gap);
        }

        if ($this->getColumn()) {
            $this->class('flex-column');
        }
    }
}
