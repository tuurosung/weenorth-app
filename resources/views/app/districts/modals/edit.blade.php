<div class="modal fade" id="editDistrictModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit District
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('district.update', $district->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="edit_region_id" class="form-label">Select Region</label>
                        <select class="form-select" name="region_id" id="edit_region_id" required>
                            <option value="">Choose a region...</option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}"
                                    {{ $district->region_id == $region->id ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_district_name" class="form-label">District Name</label>
                        <input type="text" class="form-control" name="district_name" id="edit_district_name"
                            placeholder="eg. Wa Municipal" value="{{ $district->district_name }}" required />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-br-check  me-3  "></i>
                        Update District
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
