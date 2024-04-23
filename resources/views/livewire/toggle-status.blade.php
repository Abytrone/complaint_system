<div>
    <div class="row">
        <div class="col-md-6">
            <x-select-field wire:model="status_id" text="Status" name="status_id" required>
                @foreach($statuses as $status)
                    <option value="{{$status->status_id}}">{{$status->status}}</option>
                @endforeach
            </x-select-field>
        </div>

        @if($this->showResolvedInputs())
            <div class="col-md-6">
                <x-text-input wire:model="resolved_date" name="resolved_date" text="Resolved Date" required/>
            </div>
            <div class="col-12">
                <x-textarea-field wire:model="resolution" name="resolution" text="Resolution Remark" required/>
            </div>
        @endif
        @if($this->showProcessedInputs())
            <div class="col-md-6">
                <x-select-field wire:model="priority" name="Priority" name="priority" required>
                    @foreach(['Low', 'Medium' ,'High'] as $priority)
                        <option value="{{$priority}}">{{$priority}}</option>
                    @endforeach
                </x-select-field>
            </div>
            <div class="col-md-6">
                <x-input-field wire:model="processed_date" name="processed_date" text="Processed Date" type="date"
                               max="{{now()}}" required/>
            </div>
        @endif
        @if($this->showReopenInputs())
            <div class="col-12">
                <x-textarea-field name="reopen_reason" text="Reopen Reason" wire:model="reopen_reason" required/>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-success" wire:click="toggle">Submit</button>
        </div>
    </div>
</div>
