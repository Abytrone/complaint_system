<!-- Modal start -->
<div class="modal fade" id="uploads-media" tabindex="-1" aria-labelledby="exampleModalExtraLargeTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Activity Media</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row"> <!-- Field wrapper start -->
                    <form id="mediaForm" method="post" enctype="multipart/form-data">
                        {{-- <input type="hidden" value="{{$data->ActivityID}}" name="ActivityID"/> --}}
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3">
                            <div class="field-wrapper">
                                <select class="form-select" name="MediaTypeID" required>
                                    <option value="">Select media type</option>
                                    {{-- @foreach ($mediatypes as $mediatype) --}}
                                    <option value="Option1">Option 1</option>
                                    {{-- @endforeach --}}
                                </select>
                                <div class="field-placeholder">Media Type<span class="text-danger">*</span></div>
                                @error('Issue')
                                    <span class="text-danger">Type</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input type="file" class="form-control" name="FileName" required>
                                <div class="field-placeholder">Upload File<span class="text-danger">*</span></div>
                                @error('Issue')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input type="text" class="form-control" name="Title" required>
                                <div class="field-placeholder">Title<span class="text-danger">*</span></div>
                                @error('Issue')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </form>
                </div>
                <!-- Field wrapper end -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-primary" form="mediaForm" id="btnUpload">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
