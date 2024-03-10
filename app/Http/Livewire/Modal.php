<?php

namespace App\Http\Livewire;

 use Illuminate\Contracts\Foundation\Application;
 use Illuminate\Contracts\View\Factory;
 use Illuminate\Contracts\View\View;
 use LivewireUI\Modal\ModalComponent;

class Modal extends ModalComponent
{
    protected static array $maxWidths = [
        'sm' => 'sm:tw-max-w-sm',
        'md' => 'sm:tw-max-w-md',
        'lg' => 'sm:tw-max-w-md md:tw-max-w-lg',
        'xl' => 'sm:tw-max-w-md md:tw-max-w-xl',
        '2xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-2xl',
        '3xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-3xl',
        '4xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-3xl xl:tw-max-w-4xl',
        '5xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-3xl xl:tw-max-w-5xl',
        '6xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-3xl xl:tw-max-w-5xl 2xl:tw-tw-max-w-6xl',
        '7xl' => 'sm:tw-max-w-md md:tw-max-w-xl lg:tw-max-w-3xl xl:tw-max-w-5xl 2xl:tw-max-w-7xl',
    ];
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

}
