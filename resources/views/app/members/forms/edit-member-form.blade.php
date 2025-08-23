<h5>1. Personal Information</h5>
<p>Please fill in your personal details below.</p>

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
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="edit_date_of_birth"
                value="{{ $member->date_of_birth?->format('Y-m-d') }}" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" id="edit_gender">
                <option value="">Select Gender</option>
                @foreach (config('member.genders') as $key => $value)
                    <option value="{{ $key }}" {{ $member->gender === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_cohort" class="form-label">Cohort</label>
            <input type="text" class="form-control" name="cohort" id="edit_cohort" placeholder="e.g. 2024-A"
                value="{{ $member->cohort }}" />
        </div>
    </div>
</div>

<hr class="d-block my-5">


<h5>2. Contact Information</h5>
<p>Provide your contact details.</p>

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
            <input type="text" class="form-control" name="phone" id="edit_phone" placeholder="Enter phone number"
                value="{{ $member->phone }}" />
        </div>
    </div>
</div>


<div class="mb-3">
    <label for="edit_address" class="form-label">Address</label>
    <textarea class="form-control" name="address" id="edit_address" rows="2"
        placeholder="Enter full address">{{ $member->address }}</textarea>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_region_id" class="form-label">Region</label>
            <select class="form-select region_id" name="region_id" id="edit_region_id">
                <option value="">Select Region</option>
                @foreach($regions as $key => $value)
                <option value="{{ $key }}" {{ $member->region_id == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_district_id" class="form-label">District</label>
            <select class="form-select district_id" name="district_id" id="edit_district_id">
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
        <div class="mb-3">
            <label for="edit_trade_id" class="form-label">Trade</label>
            <select class="form-select" name="trade_id" id="edit_trade_id">
                <option value="">Select Trade</option>
                @foreach($trades as $key => $value)
                <option value="{{ $key }}" {{ $member->trade_id == $key ? 'selected' : '' }}>
                    {{ $value }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<hr class="d-block my-5">


<h5>3. Membership Details</h5>
<p>Select your membership options.</p>


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
            <select class="form-select" name="skill_level" id="edit_skill_level">
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

<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_membership_type" class="form-label">Membership Type</label>
            <select class="form-select" name="membership_type" id="edit_membership_type" required>
                <option value="">Select Type</option>
                @foreach (config('member.membership_types') as $key => $value)
                    <option value="{{ $key }}" {{ $member->membership_type === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_membership_status" class="form-label">Membership Status</label>
            <select class="form-select" name="membership_status" id="edit_membership_status" required>
                <option value="">Select Status</option>
                @foreach (config('member.membership_statuses') as $key => $value)
                    <option value="{{ $key }}" {{ $member->membership_status === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="edit_joined_date" class="form-label">Joined Date</label>
            <input type="date" class="form-control" name="joined_date" id="edit_joined_date"
                value="{{ $member->joined_date->format('Y-m-d') }}" required />
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="edit_bio" class="form-label">Biography</label>
    <textarea class="form-control" name="bio" id="edit_bio" rows="3"
        placeholder="Enter member biography or description">{{ $member->bio }}</textarea>
</div>
