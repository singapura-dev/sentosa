<?php

namespace Sentosa\Components\Concerns;

use Sentosa\Components\UI\Icon;

trait HasIcon
{
    protected mixed $icon = '';
    protected mixed $icon_position = 'before';

    public function icon($value): static
    {
        $this->icon  = $value;
        return $this;
    }

    public function getIcon()
    {
        if(empty($this->icon)) {
            return  null;
        }
        $icon = $this->evaluate($this->icon);

        $component = Icon::make();
        $component->class($icon);
        return $component;
    }
}
