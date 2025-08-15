<div class="modal fade" id="addWorkExperienceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Add Work Experience
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('resume-builder.work-experience.store') }}">
                @csrf
            <div class="modal-body">

                @include('app.resume-builder.forms.work.work-experience-form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check me-3  "></i>
                    Add Work Experience
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
