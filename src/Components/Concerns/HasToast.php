<?php

namespace Sentosa\Components\Concerns;

trait HasToast
{

    public function success($message)
    {
        return $this->toast([
            'message' => $message,
            'type'    => 'success',
        ]);
    }

    public function danger($message)
    {
        return $this->toast([
            'message' => $message,
            'type'    => 'danger',
        ]);
    }

    public function toast($message): static
    {
        if (is_string($message)) {
            $message = [
                'type'     => 'info',
                'message'  => $message,
                'position' => 'center',
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
