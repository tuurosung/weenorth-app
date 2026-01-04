<div class="modal fade" id="assignJobModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Assign Job
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label for="member_id" class="form-label">Assigned Member</label>
                            <select class="form-select" name="member_id" id="member_id">
                                <option selected>Select one</option>
                                @foreach ($serviceRequest->tradeswomen() as $member)
                                <option value="{{ $member->weenorth_id }}">{{ $member->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
