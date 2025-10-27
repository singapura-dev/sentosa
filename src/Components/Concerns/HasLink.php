<?php

namespace Sentosa\Components\Concerns;

/**
 * @method static link($link)
 */
trait HasLink
{
    public mixed $target = '_self';
    public mixed $link = null;
}
