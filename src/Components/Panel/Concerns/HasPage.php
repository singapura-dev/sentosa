<?php

namespace Sentosa\Components\Panel\Concerns;

/**
 * @method static pageTitle(string $title) Set page title to html head
 */
trait HasPage
{
    public mixed $pageTitle = null;
}
