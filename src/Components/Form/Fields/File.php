<?php

namespace Sentosa\Components\Form\Fields;

/**
 * @method static disk($disk)
 */
class File extends Text
{
    public static string $view = 'sentosa::components.form.fields.file';
    public mixed $type = 'file';
    public mixed $disk = null;
}
