<div class="md:tw-min-w-[300px] ">
    <div class="modal-header">
        <h5 class="modal-title">{{$modalTitle}}</h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col">
                    <select wire:model="issueCategory" class="form-select" name="status_id" required>
                        <option value="">Please choose a category</option>
                        @foreach($issueCategories as $category)
                            <option value="{{$category->category_id}}">{{strtoupper($category->category)}}</option>
                            @endforeach
                    </select>
                    @error('issueCategory')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
    <div class="modal-footer">
        <button wire:click="closeAndGetCategory" class="btn btn-success">Continue</button>
        <button class="btn btn-danger" wire:click="$emit('closeModal')" wire:click="toggle">Leave</button>
    </div>
</div>
