<div>
    <div class="row">
        <div class="col-md-6">
            <div class="field-wrapper">
                <select wire:model="status_id" class="form-select" name="status_id" required>
                    <option value="">Please choose</option>
                    @foreach($statuses as $status)
                        <option value="{{$status->status_id}}">{{$status->status}}</option>
                    @endforeach
                </select>
                <div class="field-placeholder">Status<span class="text-danger">*</span></div>
                @error('status_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
    </div>
    @if($this->showResolvedInputs())
        <div class="row">
            <div class="col-md-6">
                <div class="field-wrapper">
                    <input id="resolved_date" wire:model="resolved_date" class="form-control" type="date" required/>
                    <label for="resolved_date" class="field-placeholder">Resolved Date<span class="text-danger">*</span></label>
                    @error('resolved_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="field-wrapper">
                        <textarea id="resolution" wire:model="resolution" class="form-control" cols="5" rows="5" col
                                  required></textarea>
                    <label for="resolution" class="field-placeholder">
                        Resolution Remark<span class="text-danger">*</span></label>
                    @error('resolution')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif
    @if($this->showProcessedInputs())
        <div class="row">
            <div class="col-md-6">
                <div class="field-wrapper">
                    <select wire:model="priority" class="form-select" required>
                        @foreach(['Low', 'Medium' ,'High'] as $priority)
                            <option value="{{$priority}}">{{$priority}}</option>
                        @endforeach
                    </select>
                    <div class="field-placeholder">Status<span class="text-danger">*</span></div>
                    @error('priority')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="field-wrapper">
                    <input wire:model="processed_date" class="form-control" type="date" max="{{now()}}" required/>
                    <div class="field-placeholder">Processed Date<span class="text-danger">*</span></div>
                    @error('processed_date')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <button class="btn btn-success" wire:click="toggle">Submit</button>
        </div>
    </div>
</div>
