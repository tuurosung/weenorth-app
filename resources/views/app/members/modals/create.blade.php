<!-- Create Member Modal -->
<div class="modal fade" id="newMemberModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Create New Member
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('member.store') }}">
                @csrf
                <div class="modal-body">

                    <x-forms.form-wizard3 :steps="[
                            ['id' => 'step1', 'title' => 'Personal Info', 'description' => 'Enter personal details', 'active' => true],
                            ['id' => 'step2', 'title' => 'Contact Info', 'description' => 'Provide contact information'],
                            ['id' => 'step3', 'title' => 'Membership Details', 'description' => 'Select membership options']
                        ]">

                        <div class="tab-pane fade show active" id="step1">

                            <h5>1. Personal Information</h5>
                            <p>Please fill in your personal details below.</p>

                            <!-- First And Last Names -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="Enter first name" value="{{ old('first_name') }}" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Enter last name" value="{{ old('last_name') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                                            value="{{ old('date_of_birth') }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" name="gender" id="gender">
                                            <option value="">Select Gender</option>
                                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>
                                                Female</option>
                                            <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="cohort" class="form-label">Cohort</label>
                                        <input type="text" class="form-control" name="cohort" id="cohort"
                                            placeholder="e.g. 2024-A" value="{{ old('cohort') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="bio" class="form-label">Biography</label>
                                <textarea class="form-control" name="bio" id="bio" rows="3"
                                    placeholder="Enter member biography or description">{{ old('bio') }}</textarea>
                            </div>


                            <x-forms.nav-next-only />
                        </div>


                        <div class="tab-pane fade" id="step2">

                            <h5>2. Contact Information</h5>
                            <p>Please provide your contact information below.</p>

                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter email address" value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Enter phone number" value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="2"
                                    placeholder="Enter full address">{{ old('address') }}</textarea>
                            </div>


                            <x-forms.nav-next-and-prev />
                        </div>

                        <div class="tab-pane fade" id="step3">

                            <h5>3. Membership Information</h5>
                            <p>Please provide membership information</p>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="region_id" class="form-label">Region</label>
                                        <select class="form-select" name="region_id" id="region_id">
                                            <option value="">Select Region</option>
                                            @foreach($regions as $key => $value)
                                                <option value="{{ $key }}" {{ old('region_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="district_id" class="form-label">District</label>
                                        <select class="form-select" name="district_id" id="district_id">
                                            <option value="">Select District</option>
                                            @foreach($districts as $key => $value)
                                                <option value="{{ $key }}" {{ old('district_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="trade_id" class="form-label">Trade</label>
                                        <select class="form-select" name="trade_id" id="trade_id">
                                            <option value="">Select Trade</option>
                                            @foreach($trades as $key => $value)
                                                <option value="{{ $key }}" {{ old('trade_id') == $key ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="membership_type" class="form-label">Membership Type</label>
                                        <select class="form-select" name="membership_type" id="membership_type"
                                            required>
                                            <option value="">Select Type</option>
                                            <option value="individual" {{ old('membership_type') === 'individual' ? 'selected' : '' }}>Individual
                                            </option>
                                            <option value="corporate" {{ old('membership_type') === 'corporate' ? 'selected' : '' }}>Corporate
                                            </option>
                                            <option value="student" {{ old('membership_type') === 'student' ? 'selected' : '' }}>Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="membership_status" class="form-label">Membership Status</label>
                                        <select class="form-select" name="membership_status" id="membership_status"
                                            required>
                                            <option value="">Select Status</option>
                                            <option value="active" {{ old('membership_status') === 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('membership_status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            <option value="suspended" {{ old('membership_status') === 'suspended' ? 'selected' : '' }}>Suspended
                                            </option>
                                            <option value="pending" {{ old('membership_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="joined_date" class="form-label">Joined Date</label>
                                        <input type="date" class="form-control" name="joined_date" id="joined_date"
                                            value="{{ old('joined_date', date('Y-m-d')) }}" required />
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="experience_years" class="form-label">Years of Experience</label>
                                        <input type="number" class="form-control" name="experience_years"
                                            id="experience_years" placeholder="Enter years of experience"
                                            value="{{ old('experience_years') }}" min="0" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="skill_level" class="form-label">Skill Level</label>
                                        <select class="form-select" name="skill_level" id="skill_level">
                                            <option value="">Select Skill Level</option>
                                            <option value="beginner" {{ old('skill_level') === 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ old('skill_level') === 'intermediate' ? 'selected' : '' }}>Intermediate
                                            </option>
                                            <option value="advanced" {{ old('skill_level') === 'advanced' ? 'selected' : '' }}>Advanced</option>
                                            <option value="expert" {{ old('skill_level') === 'expert' ? 'selected' : '' }}>Expert</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <x-forms.prev-and-complete />
                        </div>

                    </x-forms.form-wizard3>

                </div>
            </form>
        </div>
    </div>
</div>
