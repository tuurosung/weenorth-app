<div class="modal fade" id="makeDistrictExecutiveModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Make Executive
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('network.store-district-executive') }}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="weenorth_id" id="weenorth_id" value="{{ $member->weenorth_id }}" readonly
                        hidden>


                    <div class="mb-3">
                        <label for="" class="form-label">Member's Name</label>
                        <input type="text" class="form-control" name="member_name" id="memberName"
                            value="{{ $member->name }}" readonly required />
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="region_id" class="form-label">Region</label>
                                <select class="form-select select2-input" name="district_id" id="district_id">
                                    <option value="">Select District</option>
                                    @foreach ($districts as $district)
                                        <option value="{{ $district->id }}" {{ $district->id === $selected_district->id ? 'selected' : '' }}>
                                            {{ $district->district_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="position" class="form-label">Executive Position</label>
                                <select class="form-select select2-input" name="position" id="position" required>
                                    <option value="">Select Position</option>
                                    @foreach (config('weenorth.the-network.executive_positions') as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
