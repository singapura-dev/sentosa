<?php

namespace Sentosa\Components\UI;

use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\Concerns\HasIcon;
use Sentosa\Components\Concerns\HasLabel;
use Sentosa\Components\Concerns\HasLink;
use Sentosa\Components\ViewComponent;

class MenuItem extends ViewComponent
{
    use HasChildren;
    use HasLabel;
    use HasIcon;
    use HasLink;

    public mixed $view = 'sentosa::components.ui.menu_item';

    public mixed $badge = null;
    public mixed $badge_color = null;

    public function badge($badge, $color = null): static
    {
        $this->badge = $badge;

        if ($color) {
            $this->badge_color = $color;
        }

        return $this;
    }

    public function getBadgeColor()
    {
        return $this->evaluate($this->badge_color ?? 'default');
    }

    public function getBadge()
    {
        return $this->evaluate($this->badge);
    }
}
