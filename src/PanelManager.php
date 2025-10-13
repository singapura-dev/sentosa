<?php
namespace Sentosa;

use LogicException;
use Sentosa\Components\Panel\Panel;

class PanelManager
{
    protected array $panels = [];

    protected string $currentPanelId = '';

    public function getPanels(): array
    {
        return $this->panels;
    }
    public function setCurrentPanel($id):void
    {
        if(empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id not found");
        }
        $this->currentPanelId = $id;
    }

    public function registerPanel($panel):Panel
    {
        $id = $panel->getId();
        if(!empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id already exists");
        }
        $this->panels[$id] = $panel;
        return $panel;
    }
    public function getPanel(string $id):Panel
    {
        if(empty($this->panels[$id])) {
            throw new LogicException("Panel with id $id not found");
        }

        return $this->panels[$id];
    }

    public function getCurrentPanel():Panel
    {
        if(empty($this->panels[$this->currentPanelId])) {
            throw new LogicException("Panel with id $this->currentPanelId not found");
        }
        return $this->panels[$this->currentPanelId];
    }
}
