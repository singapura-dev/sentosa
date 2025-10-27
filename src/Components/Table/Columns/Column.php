<?php

namespace Sentosa\Components\Table\Columns;

use Illuminate\Database\Eloquent\Model;
use Sentosa\Components\ViewComponent;

/**
 * @method static field($field)
 * @method static getField()
 * @method static row($row)
 * @method array|Model getRow()
 */
abstract class Column extends ViewComponent
{
    public mixed $row = null;
    public mixed $label = null;
    public mixed $field = null;
    public mixed $sortable = false;

    public function getValue()
    {
        return data_get($this->getRow(), $this->getField());
    }

    public function getDisplayValue()
    {
        return $this->getValue();
    }
}
