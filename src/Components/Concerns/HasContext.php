<?php
namespace Sentosa\Components\Concerns;
trait HasContext
{
    protected array $_context = [];

    public function setContext($key,  $value = null): static
    {
        if(is_array($key)) {
            $this->_context = array_merge($this->_context, $key);
            return $this;
        }
        $this->_context[$key] = $value;
        return $this;
    }

    public function getContext($key = null, $default = null)
    {
        if($key === null) {
            return $this->_context;
        }
        return $this->_context[$key] ?? $default;
    }
}
