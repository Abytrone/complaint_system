<div class="custom-tabs-container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            {{--            <a class="nav-link {{/*session('active')=='outcome' ? 'active' : ''*/}}" id="outcome-tab" data-bs-toggle="tab" href="#outcome" role="tab" --}}
            {{--               aria-controls="first" aria-selected="true">Outcome</a> --}}
            <a class="nav-link active" id="outcome-tab" data-bs-toggle="tab" href="#outcome" role="tab"
                aria-controls="first" aria-selected="true">Reporter Information</a>
        </li>
        <li class="nav-item" role="presentation">
            {{--            <a class="nav-link {{/*session('active')=='issue' ? 'active' : ''*/}}" id="issues-tab" data-bs-toggle="tab" href="#issues" role="tab" --}}
            {{--               aria-controls="first" aria-selected="true">Issues</a> --}}
            <a class="nav-link" id="issues-tab" data-bs-toggle="tab" href="#issues" role="tab" aria-controls="first"
                aria-selected="true">Report Processing</a>
        </li>
        <li class="nav-item" role="presentation">
            {{--            <a class="nav-link {{/*session('active')=='comment' ? 'active' : ''*/}}" id="comment-tab" data-bs-toggle="tab" href="#comments" role="tab" --}}
            {{--               aria-controls="second" aria-selected="false">Comments</a> --}}
            <a class="nav-link" id="comment-tab" data-bs-toggle="tab" href="#comments" role="tab"
                aria-controls="second" aria-selected="false">Comments</a>
        </li>
        <li class="nav-item" role="presentation">
            {{--            <a class="nav-link {{/*session('active')=='uploads' ? 'active' : ''*/}}" id="uploads-tab" data-bs-toggle="tab" href="#uploads" role="tab" --}}
            {{--               aria-controls="second" aria-selected="false">Documents and Media</a> --}}
            <a class="nav-link" id="uploads-tab" data-bs-toggle="tab" href="#uploads" role="tab"
                aria-controls="second" aria-selected="false">Documents and Media</a>
        </li>
        <li class="nav-item" role="presentation">
            {{--            <a class="nav-link {{/*session('active')=='notification' ? 'active' : ''*/}}" id="notification-tab" data-bs-toggle="tab" href="#notification" role="tab" --}}
            {{--               aria-controls="third" aria-selected="false">Notitication</a> --}}
            <a class="nav-link" id="notification-tab" data-bs-toggle="tab" href="#notification" role="tab"
                aria-controls="third" aria-selected="false">Notitication</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="outcome" role="tabpanel">
            {{--        <div class="tab-pane fade {{/*session('active')=='outcome' ? 'show active' : ''*/}}" id="outcome" role="tabpanel"> --}}
            {{--            <form action=""> --}}
            {{--                @method('PATCH') --}}
            {{--                @csrf --}}
            <div class="row gutters">
                <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lng" readonly value="{{ $complaint->name }}" name="longitude"
                            class="form-control @error('longitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Name </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lat" readonly value="{{ $complaint->phone }}" name="latitude"
                            class="form-control @error('latitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Phone Number </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lat" readonly value="{{ $complaint->email }}" name="latitude"
                            class="form-control @error('latitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Email </div>
                    </div>
                </div>
            </div>
            <div class="row gutters">
                <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lng" readonly value="" name="longitude"
                            class="form-control @error('longitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Address </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lat" readonly value="{{ $complaint->gender }}" name="latitude"
                            class="form-control @error('latitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Gender </div>
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="field-wrapper">
                        <input id="txt-lat" readonly value="" name="latitude"
                            class="form-control @error('latitude') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Preferred Contact Method </div>
                    </div>
                </div> --}}
            </div>
            {{--            </form> --}}
        </div>
        <div class="tab-pane fade" id="issues" role="tabpanel">
            {{--        <div class="tab-pane fade {{/*session('active')=='issue' ? 'show active' : ''*/}}" id="issues" role="tabpanel"> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="field-wrapper">
                        <input id="txt-lat" value="{{ $complaint->name }}" name="dateProcessed"
                            class="form-control @error('dateProcessed') is-invalid @enderror" type="date">
                        <div class="field-placeholder">Date Processed <span class="text-danger">*</span></div>
                    </div>
                    @error('dateProcessed')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="field-wrapper">
                        <input id="txt-lat" value="" name="processedBy"
                            class="form-control @error('processedBy') is-invalid @enderror" type="text">
                        <div class="field-placeholder">Processed By <span class="text-danger">*</span></div>
                    </div>
                    @error('processedBy')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 col-xl-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <textarea class="form-control @error('ProceedMessage') is-invalid @enderror" name="ProceedMessage"></textarea>
                    <div class="field-placeholder">
                        Processed Message <span class="text-danger">*</span>
                    </div>
                    @error('ProceedMessage')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>

            <div class="row">
                <div class="field-placeholder">
                    Priority <span class="text-danger">*</span>
                </div>

                <div class="col-lg-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="Low">
                        <label class="form-check-label" for="inlineRadio1">Low</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="Medium">
                        <label class="form-check-label" for="inlineRadio2">Medium</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                            value="High">
                        <label class="form-check-label" for="inlineRadio3">High</label>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select name="supportGroup" class="form-select @error('supportGroup') is-invalid @enderror"
                            id="formSelect">
                            <option value="">Select Support Group</option>
                            <option value="Police">Police</option>
                            <option value="Electoral Commission">Electoral Commission</option>
                            <option value="Peace Council">Peace Council</option>
                        </select>
                        <div class="field-placeholder">Support Group <span class="text-danger">*</span></div>
                        @error('supportGroup')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="field-wrapper">
                        <select name="constituency" class="form-select @error('constituency') is-invalid @enderror"
                            id="formSelect">
                            <option value="">Select Constituency</option>
                            <option value="Tamale North">Tamale North</option>
                            <option value="Tamale South">Tamale South</option>
                        </select>
                        <div class="field-placeholder">Constituency <span class="text-danger">*</span></div>
                        @error('constituency')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-12">
                <!-- Field wrapper start -->
                <div class="field-wrapper">
                    <textarea class="form-control @error('comment') is-invalid @enderror" name="comment"></textarea>
                    <div class="field-placeholder">
                        Comment <span class="text-danger">*</span>
                    </div>
                    @error('comment')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Field wrapper end -->
            </div>
            <div class="text-align-right">
                <div class="col-12" style="text-align: right;">
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#">Submit</button>
                </div>
            </div>
            {{-- @include('includes.modals.activity-issue-modal') --}}
            {{-- @include('includes.modals.issue-resolution') --}}
        </div>
        <div class="tab-pane fade " id="comments" role="tabpanel">
            {{-- <div class="tab-pane fade {{/*session('active')=='comment' ? 'show active' : ''*/}}" id="comments" role="tabpanel"> --}}
            <div class="row">
                <div class="col-12" style="text-align: right;">
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#comment">Add
                        Comment</button>
                </div>
            </div>
            {{-- @include('includes.modals.activity-comment-modal') --}}
            <!-- Modal end -->
            <div class="table-responsive">
                <table id="activity-comments" class="table custom-table w-100">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Date</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Abdul Basit</td>
                            <td>21/02/2023</td>
                            <td>This is a sample comment I made.</td>
                        </tr>
                        <tr>
                            <td>Mohammed Abdallah</td>
                            <td>04/05/2023</td>
                            <td>This is another sample of comment I made.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="uploads" role="tabpanel">
            <div class="row ">
                <div class=" col-6 " style="text-align: left;">
                    {{-- <div class="col-6" style="text-align: left;"> --}}
                    <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal"
                        data-bs-target="#gallery-media">View Gallery</button>
                    {{-- </div> --}}
                </div>
                {{--        <div class="tab-pane fade {{/*session('active')=='uploads' ? 'show active' : ''*/}}" id="uploads" role="tabpanel"> --}}
                <div class=" col-6" style="text-align: right;">
                    {{-- <div class="col-6" style="text-align: right;"> --}}
                    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                        data-bs-target="#uploads-media">Upload
                        Media</button>
                    {{-- </div> --}}
                </div>
                {{--            @include('includes.modals.activity-media-modal') --}}
            </div>
            <!-- Modal start -->
            <div class="table-responsive">
                <table id="activity-uploads" class="table custom-table w-100">
                    <thead>
                        <tr>
                            <th>Media Type</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{-- </div> --}}
            <div class="tab-pane fade" id="notification" role="tabpanel">
                {{-- <div class="tab-pane fade {{/*session('active')=='notification' ? 'show active' : ''*/}}" id="notification" role="tabpanel"> --}}
                <div class="text-align-right">
                    <div class="col-12" style="text-align: right;">
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                            data-bs-target="#notification-modal">Add
                            Notification</button>
                    </div>
                </div>
                {{-- @include('includes.modals.activity-notification-modal') --}}
                <table id="activity-notification" class="table custom-table w-100">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Msg From</th>
                            <th>Msg To</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Notification</td>
                            <td>MAARO</td>
                            <td>0247595776</td>
                            <td>07-Dec-2020</td>
                            <td>Sent</td>
                            <td>Your report NE/0004 was submitted.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="uploads" role="tabpanel">
    </div>
