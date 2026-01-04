<section class="mb-5">

    <!-- First And Last Names -->
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name"
                    value="{{ old('first_name') }}" required />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name"
                    value="{{ old('last_name') }}" required />
            </div>
        </div>
    </div>


    <!-- Date of Birth and Gender -->
    <div class="row">
        <div class="col-md-6">

            <div class="row">

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth"
                            value="{{ old('date_of_birth') }}" />
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select select2-input" name="gender" id="gender" required>
                            <option value="">Select Gender</option>
                            @foreach (config('member.genders') as $key => $value)
                            <option value="{{ $key }}" {{ $key === 'female' ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId"
                    placeholder="Residential Address" value="{{ old('address') }}" />
            </div>
            <div class="row">
                <div class="col-md-6">

                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address"
                    value="{{ old('email') }}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Enter phone number"
                    value="{{ old('contact') }}" />
            </div>
        </div>
    </div>


</section>



<section class="mb-5">

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="weenorth_id" class="form-label">Weenorth ID</label>
                        <input type="text" class="form-control" name="weenorth_id" id="weenorth_id"
                            placeholder="Enter Weenorth ID" value="{{ old('weenorth_id') }}" required />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cohort" class="form-label">Cohort</label>
                        <input type="text" class="form-control" name="cohort" id="cohort" placeholder="e.g. 2024-A"
                            value="{{ old('cohort') }}" required />
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="institution_name" class="form-label">Institution Name</label>
                <input type="text" class="form-control" name="institution_name" id="institution_name"
                    placeholder="Enter institution name" value="{{ old('institution_name') }}" required />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="trade_id" class="form-label">Trade</label>
                <select class="form-select select2-input" name="trade_id" id="trade_id" required>
                    <option value="">Select Trade</option>
                    @foreach($trades as $key => $value)
                    <option value="{{ $key }}" {{ old('trade_id') == $key ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="region_id" class="form-label">Region</label>
                        <select class="form-select region_id region-select select2-input" name="region_id"
                            id="region_id" required>
                            <option value="">Select Region</option>
                            @foreach($regions as $key => $value)
                            <option value="{{ $key }}" {{ old('region_id') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="district_id" class="form-label">District</label>
                        <select class="form-select district_id district-select select2-input" name="district_id"
                            id="district_id" required>
                            <option value="">Select District</option>
                            @foreach($districts as $key => $value)
                            <option value="{{ $key }}" {{ old('district_id') == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>













<div class="row mt-4">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">

    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="experience_years" class="form-label">Years of Experience</label>
                    <input type="number" class="form-control" name="experience_years" id="experience_years"
                        placeholder="Enter years of experience" value="{{ old('experience_years') }}" min="0" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="skill_level" class="form-label">Skill Level</label>
                    <select class="form-select select2-input" name="skill_level" id="skill_level">
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
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="joined_date" class="form-label">Joined Date</label>
                    <input type="text" class="form-control datepicker" name="joined_date" id="joined_date"
                        value="{{ old('joined_date', date('Y-m-d')) }}" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="membership_status" class="form-label">Membership Status</label>
                    <select class="form-select select2-input" name="membership_status" id="membership_status" required>
                        <option value="">Select Status</option>
                        @foreach (config('member.membership_statuses') as $key => $value)
                        <option value="{{ $key }}" {{ old('membership_status') === $key ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
