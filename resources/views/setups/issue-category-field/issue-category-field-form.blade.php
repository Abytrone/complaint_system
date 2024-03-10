<div>
    <form wire:submit.prevent="save" id="frmCategory">
        <div class="row">
            <div class="col-4">
                <div class="field-wrapper">
                    <select wire:model="category_id" name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                        <option>Select</option>
                        @foreach ($issueCategories as $cat)
                        <option  value="{{$cat->category_id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Category</div>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="field-wrapper">
                    <select wire:model="field_id" name="field_id"
                            class="form-select @error('field_id') is-invalid @enderror">
                        <option>Select</option>
                        @foreach ($fields as $field)
                        <option  value="{{$field->field_id}}">{{$field->field_name}}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Field</div>
                    @error('field_id')field_id
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="field-wrapper">
                    <select wire:model="display" name="display"
                            class="form-select @error('display') is-invalid @enderror">
                        <option>Select</option>
                            <option selected value="1">Yes</option>
                            <option  value="0">No</option>
                    </select>
                    <div class="field-placeholder">Display</div>
                    @error('display')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
