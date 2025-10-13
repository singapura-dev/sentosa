<?php

namespace Sentosa\Components\Panel;

use Closure;
use Sentosa\Components\Concerns\HasId;
use Sentosa\Components\Panel\Concerns\HasAuth;
use Sentosa\Components\Panel\Concerns\HasBrand;
use Sentosa\Components\Panel\Concerns\HasRoutes;
use Sentosa\Components\ViewComponent;

class Panel extends ViewComponent
{
    use HasAuth;
    use HasBrand;
    use HasRoutes;
    use HasId;

    public static string $view = 'sentosa::components.panel.panel';
    protected bool $booted = false;
    protected bool $served = false;
    /**
     * @var array<array-key, Closure>
     */
    protected array $bootCallbacks = [];
    protected array $servingCallbacks = [];

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
}
