<?php

namespace Sentosa\Components\Form\Fields;

/**
 * @method static placeholder($placeholder)
 * @method static type($type) set native type
 */
class Text extends Field
{
    public static string $view = 'sentosa::components.form.fields.text';
    public mixed $placeholder = '';
    public mixed $type = 'text';

    public function email(): static
    {
        $this->type('email');
        return $this;
    }

    public function password(): static
    {
        $this->type('password');
        return $this;
    }
}
