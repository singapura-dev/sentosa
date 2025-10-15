<?php

namespace Sentosa;

abstract class Page
{
    abstract public function content();

    public function __invoke()
    {
        return panel()->children($this->content())->render();
    }
}
