<div class="p-4">
    <p class="tw-font-bold tw-text-xl mb-2">{{$title}}</p>
    <p class="tw-font-bold mb-2">{{$message}}</p>
    <div class="tw-flex tw-justify-end tw-gap-3">
        <button wire:click="confirm" class="btn btn-danger">Yes</button>
        <button wire:click="$emit('closeModal')" class="btn btn-success">No</button>
    </div>
</div>
