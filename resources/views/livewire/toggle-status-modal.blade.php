<div class="md:tw-min-w-[500px] ">
    <div class="modal-header">
        <h5 class="modal-title">Toggle Complaint Status</h5>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col">
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
                <div class="col">
                    <div class="field-wrapper">
                        <input wire:model="resolved_date" class="form-control" type="date" required/>
                        <div class="field-placeholder">Resolved Date<span class="text-danger">*</span></div>
                        @error('resolved_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="field-wrapper">
                        <textarea wire:model="resolution" class="form-control" cols="5" rows="5" col
                                  required></textarea>
                        <div class="field-placeholder">Resolution Remark<span class="text-danger">*</span></div>
                        @error('resolution')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

        @endif
        @if($this->showProcessedInputs())
            <div class="row">
                <div class="col">
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
                <div class="col">
                    <div class="field-wrapper">
                        <input wire:model="processed_date" class="form-control" type="date" required/>
                        <div class="field-placeholder">Processed Date<span class="text-danger">*</span></div>
                        @error('processed_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif

        @if($this->showReceivedInput())
            <div class="row">
                <div class="col">
                    <div class="field-wrapper">
                        <input wire:model="received_date" class="form-control" type="date" required/>
                        <div class="field-placeholder">Received Date<span class="text-danger">*</span></div>
                        @error('received_date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="modal-footer">
        <button class="btn btn-danger" wire:click="toggle">Submit</button>
        <button wire:click="$emit('closeModal')" class="btn btn-success">Cancel</button>
    </div>
</div>
