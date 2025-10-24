<?php

namespace Sentosa\Components\Form\Fields;

use Sentosa\Components\Concerns\HasId;
use Sentosa\Components\Concerns\HasLabel;
use Sentosa\Components\ViewComponent;

/**
 * @method static name($name) set input name
 * @method string getName() get input name
 * @method static value($value) set input value
 */
abstract class Field extends ViewComponent
{
    use HasId;
    use HasLabel;

    public mixed $value = null;
    public mixed $name = '';

    public function getValue()
    {
        return old($this->getName(), $this->evaluate($this->value));
    }
}
