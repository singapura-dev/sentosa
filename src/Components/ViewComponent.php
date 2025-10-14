<?php

namespace Sentosa\Components;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Support\Traits\Macroable;
use Sentosa\Components\Concerns\CanCallMethods;
use Sentosa\Components\Concerns\HasAssets;
use Sentosa\Components\Concerns\HasContext;
use Sentosa\Components\Concerns\Makeable;
use Sentosa\Components\Concerns\WithAttributes;

abstract class ViewComponent
{
    use CanCallMethods;
    use HasAssets;
    use HasContext;
    use Macroable;
    use Makeable;
    use WithAttributes;

    public static string $view = '';

    public function __construct(...$args)
    {
        $namedParameter = true;

        foreach ($args as $key => $value) {
            if ($key === 0) {
                $namedParameter = false;
                if (is_array($args[0] ?? null)) {
                    $this->configureFromArray($args[0]);
                    break;
                }
            }
        }
        if ($namedParameter) {
            $this->configureFromArray($args);
        }
    }

    protected function configureFromArray($config): void
    {
        foreach ($config as $_key => $_value) {
            if (is_string($_key)) {
                if (Str::startsWith($_key, 'attributes')) {
                    $position = Str::after($_key, 'attributes_') ?? null;
                    $position = $position == 'attributes' ? null : $position;
                    $this->withAttributes($_value, $position);
                } elseif (Str::startsWith($_key, 'class')) {
                    $position = Str::after($_key, 'class_') ?? null;
                    $position = $position == 'class' ? null : $position;
                    $this->class($_value, $position);
                } elseif (public_method_exists($this, $_key)) {
                    $this->{$_key}($_value);
                } elseif(public_property_exists($this, $_key)) {
                    $this->$_key = $_value;
                } else {
                    $this->setContext($_key, $_value);
                }
            }
        }
    }

    public function render()
    {
        $this->callMethods('rendering');
        if (!$this->shouldRender()) {
            return '';
        }
        return view($this->getView(), array_merge(['self' => $this], $this->getContext()));
    }

    protected function shouldRender(): bool
    {
        return true;
    }

    protected function getView(): string
    {
        return static::$view;
    }

    protected function evaluate($value, ...$args)
    {
        if ($value instanceof Closure) {
            return call_user_func($value, $this, ...$args);
        }
        return $value;
    }
}
