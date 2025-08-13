<div class="modal fade" id="editEducationModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Education
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('resume-builder.education.update', $education) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    @include('app.resume-builder.forms.education.edit-education-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-br-check me-3"></i>
                        Update Education History
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
