<div class="modal fade" id="editServiceCenterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit Service Center
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('service-center.update', $serviceCenter->id) }}">
                @csrf
                @method('PATCH')
                <div class="modal-body">

                    <x-forms.form-wizard3 :steps="[
                            ['id' => 'editStep1', 'title' => 'Step 1', 'description' => 'District Info', 'active' => true],
                            ['id' => 'editStep2', 'title' => 'Step 2', 'description' => 'Contact Details', 'active' => false],
                            ['id' => 'editStep3', 'title' => 'Step 3', 'description' => 'Preferences', 'active' => false]
                        ]">

                        <!-- Step 1 Content -->
                        <div class="tab-pane fade show active" id="editStep1">
                            <h5 class="mb-4">Step 1: District Information</h5>
                            <!-- Your form fields here -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_district_id" class="form-label">Select District</label>
                                        <select class="form-select" name="district_id" id="edit_district_id" required>
                                            <option value="">Choose a district...</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" {{ $serviceCenter->district_id == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district_name }} ({{ $district->region->region_name }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_location" class="form-label">Location</label>
                                        <input type="text" class="form-control" name="location" id="edit_location"
                                            placeholder="e.g. Wa Central Service Center" value="{{ $serviceCenter->location }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_town_city" class="form-label">Town/City</label>
                                        <input type="text" class="form-control" name="town_city" id="edit_town_city" placeholder="e.g. Wa"
                                            value="{{ $serviceCenter->town_city }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" id="edit_phone_number"
                                            placeholder="e.g. +233 39 222 1234" value="{{ $serviceCenter->phone_number }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <div></div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-next">
                                        Next <i class="fi fi-rr-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        <!-- Step 2 Content -->
                        <div class="tab-pane fade" id="editStep2">
                            <h5>Step 2: Additional Details</h5>
                            <!-- Your form fields here -->

                            <div class="mb-3">
                                <label for="edit_address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="edit_address" rows="3" placeholder="Enter the full address"
                                    required>{{ $serviceCenter->address }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="edit_email" placeholder="e.g. center@weenorth.com"
                                            value="{{ $serviceCenter->email }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="edit_center_representative" class="form-label">Center Representative</label>
                                        <input type="text" class="form-control" name="center_representative" id="edit_center_representative"
                                            placeholder="e.g. John Doe" value="{{ $serviceCenter->center_representative }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <button type="button" class="btn btn-secondary btn-previous">
                                        <i class="fi fi-rr-arrow-left me-2"></i> Previous
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary btn-next">
                                        Next <i class="fi fi-rr-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 Content -->
                        <div class="tab-pane fade" id="editStep3">
                            <h5>Step 3: Opening Hours</h5>
                            <!-- Your form fields here -->

                            <div class="mb-3">
                                <label for="edit_opening_hours" class="form-label">Opening Hours</label>
                                <input type="text" class="form-control" name="opening_hours" id="edit_opening_hours"
                                    placeholder="e.g. Monday-Friday: 8:00 AM - 5:00 PM" value="{{ $serviceCenter->opening_hours }}" />
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <div>
                                    <button type="button" class="btn btn-secondary btn-previous">
                                        <i class="fi fi-rr-arrow-left me-2"></i> Previous
                                    </button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fi fi-br-check me-3"></i>
                                        Update Service Center
                                    </button>
                                </div>
                            </div>
                        </div>
                    </x-forms.form-wizard3>



                </div>
            </form>
        </div>
    </div>
</div>
