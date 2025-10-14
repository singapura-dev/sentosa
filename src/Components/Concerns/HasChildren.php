<?php

namespace Sentosa\Components\Concerns;

trait HasChildren
{
    const string CHILDREN_POSITION_DEFAULT = 'default';

    protected array $_children = [];

    public function children($children, $position = null): static
    {
        $position = $position ?? static::CHILDREN_POSITION_DEFAULT;
        if (empty($this->_children[$position])) {
            $this->_children[$position] = [];
        }
        $children = is_array($children) ? $children : [$children];
        $this->_children[$position] = array_merge($this->_children[$position], $children);
        return $this;
    }

    public function getChildren($position = null): array
    {
        $position = $position ?? static::CHILDREN_POSITION_DEFAULT;
        return $this->_children[$position] ?? [];
    }
}
