<?php
namespace Sentosa\Components;

use Closure;
use Illuminate\Support\Traits\Macroable;
use Sentosa\Components\Concerns\HasAssets;
use Sentosa\Components\Concerns\HasContext;
use Sentosa\Components\Concerns\Makeable;

abstract class ViewComponent
{
    use HasAssets;
    use HasContext;
    use Macroable;
    use Makeable;

    public static string $view = '';

    protected function evaluate($value, ...$args)
    {
        if ($value instanceof Closure) {
            return call_user_func($value, $this, ...$args);
        }
        return $value;
    }

    public function render()
    {
        if(!$this->shouldRender()) {
            return '';
        }
        return view($this->getView(), array_merge(['self' => $this], $this->getContext()));
    }

    protected function shouldRender():bool
    {
        return true;
    }

    protected function getView():string
    {
        return static::$view;
    }
}
