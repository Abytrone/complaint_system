<form wire:submit.prevent="save">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="field-wrapper">
                <select wire:model="media_type_id"
                        class="form-select @error('media_type_id') is-invalid @enderror" id="formSelect">
                    @foreach ($mediaTypes as $type)
                        <option value="{{ $type->media_type_id }}">{{ $type->media_type }}</option>
                    @endforeach
                </select>
                <div class="field-placeholder">Media Type</div>
                @error('media_type_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="field-wrapper">
                <input wire:model="title"
                       class="form-control @error('title') is-invalid @enderror" type="text">
                <div class="field-placeholder">Media Title <span class="text-danger">*</span></div>
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="field-wrapper">
                <input class="form-control @error('media_file') is-invalid @enderror" type="file"  id="upload-{{$count}}"
                       wire:model="media_file">
                <div class="field-placeholder">Media File <span class="text-danger">*</span></div>
                @error('media_file')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
