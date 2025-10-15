<?php

namespace Sentosa\Components\Concerns;

trait HasToast
{
    public function toast($message): static
    {
        if(is_string($message)) {
            $message = [
                'type' => 'info',
                'message' => $message,
                'position' => 'center'
            ];
        }

        session()->flash('toast', $message);
        return $this;
    }

    public function getToast()
    {
        return session('toast.message');
    }
}
