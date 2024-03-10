<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;


class ConfirmModal extends Modal
{

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
    public function render(): Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.confirm-modal');
    }
}
