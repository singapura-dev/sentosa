<?php

namespace Sentosa\Components\Table\Columns;

use Sentosa\Components\Concerns\Copyable;
use Sentosa\Components\Concerns\HasIcon;
use Sentosa\Components\Concerns\HasLink;

class TextColumn extends Column
{
    use HasLink;
    use HasIcon;
    use Copyable;

    public static string $view = 'sentosa::components.table.columns.text';
    public mixed $wrapper = 'span';

    public function renderingTextColumn()
    {
        if ($link = $this->getLink()) {
            $this->wrapper = 'a';
            $this->withAttributes(['href' => $link]);
            if ($target = $this->getTarget()) {
                $this->withAttributes(['target' => $target]);
            }
        }
    }
}
