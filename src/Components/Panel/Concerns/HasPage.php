<?php

namespace Sentosa\Components\Panel\Concerns;

trait HasPage
{
    protected mixed $pageTitle = null;
    public function pageTitle($name): static
    {
        $this->pageTitle = $name;
        return $this;
    }

    public function getPageTitle(): ?string
    {
        return $this->evaluate($this->pageTitle);
    }
}
