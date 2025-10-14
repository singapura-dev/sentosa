<?php

namespace Sentosa\Components\Panel;

use Closure;
use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\Concerns\HasId;
use Sentosa\Components\Panel\Concerns\HasAuth;
use Sentosa\Components\Panel\Concerns\HasBrand;
use Sentosa\Components\Panel\Concerns\HasRoutes;
use Sentosa\Components\ViewComponent;

class Panel extends ViewComponent
{
    use HasAuth;
    use HasBrand;
    use HasChildren;
    use HasRoutes;
    use HasId;

    const string CHILDREN_POSITION_BEFORE_STYLE  = 'before_style';
    const string CHILDREN_POSITION_STYLE         = 'style';
    const string CHILDREN_POSITION_AFTER_STYLE   = 'after_style';
    const string CHILDREN_POSITION_BEFORE_SCRIPT = 'before_script';
    const string CHILDREN_POSITION_SCRIPT        = 'script';
    const string CHILDREN_POSITION_AFTER_SCRIPT  = 'after_script';
    const string CHILDREN_POSITION_HEADER        = 'header';
    const string CHILDREN_POSITION_FOOTER        = 'footer';

    public array $assets = [
         'https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css',
         'https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler-themes.min.css',
         'https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js',
    ];

    public static string $view = 'sentosa::components.panel.panel';
    public static string $blank_view = 'sentosa::components.panel.blank';

    protected bool $booted = false;
    protected bool $served = false;
    protected bool $blank = false;

    /**
     * @var array<array-key, Closure>
     */
    protected array $bootCallbacks = [];
    protected array $servingCallbacks = [];

    public function blank(bool $value = true): static
    {
        $this->blank = $value;
        return $this;
    }

    public function boot(): void
    {
        if ($this->booted) {
            return;
        }
        foreach ($this->bootCallbacks as $callback) {
            $callback($this);
        }
        $this->booted = true;
    }

    public function serving(): void
    {
        if ($this->served) {
            return;
        }
        foreach ($this->servingCallbacks as $callback) {
            $callback($this);
        }
        $this->served = true;
    }

    public function bootUsing(Closure $callback): static
    {
        $this->bootCallbacks[] = $callback;
        return $this;
    }

    public function servingUsing(Closure $callback): static
    {
        $this->servingCallbacks[] = $callback;
        return $this;
    }

    protected function getView(): string
    {
        if ($this->blank) {
            return static::$blank_view;
        }
        return static::$view;
    }
}
