<div>

    <div class="tw-p-5">
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
                        <input class="form-control @error('media_file') is-invalid @enderror" type="file"
                               id="upload-{{$count}}"
                               wire:model="media_file">
                        <div class="field-placeholder">Media File <span class="text-danger">*</span></div>
                        @error('media_file')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tw-flex tw-justify-end tw-gap-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button wire:click="closeModal" type="button" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card" id="media-section">
        <div class="card-header">
            <div class="card-title">Complaint Media</div>
        </div>
        <div class="card-body">
            <div class="row tw-mt-5">
            <div class="table-responsive">
                <table style="width:100%" id="complaint-media" class="table custom-table dataTable">
                    <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>File Type</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>
