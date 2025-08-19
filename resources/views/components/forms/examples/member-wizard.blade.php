<!-- Example: Member Registration Wizard -->
<x-forms.form-wizard3 :steps="[
    ['id' => 'step1', 'title' => 'Step 1', 'description' => 'Personal Information', 'active' => true],
    ['id' => 'step2', 'title' => 'Step 2', 'description' => 'Professional Details', 'active' => false],
    ['id' => 'step3', 'title' => 'Step 3', 'description' => 'Membership Information', 'active' => false]
]">

    <!-- Step 1: Personal Information -->
    <div class="tab-pane fade show active" id="step1">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone">
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

    <!-- Step 2: Professional Details -->
    <div class="tab-pane fade" id="step2">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="trade_id" class="form-label">Trade</label>
                    <select class="form-select" name="trade_id">
                        <option value="">Select Trade</option>
                        <!-- Trade options -->
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="experience_years" class="form-label">Years of Experience</label>
                    <input type="number" class="form-control" name="experience_years" min="0">
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="skill_level" class="form-label">Skill Level</label>
                    <select class="form-select" name="skill_level">
                        <option value="">Select Level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                        <option value="expert">Expert</option>
                    </select>
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

    <!-- Step 3: Membership Information -->
    <div class="tab-pane fade" id="step3">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="membership_type" class="form-label">Membership Type</label>
                    <select class="form-select" name="membership_type" required>
                        <option value="">Select Type</option>
                        <option value="individual">Individual</option>
                        <option value="corporate">Corporate</option>
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="membership_status" class="form-label">Status</label>
                    <select class="form-select" name="membership_status" required>
                        <option value="">Select Status</option>
                        <option value="active">Active</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="joined_date" class="form-label">Joined Date</label>
                    <input type="date" class="form-control" name="joined_date" required>
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
                <button type="submit" class="btn btn-success">
                    <i class="fi fi-br-check me-2"></i> Create Member
                </button>
            </div>
        </div>
    </div>

</x-forms.form-wizard3>
