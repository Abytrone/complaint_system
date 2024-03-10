<div>
    <form wire:submit.prevent="save" id="frmSubCategory">
        <div class="row">
            <div class="col-12">
                <div class="field-wrapper">
                    <select wire:model="category_id" name="category_id"
                            class="form-select @error('category_id') is-invalid @enderror">
                        <option>Select</option>
                        @foreach ($categories as $cat)
                        <option  value="{{$cat->category_id}}">{{$cat->category}}</option>
                        @endforeach
                    </select>
                   
                    </select>
                    <div class="field-placeholder">Category</div>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="field-wrapper">
                    <textarea wire:model="description" rows="6" name="description"
                              class="form-control @error('raw_report') is-invalid @enderror"></textarea>
                        <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="field-wrapper">
                    <select wire:model="active" name="active"
                            class="form-select @error('active') is-invalid @enderror">
                        <option>Select</option>
                            <option selected value="1">Yes</option>
                            <option  value="0">No</option>
                    </select>
                    <div class="field-placeholder">Set Active</div>
                    @error('active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </form>
</div>
