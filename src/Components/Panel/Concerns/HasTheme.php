<?php


namespace Sentosa\Components\Panel\Concerns;

trait HasTheme
{
    const string LAYOUT_DEFAULT   = 'default';
    const string LAYOUT_VERTICAL  = 'vertical';
    const string LAYOUT_CONDENSED = 'condensed';
    const string LAYOUT_COMBINED  = 'combined';

    protected ?string $_layout = null;

    public function combined()
    {
        $this->_layout = self::LAYOUT_COMBINED;
        return $this;
    }

    public function condensed(): static
    {
        $this->_layout = self::LAYOUT_CONDENSED;
        return $this;
    }

    public function vertical(): static
    {
        $this->_layout = self::LAYOUT_VERTICAL;
        return $this;
    }

    public function isVertical(): bool
    {
        return $this->_layout === self::LAYOUT_VERTICAL;
    }

    public function getLayout(): string
    {
        return $this->_layout ?: static::LAYOUT_DEFAULT;
    }

}
