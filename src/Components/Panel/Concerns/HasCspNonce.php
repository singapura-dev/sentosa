<?php

namespace Sentosa\Components\Panel\Concerns;

/**
 * @method static cspNonce($value)
 * @method string getCspNonce()
 */
trait HasCspNonce
{
    public mixed $cspNonce = '';
}
