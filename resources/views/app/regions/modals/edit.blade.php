<div class="modal fade" id="editRegionModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Region
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('region.update', $region->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Region Name</label>
                        <input type="text" class="form-control" name="region_name" id="region_name"
                            placeholder="eg. Upper West Region" value="{{ $region->region_name }}" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-br-check  me-3  "></i>
                        Update Region
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
