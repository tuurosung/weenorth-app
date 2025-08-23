# Tab State Management Documentation

## Overview
The enhanced tab state management system provides persistent tab states across page reloads, supporting both regular Bootstrap tabs and FormWizard3 components.

## Components

### 1. TabStateManager Class (`/public/js/tab-state-manager.js`)
Advanced tab state management with comprehensive features:

- **Multi-tab type support**: Regular tabs, pills, buttons, and form wizards
- **Persistent storage**: Uses localStorage with automatic cleanup
- **URL hash navigation**: Supports hash-based tab navigation
- **Error handling**: Robust error handling and fallbacks
- **Custom events**: Integration with FormWizard3 components

### 2. Legacy Integration (`/public/js/weenorth.js`)
Backward-compatible integration that:

- **Automatic detection**: Uses TabStateManager if available, falls back to legacy code
- **FormWizard3 support**: Special handling for wizard navigation
- **Custom events**: Triggers wizard-specific events for enhanced integration

## Usage

### Basic Setup

1. **Include the advanced tab manager** (recommended):
```html
<script src="{{ asset('js/tab-state-manager.js') }}"></script>
<script src="{{ asset('js/weenorth.js') }}"></script>
```

2. **Or use legacy mode** (automatic fallback):
```html
<script src="{{ asset('js/weenorth.js') }}"></script>
```

### Standard Bootstrap Tabs

```html
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab">Home</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Profile</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel">Home content</div>
    <div class="tab-pane fade" id="profile" role="tabpanel">Profile content</div>
</div>
```

### FormWizard3 Integration

The system automatically detects FormWizard3 components and maintains their state:

```php
@php
    $wizard = new \App\View\Components\FormWizard3([
        'id' => 'member-wizard',
        'steps' => [
            ['title' => 'Personal Info', 'icon' => 'fas fa-user'],
            ['title' => 'Contact', 'icon' => 'fas fa-envelope'],
            ['title' => 'Confirmation', 'icon' => 'fas fa-check']
        ]
    ]);
@endphp

<x-form-wizard-3 :id="$wizard->id" :steps="$wizard->steps">
    <x-slot name="step1">
        <!-- Step 1 content -->
    </x-slot>
    <x-slot name="step2">
        <!-- Step 2 content -->
    </x-slot>
    <x-slot name="step3">
        <!-- Step 3 content -->
    </x-slot>
</x-form-wizard-3>
```

### URL Hash Navigation

Support for URL-based tab navigation:

```html
<!-- Direct links to tabs -->
<a href="/page#profile-tab">Go to Profile Tab</a>

<!-- JavaScript navigation -->
<script>
window.location.hash = '#home-tab';
</script>
```

## Advanced Features

### Custom Events

The system triggers custom events for FormWizard3 integration:

```javascript
// Listen for wizard tab changes
$(document).on('wizard:tab:changed', function(e, data) {
    console.log('Wizard tab changed:', data);
    // data.tabId - The target tab ID
    // data.step - The step number
    // data.wizardId - The wizard container ID
});
```

### Manual Tab State Management

```javascript
// Save a specific tab state
window.tabStateManager.saveActiveTab('#custom-tab', {
    customData: 'value',
    timestamp: Date.now()
});

// Activate a specific tab
window.tabStateManager.activateTab('#profile-tab');

// Get current saved state
const savedState = window.tabStateManager.getSavedActiveTab();

// Clear current page tab state
window.tabStateManager.clearTabState();

// Clean old tab states (older than 7 days)
window.tabStateManager.cleanOldTabStates(7);
```

### Configuration Options

```javascript
// Initialize with custom options
window.tabStateManager = new TabStateManager({
    storagePrefix: 'custom_tab_',
    enableLogging: false, // Disable in production
    restoreDelay: 200
});
```

## Storage Structure

Tab states are stored in localStorage with the following structure:

```json
{
    "tabId": "#profile-tab",
    "timestamp": 1642678900000,
    "url": "http://localhost/members",
    "additionalData": {
        "wizardStep": 2,
        "wizardType": "custom"
    }
}
```

## Browser Compatibility

- **Bootstrap 5**: Required for tab functionality
- **localStorage**: Supported in all modern browsers
- **jQuery**: Required for event handling
- **ES6**: Modern JavaScript features (can be transpiled if needed)

## Performance Considerations

1. **Automatic cleanup**: Old tab states are automatically removed after 7 days
2. **Session-based cleanup**: Cleanup runs once per browser session
3. **Minimal storage**: Only essential data is stored
4. **Error handling**: Graceful degradation if localStorage is unavailable

## Troubleshooting

### Common Issues

1. **Tabs not restoring**: Check browser console for errors
2. **Multiple tab systems**: Ensure only one tab manager is active
3. **Timing issues**: Increase `restoreDelay` if needed

### Debug Mode

Enable logging to debug issues:

```javascript
window.tabStateManager = new TabStateManager({
    enableLogging: true
});
```

### Browser Storage

Check localStorage in browser DevTools:
- Open DevTools → Application → Storage → Local Storage
- Look for keys starting with `tab_state_`

## Integration Examples

### Laravel Blade Layout

```html
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @yield('content')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Tab State Management -->
    <script src="{{ asset('js/tab-state-manager.js') }}"></script>
    <script src="{{ asset('js/weenorth.js') }}"></script>
</body>
</html>
```

### FormWizard3 Complete Example

```php
<!-- In your Blade template -->
@section('content')
<div class="container">
    <h2>Member Registration</h2>

    @php
        $wizard = new \App\View\Components\FormWizard3([
            'id' => 'member-registration',
            'steps' => [
                ['title' => 'Personal Information', 'icon' => 'fas fa-user'],
                ['title' => 'Contact Details', 'icon' => 'fas fa-envelope'],
                ['title' => 'Review & Submit', 'icon' => 'fas fa-check-circle']
            ]
        ]);
    @endphp

    <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <x-form-wizard-3 :id="$wizard->id" :steps="$wizard->steps">
            <x-slot name="step1">
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
            </x-slot>

            <x-slot name="step2">
                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                </div>
            </x-slot>

            <x-slot name="step3">
                <div class="alert alert-info">
                    <h5>Review Your Information</h5>
                    <p>Please review all information before submitting.</p>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Create Member
                </button>
            </x-slot>
        </x-form-wizard-3>
    </form>
</div>
@endsection
```

This comprehensive system ensures that your Bootstrap tabs and FormWizard3 components maintain their state across page reloads, providing a seamless user experience.
