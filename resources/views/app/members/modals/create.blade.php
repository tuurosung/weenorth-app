<!-- Create Member Modal -->
<div class="modal parentContainer fade" id="newMemberModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title cal-sans-regular" id="modalTitleId">
                    Create New Member
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('member.store') }}">
                @csrf
                <div class="modal-body">

                    @include('app.members.forms.new-member-form')

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-rc-check me-2"></i>
                        Create Member
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
