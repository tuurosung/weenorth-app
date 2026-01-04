
<div class="row mt-4">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="edit_first_name"
                placeholder="Enter first name" value="{{ $member->first_name }}" required />
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="edit_last_name" placeholder="Enter last name"
                value="{{ $member->last_name }}" required />
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_date_of_birth" class="form-label">Date of Birth</label>
                    <input type="text" class="form-control datepicker" name="date_of_birth" id="edit_date_of_birth"
                        value="{{ $member->date_of_birth ? \Carbon\Carbon::parse($member->date_of_birth)->format('Y-m-d') : '' }}" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_gender" class="form-label">Gender</label>
                    <select class="form-select select2-input" name="gender" id="edit_gender">
                        <option value="">Select Gender</option>
                        @foreach (config('member.genders') as $key => $value)
                        <option
                            value="{{ $key }}"
                            {{ $key === $member->gender ? 'selected' : ($key === 'female' ? 'selected' : '') }}>
                            {{ $value }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_cohort" class="form-label">Cohort</label>
                    <input type="text" class="form-control" name="cohort" id="edit_cohort" placeholder="e.g. 2024-A"
                        value="{{ $member->cohort }}" />
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="weenorth_id" class="form-label">Weenorth ID</label>
            <input type="text" class="form-control" name="weenorth_id" id="weenorth_id" placeholder="Enter Weenorth ID"
                value="{{ $member->weenorth_id }}" required />
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="institution_name" class="form-label">Institution Name</label>
            <input type="text" class="form-control" name="institution_name" id="institution_name"
                placeholder="Enter institution name" value="{{ $member->institution_name }}" required />
        </div>
    </div>
</div>


<div class="mb-4"></div>


<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_address" class="form-label">Address</label>
            <textarea class="form-control" name="address" id="edit_address" rows="2"
                placeholder="Enter full address">{{ $member->address }}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_region_id" class="form-label">Region</label>
            <select class="form-select select2-input region_id" name="region_id" id="edit_region_id">
                <option value="">Select Region</option>
                @foreach($regions as $key => $value)
                <option value="{{ $key }}" {{ $member->region_id == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_district_id" class="form-label">District</label>
            <select class="form-select select2-input district_id" name="district_id" id="edit_district_id">
                <option value="">Select District</option>
                @foreach($districts as $key => $value)
                <option value="{{ $key }}" {{ $member->district_id == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">

    </div>
</div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="edit_email" placeholder="Enter email address"
                value="{{ $member->email }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="contact" id="edit_phone" placeholder="Enter phone number"
                value="{{ $member->phone }}" />
        </div>
    </div>
</div>








<div class="mb-4"></div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_trade_id" class="form-label">Trade</label>
            <select class="form-select select2-input" name="trade_id" id="edit_trade_id">
                <option value="">Select Trade</option>
                @foreach($trades as $key => $value)
                <option value="{{ $key }}" {{ $member->trade_id == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="edit_joined_date" class="form-label">Joined Date</label>
            <input type="text" class="form-control datepicker" name="joined_date" id="edit_joined_date"
                value="{{ $member->joined_date ? \Carbon\Carbon::parse($member->joined_date)->format('Y-m-d') : '' }}"
                />
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_experience_years" class="form-label">Years of Experience</label>
                    <input type="number" class="form-control" name="experience_years" id="edit_experience_years"
                        placeholder="Enter years of experience" value="{{ $member->experience_years }}" min="0" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_skill_level" class="form-label">Skill Level</label>
                    <select class="form-select select2-input" name="skill_level" id="edit_skill_level">
                        <option value="">Select Skill Level</option>

                        @foreach (config('member.skill_levels') as $key => $value)
                        <option value="{{ $key }}" {{ $member->skill_level === $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                        @endforeach

                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_membership_type" class="form-label">Membership Type</label>
                    <select class="form-select select2-input" name="membership_type" id="edit_membership_type" required>
                        <option value="">Select Type</option>
                        @foreach (config('member.membership_types') as $key => $value)
                            <option value="{{ $key }}"
                                {{ $key === $member->membership_type ? 'selected' : ($key === 'member' ? 'selected' : '') }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="edit_membership_status" class="form-label">Membership Status</label>
                    <select class="form-select select2-input" name="membership_status" id="edit_membership_status" required>
                        <option value="">Select Status</option>
                        @foreach (config('member.membership_statuses') as $key => $value)
                            <option value="{{ $key }}"
                                {{ $key === $member->membership_status ? 'selected' : ($key === 'active' ? 'selected' : '') }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
