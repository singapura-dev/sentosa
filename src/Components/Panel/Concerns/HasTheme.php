<?php


namespace Sentosa\Components\Panel\Concerns;

trait HasTheme
{
    const string LAYOUT_DEFAULT  = 'default';
    const string LAYOUT_VERTICAL = 'vertical';

    protected string $_layout = 'default';

    public function vertical($vertical = true): static
    {
        if ($vertical) {
            $this->_layout = self::LAYOUT_VERTICAL;
        } else {
            $this->_layout = self::LAYOUT_DEFAULT;
        }
        return $this;
    }

    public function isVertical(): bool
    {
        return $this->_layout === self::LAYOUT_VERTICAL;
    }

}
