<div class="modal fade" id="editRequestModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Service Request
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('service-requests.update', $serviceRequest) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    @include('app.service-requests.forms.edit-service-request-form')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-rc-check me-2"></i>
                        Update Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
