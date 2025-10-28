<?php

namespace Sentosa\Components\Table\Columns;

class ImageColumn extends Column
{
    public mixed $view = 'sentosa::components.table.columns.image';
    public mixed $width = null;
    public mixed $height = null;
    public mixed $size = 24;

    public function getHeight()
    {
        return $this->height ?: $this->size;
    }

    public function getWidth()
    {
        return $this->width ?: $this->size;
    }
}
