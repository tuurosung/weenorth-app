$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
});

$(document).on('keyup, change', '.is-invalid', function () {
    const $field = $(this);
    const isEmpty = !$field.val().trim();

    $field.toggleClass('is-invalid is-invalid-feedback border-danger', isEmpty);
})

// Tab State Management - Enhanced with TabStateManager integration
$(document).ready(function() {

    // Legacy functions for backward compatibility
    function saveActiveTab(tabId) {
        if (window.tabStateManager) {
            window.tabStateManager.saveActiveTab(tabId, { legacy: true });
        } else {
            // Fallback to original implementation
            const currentPage = window.location.pathname;
            const storageKey = 'activeTab_' + currentPage.replace(/\//g, '_');
            localStorage.setItem(storageKey, tabId);
        }
    }

    function getSavedActiveTab() {
        if (window.tabStateManager) {
            const tabData = window.tabStateManager.getSavedActiveTab();
            return tabData ? tabData.tabId : null;
        } else {
            // Fallback to original implementation
            const currentPage = window.location.pathname;
            const storageKey = 'activeTab_' + currentPage.replace(/\//g, '_');
            return localStorage.getItem(storageKey);
        }
    }

    function activateTab(tabId) {
        if (window.tabStateManager) {
            return window.tabStateManager.activateTab(tabId);
        } else {
            // Fallback to original implementation
            if (tabId && $(tabId).length) {
                const $tabTrigger = $('a[href="' + tabId + '"], a[data-bs-target="' + tabId + '"]');

                if ($tabTrigger.length) {
                    const tab = new bootstrap.Tab($tabTrigger[0]);
                    tab.show();
                    return true;
                }
            }
            return false;
        }
    }

    // Enhanced tab listeners - integrate with advanced manager if available
    if (!window.tabStateManager) {
        // Only set up legacy listeners if advanced manager is not available
        $(document).on('shown.bs.tab', 'a[data-bs-toggle="tab"], a[data-bs-toggle="pill"]', function (e) {
            const activeTabId = $(e.target).attr('href') || $(e.target).attr('data-bs-target');
            if (activeTabId) {
                saveActiveTab(activeTabId);
                console.log('Tab state saved:', activeTabId);
            }
        });

        // Restore active tab on page load (legacy)
        const savedTabId = getSavedActiveTab();
        if (savedTabId) {
            setTimeout(function() {
                if (!activateTab(savedTabId)) {
                    console.log('Could not restore tab:', savedTabId);
                } else {
                    console.log('Tab state restored:', savedTabId);
                }
            }, 100);
        }

        // Handle hash-based navigation (legacy)
        if (window.location.hash) {
            const hashTab = window.location.hash;
            setTimeout(function() {
                if (activateTab(hashTab)) {
                    saveActiveTab(hashTab);
                }
            }, 150);
        }

        // Listen for hash changes (legacy)
        $(window).on('hashchange', function() {
            const hashTab = window.location.hash;
            if (hashTab && activateTab(hashTab)) {
                saveActiveTab(hashTab);
            }
        });
    }

    // Custom event handlers for FormWizard3 integration
    $(document).on('click', '.wizard-nav-item, .form-wizard-nav .nav-link', function() {
        const targetTab = $(this).attr('href') || $(this).attr('data-bs-target');
        if (targetTab) {
            // Trigger custom event for wizard tab changes
            $(document).trigger('wizard:tab:changed', {
                tabId: targetTab,
                step: $(this).data('step') || $(this).index() + 1,
                wizardId: $(this).closest('.form-wizard').attr('id')
            });
        }
    });

    // Enhanced FormWizard3 support
    $(document).on('click', '[data-wizard-action]', function() {
        const action = $(this).data('wizard-action');
        const $wizard = $(this).closest('.form-wizard');
        const currentStep = $wizard.find('.nav-link.active').index() + 1;

        if (action === 'next' || action === 'prev') {
            setTimeout(function() {
                const newActiveTab = $wizard.find('.nav-link.active').attr('href') ||
                                   $wizard.find('.nav-link.active').attr('data-bs-target');
                if (newActiveTab && window.tabStateManager) {
                    window.tabStateManager.saveActiveTab(newActiveTab, {
                        wizardAction: action,
                        previousStep: currentStep,
                        wizardId: $wizard.attr('id')
                    });
                }
            }, 50);
        }
    });
});

initializeSelect2();

function initializeSelect2()
{
    $('.select2-input').each(function () {
       if (!$(this).data('select2')) {
            $(this).select2({
                dropdownParent: $(this).parent(),
                // placeholder: $(this).data('placeholder') || 'Select an option',
                // allowClear: true,
            })
       }
    })
}
