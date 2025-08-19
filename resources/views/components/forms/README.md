# FormWizard3 Component

A reusable 3-step form wizard component for Laravel Blade templates.

## Usage

### Basic Usage with Default Steps

```blade
<x-forms.form-wizard3>
    <!-- Step 1 Content -->
    <div class="tab-pane fade show active" id="step1">
        <h5>Step 1: Basic Information</h5>
        <!-- Your form fields here -->

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
    <div class="tab-pane fade" id="step2">
        <h5>Step 2: Additional Details</h5>
        <!-- Your form fields here -->

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
    <div class="tab-pane fade" id="step3">
        <h5>Step 3: Final Information</h5>
        <!-- Your form fields here -->

        <div class="d-flex justify-content-between mt-4">
            <div>
                <button type="button" class="btn btn-secondary btn-previous">
                    <i class="fi fi-rr-arrow-left me-2"></i> Previous
                </button>
            </div>
            <div>
                <button type="submit" class="btn btn-success">
                    <i class="fi fi-br-check me-2"></i> Complete
                </button>
            </div>
        </div>
    </div>
</x-forms.form-wizard3>
```

### Custom Steps Configuration

```blade
<x-forms.form-wizard3 :steps="[
    ['id' => 'step1', 'title' => 'Step 1', 'description' => 'Personal Info', 'active' => true],
    ['id' => 'step2', 'title' => 'Step 2', 'description' => 'Contact Details', 'active' => false],
    ['id' => 'step3', 'title' => 'Step 3', 'description' => 'Preferences', 'active' => false]
]">
    <!-- Your step content here -->
</x-forms.form-wizard3>
```

### Service Center Example

```blade
<x-forms.form-wizard3 :steps="[
    ['id' => 'step1', 'title' => 'Step 1', 'description' => 'District Information', 'active' => true],
    ['id' => 'step2', 'title' => 'Step 2', 'description' => 'Contact Information', 'active' => false],
    ['id' => 'step3', 'title' => 'Step 3', 'description' => 'Opening Hours', 'active' => false]
]">

    <!-- Step 1: District Information -->
    <div class="tab-pane fade show active" id="step1">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="district_id" class="form-label">Select District</label>
                    <select class="form-select" name="district_id" required>
                        <option value="">Choose a district...</option>
                        <!-- Options here -->
                    </select>
                </div>
            </div>
            <!-- More fields -->
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

    <!-- Additional steps... -->

</x-forms.form-wizard3>
```

## Features

### Automatic Validation
The component automatically validates required fields before allowing progression to the next step.

### Navigation Controls
- **Next Button**: Use class `btn-next` to automatically handle progression
- **Previous Button**: Use class `btn-previous` to go back to previous step
- **Direct Navigation**: Click on any step header to jump directly to that step

### Step Configuration
Each step object should contain:
- `id`: Unique identifier (e.g., 'step1', 'step2', 'step3')
- `title`: Display title (e.g., 'Step 1')
- `description`: Description text (e.g., 'Basic Information')
- `active`: Boolean indicating if this is the initially active step

### Required Step Structure
Each step content must be wrapped in a div with:
- Class: `tab-pane fade` (add `show active` for the initially active step)
- ID: Must match the step's `id` property

### Navigation Buttons
Use these button classes for automatic functionality:
- `.btn-next`: Validates current step and moves to next
- `.btn-previous`: Moves to previous step
- Submit button on final step to complete the form

## JavaScript Features

The component includes built-in JavaScript that:
- Validates required fields before step progression
- Handles next/previous button clicks
- Manages tab state and navigation
- Provides smooth transitions between steps
- Shows validation errors for incomplete required fields

## Styling

The component uses Bootstrap tab classes and custom CSS classes:
- `.nav-wizards-container`: Main container
- `.nav-wizards-3`: Navigation styling
- `.nav-dot`: Step indicator dots
- `.nav-title`: Step titles
- `.nav-text`: Step descriptions

## Dependencies

- Bootstrap 5 (for tab functionality and styling)
- Flaticon (for arrow icons)
- jQuery (if using additional JavaScript features)
