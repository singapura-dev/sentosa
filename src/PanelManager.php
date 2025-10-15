<?php

namespace Sentosa;

use LogicException;
use Sentosa\Components\Panel\Panel;

class PanelManager
{
    protected array $panels = [];

    protected string $currentPanelId = '';
    protected string $defaultPanelId = '';

    public function getPanels(): array
    {
        return $this->panels;
    }

    public function setCurrentPanel($id): void
    {
        if (empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id not found");
        }
        $this->currentPanelId = $id;
    }

    public function registerPanel($panel): Panel
    {
        $id = $panel->getId();
        if (!empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id already exists");
        }
        $this->panels[$id] = $panel;
        $panel->boot();

        if (empty($this->defaultPanelId)) {
            $this->defaultPanelId = $id;
        }

        if ($panel->isDefault()) {
            $this->defaultPanelId = $id;
        }
        return $panel;
    }

    public function getPanel(?string $id = null): Panel
    {
        if (empty($id)) {
            return $this->getCurrentOrDefaultPanel();
        }

        if (empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id not found");
        }

        return $this->panels[$id];
    }

    public function getCurrentOrDefaultPanel(): Panel
    {
        $id = $this->currentPanelId ?: $this->defaultPanelId;
        if (empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id not found");
        }
        return $this->panels[$id];
    }
}
