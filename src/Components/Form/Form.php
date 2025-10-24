<?php

namespace Sentosa\Components\Form;

use Sentosa\Components\Concerns\HasChildren;
use Sentosa\Components\ViewComponent;

class Form extends ViewComponent
{
    use HasChildren;

    public static string $view = 'sentosa::components.form.form';
    public mixed $action = '';
    public mixed $method = '';

    public function get($action): static
    {
        $this->method = 'get';
        $this->action = $action;
        return $this;
    }

    public function post($action): static
    {
        $this->method = 'post';
        $this->action = $action;
        return $this;
    }
}
