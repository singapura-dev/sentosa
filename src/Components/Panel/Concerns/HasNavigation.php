<?php

namespace Sentosa\Components\Panel\Concerns;

trait HasNavigation
{
    const string NAVIGATION_POSITION_DEFAULT = 'default';
    const string NAVIGATION_POSITION_SIDE = 'side';
    const string NAVIGATION_POSITION_USER = 'user';

    protected array $navigations = [];

    public function navigation($navigation, $position = null): static
    {
        $position = $position ?: self::NAVIGATION_POSITION_DEFAULT;
        if(empty($this->navigations[$position])) {
            $this->navigations[$position] = [];
        }

        $navigation = is_array($navigation) ? $navigation : [$navigation];

        $this->navigations[$position] = [
            ...$this->navigations[$position],
            ...$navigation
        ];

        return $this;
    }

    public function getNavigations($position = null):array
    {
        $position = $position ?: self::NAVIGATION_POSITION_DEFAULT;
        return $this->navigations[$position]??[];
    }
}
