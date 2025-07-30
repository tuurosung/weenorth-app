<!-- Create Service Center Modal -->
<div class="modal fade" id="newServiceCenterModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Create New Service Center
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('service-center.store') }}">
                @csrf
                <div class="modal-body">

                    <x-forms.form-wizard3 :steps="[
                            ['id' => 'step1', 'title' => 'Step 1', 'description' => 'District Information', 'active' => true],
                            ['id' => 'step2', 'title' => 'Step 2', 'description' => 'Contact Information', 'active' => false],
                            ['id' => 'step3', 'title' => 'Step 3', 'description' => 'Opening Hours', 'active' => false]
                        ]">

                        <!-- Step 1: District Information -->
                        <div class="tab-pane fade show active" id="step1">

                        <h5 class="mb-4">Step 1: District Information</h5>
                        <!-- Your form fields here -->


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="district_id" class="form-label">Select District</label>
                                        <select class="form-select" name="district_id" id="district_id" required>
                                            <option value="">Choose a district...</option>
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}" {{ old('district_id') == $district->id ? 'selected' : '' }}>
                                                    {{ $district->district_name }} ({{ $district->region->region_name }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Description</label>
                                        <input type="text" class="form-control" name="location" id="location"
                                            placeholder="e.g. Wa Central Service Center" value="{{ old('location') }}"
                                            required />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="center_representative" class="form-label">Center Representative</label>
                                <input type="text" class="form-control" name="center_representative" id="center_representative"
                                    placeholder="e.g. John Doe" value="{{ old('center_representative') }}" required />
                            </div>

                            <div class="d-flex justify-content-between mt-100px">
                                <div></div>
                                <div class="">
                                    <button type="button" class="btn btn-primary btn-next">
                                        Next<i class="fi fi-rr-arrow-right ms-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Contact Information -->
                        <div class="tab-pane fade" id="step2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter the full address"
                                            required>{{ old('address') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="e.g. center@weenorth.com"
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="town_city" class="form-label">Town/City</label>
                                        <input type="text" class="form-control" name="town_city" id="town_city"
                                            placeholder="e.g. Wa" value="{{ old('town_city') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                                            placeholder="e.g. +233 39 222 1234" value="{{ old('phone_number') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-100px">
                                <div>
                                    <button type="button" class="btn btn-secondary btn-previous">
                                        <i class="fi fi-rr-arrow-left me-3"></i> Previous
                                    </button>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-primary btn-next">
                                        Next<i class="fi fi-rr-arrow-right ms-3"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Opening Hours -->
                        <div class="tab-pane fade" id="step3">
                            <div class="mb-3">
                                <label for="opening_hours" class="form-label">Opening Hours</label>
                                <input type="text" class="form-control" name="opening_hours" id="opening_hours"
                                    placeholder="e.g. Monday-Friday: 8:00 AM - 5:00 PM"
                                    value="{{ old('opening_hours') }}" />
                            </div>

                            <div class="d-flex justify-content-between mt-100px">
                                <div>
                                    <button type="button" class="btn btn-secondary btn-previous">
                                        <i class="fi fi-rr-arrow-left me-3"></i> Previous
                                    </button>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fi fi-br-check me-3"></i>
                                        Create Service Center
                                    </button>
                                </div>
                            </div>
                        </div>

                    </x-forms.form-wizard3>


                </div>
                <div class="modal-footer d-none">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fi fi-br-check me-3"></i>
                        Create Service Center
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
