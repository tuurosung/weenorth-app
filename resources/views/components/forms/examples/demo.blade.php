@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>FormWizard3 Component Demo</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="#" onsubmit="event.preventDefault(); alert('Form submitted successfully!');">
                        @csrf

                        <x-forms.form-wizard3 :steps="[
                            ['id' => 'step1', 'title' => 'Step 1', 'description' => 'Basic Information', 'active' => true],
                            ['id' => 'step2', 'title' => 'Step 2', 'description' => 'Contact Details', 'active' => false],
                            ['id' => 'step3', 'title' => 'Step 3', 'description' => 'Final Review', 'active' => false]
                        ]">

                            <!-- Step 1: Basic Information -->
                            <div class="tab-pane fade show active" id="step1">
                                <h5 class="mb-4">Basic Information</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" min="18" max="100">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" id="gender" name="gender">
                                                <option value="">Choose...</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
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

                            <!-- Step 2: Contact Details -->
                            <div class="tab-pane fade" id="step2">
                                <h5 class="mb-4">Contact Details</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="postal_code" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" id="postal_code" name="postal_code">
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

                            <!-- Step 3: Final Review -->
                            <div class="tab-pane fade" id="step3">
                                <h5 class="mb-4">Review & Confirm</h5>

                                <div class="alert alert-info">
                                    <i class="fi fi-rr-info me-2"></i>
                                    Please review your information before submitting.
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Personal Information</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Name:</strong> <span id="review_name">-</span></li>
                                            <li><strong>Age:</strong> <span id="review_age">-</span></li>
                                            <li><strong>Gender:</strong> <span id="review_gender">-</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Contact Information</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Email:</strong> <span id="review_email">-</span></li>
                                            <li><strong>Phone:</strong> <span id="review_phone">-</span></li>
                                            <li><strong>Address:</strong> <span id="review_address">-</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" id="terms_agreement" name="terms_agreement" required>
                                    <label class="form-check-label" for="terms_agreement">
                                        I agree to the <a href="#" target="_blank">Terms and Conditions</a> <span class="text-danger">*</span>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <div>
                                        <button type="button" class="btn btn-secondary btn-previous">
                                            <i class="fi fi-rr-arrow-left me-2"></i> Previous
                                        </button>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fi fi-br-check me-2"></i> Submit Form
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </x-forms.form-wizard3>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Update review section when moving to step 3
document.addEventListener('DOMContentLoaded', function() {
    // Function to update review section
    function updateReview() {
        const firstName = document.getElementById('first_name')?.value || '';
        const lastName = document.getElementById('last_name')?.value || '';
        const age = document.getElementById('age')?.value || '';
        const gender = document.getElementById('gender')?.value || '';
        const email = document.getElementById('email')?.value || '';
        const phone = document.getElementById('phone')?.value || '';
        const address = document.getElementById('address')?.value || '';
        const city = document.getElementById('city')?.value || '';

        document.getElementById('review_name').textContent = firstName + ' ' + lastName || '-';
        document.getElementById('review_age').textContent = age || '-';
        document.getElementById('review_gender').textContent = gender || '-';
        document.getElementById('review_email').textContent = email || '-';
        document.getElementById('review_phone').textContent = phone || '-';
        document.getElementById('review_address').textContent = address + (city ? ', ' + city : '') || '-';
    }

    // Update review when step 3 tab is shown
    document.querySelector('[href="#step3"]')?.addEventListener('click', updateReview);

    // Also update when next button is clicked from step 2
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-next')) {
            setTimeout(updateReview, 100); // Small delay to ensure tab change is complete
        }
    });
});
</script>
@endsection
