<?php

use Sentosa\PanelManager;

if (!function_exists('panel')) {
    function panel($id = null)
    {
        if (empty($id)) {
            return app(PanelManager::class)->getCurrentPanel();
        }
        return app(PanelManager::class)->getPanel($id);
    }
}
