<div class="custom-tabs-container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="issues-tab" data-bs-toggle="tab" href="#issues" role="tab"
               aria-controls="first"
               aria-selected="true">Report Processing</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="comment-tab" data-bs-toggle="tab" href="#comments" role="tab"
               aria-controls="second" aria-selected="false">Comments</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="uploads-tab" data-bs-toggle="tab" href="#uploads" role="tab"
               aria-controls="third" aria-selected="false">Documents and Media</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="notification-tab" data-bs-toggle="tab" href="#notification" role="tab"
               aria-controls="fourth" aria-selected="false">Notification</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="issues" role="tabpanel">
            <livewire:toggle-status-modal :complaint="$complaint" :redirect-url="url()->previous()"></livewire:toggle-status-modal>
        </div>
        <div class="tab-pane fade " id="comments" role="tabpanel">
            <div class="row">...</div>
        </div>
        <div class="tab-pane fade" id="uploads" role="tabpanel">
            <div class="row">...</div>
        </div>
        <div class="tab-pane fade" id="notification" role="tabpanel">
            <div class="row">...</div>
        </div>
    </div>
</div>
