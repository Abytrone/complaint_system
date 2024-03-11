<div>
    @isset($jsPath)
        <script>{!! file_get_contents($jsPath) !!}</script>
    @endisset
    @isset($cssPath)
        <style>{!! file_get_contents($cssPath) !!}</style>
    @endisset

    <div
            x-data="LivewireUIModal()"
            x-init="init()"
            x-on:close.stop="setShowPropertyTo(false)"
            x-on:keydown.escape.window="closeModalOnEscape()"
            x-show="show"
            class="tw-fixed tw-inset-0 tw-z-[10000000000]"
            style="display: none;"
    >
        <div class="tw-flex tw-items-center tw-justify-center tw-min-h-screen tw-px-4 tw-pt-4 tw-pb-10 tw-text-center sm:tw-block sm:tw-p-0">
            <div
                    x-show="show"
                    x-on:click="closeModalOnClickAway()"
                    x-transition:enter="tw-ease-out tw-duration-300"
                    x-transition:enter-start="tw-opacity-0"
                    x-transition:enter-end="tw-opacity-100"
                    x-transition:leave="tw-ease-in tw-duration-200"
                    x-transition:leave-start="tw-opacity-100"
                    x-transition:leave-end="tw-opacity-0"
                    class="tw-fixed tw-inset-0 tw-transition-all tw-transform"
            >
                <div class="tw-absolute tw-inset-0 tw-bg-gray-500 tw-opacity-75"></div>
            </div>

            <span class="tw-hidden sm:tw-inline-block sm:tw-align-middle sm:tw-h-screen" aria-hidden="true">&#8203;</span>

            <div
                    x-show="show && showActiveComponent"
                    x-transition:enter="tw-ease-out tw-duration-300"
                    x-transition:enter-start="tw-opacity-0 tw-translate-y-4 sm:tw-translate-y-0 sm:tw-scale-95"
                    x-transition:enter-end="tw-opacity-100 tw-translate-y-0 sm:tw-scale-100"
                    x-transition:leave="tw-ease-in tw-duration-200"
                    x-transition:leave-start="tw-opacity-100 tw-translate-y-0 sm:tw-scale-100"
                    x-transition:leave-end="tw-opacity-0 tw-translate-y-4 sm:tw-translate-y-0 sm:tw-scale-95"
                    x-bind:class="modalWidth"
                    class="tw-inline-block tw-align-bottom tw-bg-white tw-rounded-lg tw-text-left tw-overflow-y-auto tw-shadow-xl tw-transform tw-transition-all sm:tw-my-8 sm:tw-align-middle"
                    id="modal-container"
                    x-trap.noscroll.inert="show && showActiveComponent"
                    aria-modal="true"
            >
                @forelse($components as $id => $component)
                    <div class="tw-full" x-show.immediate="activeComponent == '{{ $id }}'" x-ref="{{ $id }}" wire:key="{{ $id }}">
                        @livewire($component['name'], $component['attributes'], key($id))
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
