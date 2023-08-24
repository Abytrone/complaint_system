<div wire:ignore.self class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="field-wrapper">
                            <input @disabled($isShow) wire:model="code"
                                class="form-control @error('code') is-invalid @enderror" type="text">
                            <div class="field-placeholder">Code <span class="text-danger">*</span></div>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="field-wrapper">
                            <input @disabled($isShow) wire:model="name"
                                class="form-control @error('name') is-invalid @enderror" type="text">
                            <div class="field-placeholder">Name <span class="text-danger">*</span></div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="field-wrapper">
                            <input @disabled($isShow) wire:model="email"
                                class="form-control @error('email') is-invalid @enderror" type="text">
                            <div class="field-placeholder">Email <span class="text-danger">*</span></div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="field-wrapper m-0">
                            <textarea @disabled($isShow) wire:model="raw" rows="5"
                                class="form-control @error('raw') is-invalid @enderror"></textarea>
                            <div class="field-placeholder">Raw <span class="text-danger">*</span></div>
                            @error('raw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button @disabled($isShow) wire:click="store" type="button" class="btn btn-primary">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>
