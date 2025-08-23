<h5 class="">1. Personal Information</h5>
<p class="text-muted mb-4">Please fill in your personal details below.</p>

<!-- First And Last Names -->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name"
                value="{{ old('first_name') }}" required />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name"
                value="{{ old('last_name') }}" required />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="date_of_birth" id="date_of_birth"
                value="{{ old('date_of_birth') }}" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" name="gender" id="gender">
                <option value="">Select Gender</option>
                @foreach (config('member.genders') as $key => $value)
                    <option value="{{ $key }}" {{ old('gender') === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="cohort" class="form-label">Cohort</label>
            <input type="text" class="form-control" name="cohort" id="cohort" placeholder="e.g. 2024-A"
                value="{{ old('cohort') }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="bio" class="form-label">Biography</label>
    <textarea class="form-control" name="bio" id="bio" rows="3"
        placeholder="Enter member biography or description">{{ old('bio') }}</textarea>
</div>



<hr class="d-block my-5">



<h5>2. Contact Information</h5>
<p class="text-muted">Please provide your contact information below.</p>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address"
                value="{{ old('email') }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number"
                value="{{ old('phone') }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" name="address" id="address" rows="3"
        placeholder="Enter full address">{{ old('address') }}</textarea>
</div>


<hr class="d-block my-5">


<h5 class="fw-700">3. Membership Information</h5>
<p class="text-muted">Please provide membership information</p>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="form-group">
            <label for="region_id" class="form-label">Region</label>
            <select class="form-select region_id" name="region_id" id="region_id">
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
        <div class="form-group">
            <label for="district_id" class="form-label">District</label>
            <select class="form-select district_id" name="district_id" id="district_id">
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
        <div class="form-group">
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
        <div class="form-group">
            <label for="membership_type" class="form-label">Membership Type</label>
            <select class="form-select" name="membership_type" id="membership_type" required>
                <option value="">Select Type</option>
                @foreach (config('member.membership_types') as $key => $value)
                    <option value="{{ $key }}" {{ old('membership_type') === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="membership_status" class="form-label">Membership Status</label>
            <select class="form-select" name="membership_status" id="membership_status" required>
                <option value="">Select Status</option>
                @foreach (config('member.membership_statuses') as $key => $value)
                    <option value="{{ $key }}" {{ old('membership_status') === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="joined_date" class="form-label">Joined Date</label>
            <input type="date" class="form-control" name="joined_date" id="joined_date"
                value="{{ old('joined_date', date('Y-m-d')) }}" required />
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="experience_years" class="form-label">Years of Experience</label>
            <input type="number" class="form-control" name="experience_years" id="experience_years"
                placeholder="Enter years of experience" value="{{ old('experience_years') }}" min="0" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="skill_level" class="form-label">Skill Level</label>
            <select class="form-select" name="skill_level" id="skill_level">
                <option value="">Select Skill Level</option>
                @foreach (config('member.skill_levels') as $key => $value)
                    <option value="{{ $key }}" {{ old('skill_level') === $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
